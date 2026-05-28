# Stage 1: Build frontend assets
FROM node:20-slim AS frontend
WORKDIR /app
COPY package.json package-lock.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: Install PHP dependencies
FROM composer:latest AS composer
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --optimize-autoloader --no-scripts --no-interaction --no-dev

# Stage 3: Final image
FROM dunglas/frankenphp:php8.3-bookworm

# Install system packages
RUN apt-get update && apt-get install -y --no-install-recommends \
    ca-certificates git unzip zip \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions including gd
RUN install-php-extensions \
    ctype curl dom fileinfo filter gd hash mbstring \
    openssl pcre pdo pdo_mysql session tokenizer xml opcache

WORKDIR /app

# Copy composer dependencies
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY --from=composer /app/vendor ./vendor

# Copy application code
COPY . .

# Copy built frontend assets
COPY --from=frontend /app/public/build ./public/build

# Generate optimized autoload
RUN composer dump-autoload --optimize --no-scripts

# Cache Laravel routes and config
RUN php artisan route:cache || true
RUN php artisan config:cache || true
RUN php artisan view:cache || true

# Set up Caddyfile for FrankenPHP
RUN printf '{\n    auto_https off\n    admin off\n    servers {\n        trusted_proxies static private_ranges\n    }\n}\n:${PORT} {\n    root * /app/public\n    encode zstd gzip\n    php_server\n}' > /etc/caddy/Caddyfile

CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
