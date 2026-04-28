<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login | TransportesPro</title>

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">

<style>
body {
    margin: 0;
    height: 100vh;

    background: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)),
        url('{{ asset("assets/img/hero/h1_hero.jpg") }}') no-repeat center center;

    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;

    animation: fadeInBg 1.2s ease;
}

/* ANIMACIÓN BACKGROUND */
@keyframes fadeInBg {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* CONTENEDOR */
.login-wrapper {
    width: 100%;
    max-width: 1000px;
    padding: 40px;
}

/* CARD */
.login-card {
    width: 100%;
    padding: 45px;

    border-radius: 18px;
    background: rgba(255,255,255,0.96);
    box-shadow: 0 25px 70px rgba(0,0,0,0.4);

    animation: slideUp 0.8s ease;
}

/* ENTRADA SUAVE */
@keyframes slideUp {
    from {
        transform: translateY(40px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

/* HEADER */
.login-title {
    text-align: center;
    font-weight: 700;
    font-size: 30px;
    margin-bottom: 30px;
}

/* INPUTS */
.form-control {
    border-radius: 12px;
    padding: 14px;
    font-size: 15px;
    transition: all 0.25s ease;
}

/* EFECTO FOCUS */
.form-control:focus {
    border-color: #ff5e14;
    box-shadow: 0 0 0 3px rgba(255,94,20,0.2);
}

/* BOTÓN LOGIN */
.btn-login {
    background: linear-gradient(135deg, #ff5e14, #ff7a18);
    border: none;
    border-radius: 12px;
    padding: 14px;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 1px;

    transition: all 0.3s ease;
}

/* HOVER */
.btn-login:hover {
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 12px 30px rgba(255,94,20,0.45);
}

/* CLICK */
.btn-login:active {
    transform: scale(0.98);
}

/* BOTÓN VOLVER */
.btn-back {
    position: relative;
    padding: 10px 18px;

    color: #ff8c00;

    border: 2px solid rgba(255, 121, 3, 0.42);
    border-radius: 10px;

    overflow: hidden;
    transition: all 0.3s ease;
}

/* TEXTO */
.btn-back:hover {
    color: #000000;
}

/* EFECTO BORDE ANIMADO */
.btn-back::before {
    content: "";
    position: absolute;
    inset: -2px;
    border-radius: 10px;

    background: linear-gradient(
        120deg,
        #ff5e14,
        #ffaa18,
        #0d6efd,
        #ff5e14
    );

    background-size: 300%;
    opacity: 0;

}

/* ACTIVAR ANIMACIÓN */
.btn-back:hover::before {
    opacity: 1;
    animation: borderMove 2s linear infinite;
}

/* INNER MASK */
.btn-back::after {
    content: "";
    position: absolute;
    inset: 2px;
    background: rgba(255, 255, 255, 0.6);
    border-radius: 8px;
}

/* TEXTO ENCIMA */
.btn-back span {
    position: relative;
    z-index: 2;
}

/* ANIMACIÓN */
@keyframes borderMove {
    0% { background-position: 0% }
    100% { background-position: 300% }
}

.btn-back:hover {
    background: #000;
    color: #000000;
}

/* TOP BAR */
.top-bar {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

/* CHECKBOX */
input[type="checkbox"] {
    accent-color: #ff0000;
}

/* LINK */
a {
    color: #ff5e14;
    transition: 0.2s;
}

a:hover {
    opacity: 0.7;
}

/* ERROR (por si luego agregas validación) */
.input-error {
    border-color: red;
    animation: shake 0.3s;
}

@keyframes shake {
    0% { transform: translateX(0); }
    25% { transform: translateX(-3px); }
    50% { transform: translateX(3px); }
    75% { transform: translateX(-3px); }
    100% { transform: translateX(0); }
}
</style>
</head>

<body>

<div class="login-wrapper">

    <div class="login-card">

        <a href="/" class="btn-back">
    <span>Volver</span>
</a>

        <div class="login-title">
            Bienvenido de nuevo
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3 d-flex justify-content-between align-items-center">
                <label>
                    <input type="checkbox" name="remember">
                    Recordarme
                </label>

                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>

            <button class="btn btn-login w-100">
                INICIAR SESIÓN
            </button>

        </form>

    </div>

</div>

</body>
</html>