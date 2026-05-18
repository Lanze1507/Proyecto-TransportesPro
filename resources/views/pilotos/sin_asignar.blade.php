<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <title>Cuenta en revisión | TransportesPro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        body { background:#f4f7fb; display:flex; align-items:center; justify-content:center; min-height:100vh; }
        .card-msg {
            background:#fff; border-radius:24px; padding:48px 40px;
            text-align:center; max-width:420px; width:100%;
            box-shadow:0 16px 48px rgba(0,0,0,.10);
        }
        .icon-wrap { font-size:64px; margin-bottom:20px; }
        h2 { font-size:24px; font-weight:800; color:#0b1c39; margin-bottom:10px; }
        p  { color:#6b7280; font-size:15px; margin-bottom:24px; }
        .btn-out {
            background:#0b1c39; color:#fff; border:none; border-radius:12px;
            padding:12px 28px; font-size:14px; font-weight:700; cursor:pointer;
            text-decoration:none; display:inline-block; transition:background .2s;
        }
        .btn-out:hover { background:#ff5e14; color:#fff; }
    </style>
</head>
<body>
    <div class="card-msg">
        <div class="icon-wrap">🔧</div>
        <h2>Cuenta en configuración</h2>
        <p>Tu cuenta de piloto está activa pero aún no ha sido vinculada a un perfil de piloto por el administrador. Comunícate con el administrador del sistema.</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn-out">Cerrar sesión</button>
        </form>
    </div>
</body>
</html>