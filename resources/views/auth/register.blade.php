<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro | TransportesPro</title>

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

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

/* ANIMACIÓN */
@keyframes fadeInBg {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* CONTENEDOR */
.register-wrapper {
    width: 100%;
    max-width: 1100px;
    padding: 40px;
}

/* CARD */
.register-card {
    width: 100%;
    padding: 45px;

    border-radius: 18px;
    background: rgba(255,255,255,0.96);
    box-shadow: 0 25px 70px rgba(0,0,0,0.4);

    animation: slideUp 0.8s ease;
}

/* ENTRADA */
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

/* TITULO */
.register-title {
    text-align: center;
    font-weight: 700;
    font-size: 30px;
    margin-bottom: 30px;
}

/* INPUTS */
.form-control {
    border-radius: 12px;
    padding: 14px;
    transition: 0.25s;
}

.form-control:focus {
    border-color: #ff5e14;
    box-shadow: 0 0 0 3px rgba(255,94,20,0.2);
}

/* BOTÓN REGISTER */
.btn-register {
    background: linear-gradient(135deg, #ff5e14, #ff7a18);
    border: none;
    border-radius: 12px;
    padding: 14px;
    font-weight: bold;
    letter-spacing: 1px;
    transition: 0.3s;
}

.btn-register:hover {
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 12px 30px rgba(255,94,20,0.45);
}

.btn-register:active {
    transform: scale(0.98);
}

/* BOTÓN VOLVER */
.btn-back {
    position: relative;
    display: inline-block;
    padding: 10px 18px;
    color: #ff6600;
    border: 2px solid rgba(255, 102, 0, 0.52);
    border-radius: 10px;
    overflow: hidden;
}

/* BORDE ANIMADO */
.btn-back::before {
    content: "";
    position: absolute;
    inset: -2px;
    border-radius: 10px;

    background: linear-gradient(
        120deg,
        #ff5e14,
        #ff7a18,
        #0d6efd,
        #ff5e14
    );

    background-size: 300%;
    opacity: 0;
}

/* ACTIVACIÓN */
.btn-back:hover::before {
    opacity: 1;
    animation: borderMove 2s linear infinite;
}

/* MASK */
.btn-back::after {
    content: "";
    position: absolute;
    inset: 2px;
    background: rgba(255, 255, 255, 0);
    border-radius: 8px;
}

/* TEXTO */
.btn-back span {
    position: relative;
    z-index: 2;
}

/* ANIMACIÓN */
@keyframes borderMove {
    0% { background-position: 0% }
    100% { background-position: 300% }
}

/* TOP */
.top-bar {
    margin-bottom: 20px;
}
</style>
</head>

<body>

<div class="register-wrapper">

    <div class="register-card">

        <div class="top-bar">
            <a href="/" class="btn-back">
                <span>⬅ Volver</span>
            </a>
        </div>

        <div class="register-title">
            Crear Cuenta
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Confirmar Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button class="btn btn-register w-100">
                CREAR CUENTA
            </button>

        </form>

    </div>

</div>

</body>
</html>