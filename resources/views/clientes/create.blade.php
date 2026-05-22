<!doctype html>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nuevo Cliente</title>
    <!-- CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<style>

body{

    background:#f4f7fb;
}

/* =========================
PAGE
========================= */

.page-wrap{

    padding:70px 0;
}

/* =========================
CARD
========================= */

.form-card{

    background:#fff;

    border-radius:28px;

    padding:45px;

    box-shadow:
        0 20px 60px rgba(0,0,0,.06);

    max-width:760px;

    margin:auto;
}

/* =========================
TITLE
========================= */

.page-title{

    font-size:42px;

    font-weight:800;

    color:#0b1c39;

    margin-bottom:10px;
}

.page-subtitle{

    color:#6b7280;

    font-size:15px;

    margin-bottom:35px;
}

/* =========================
INPUTS
========================= */

.form-label{

    font-size:13px;

    font-weight:700;

    color:#374151;

    margin-bottom:8px;
}

.form-control{

    border:none !important;

    background:#f8fafc !important;

    border-radius:16px !important;

    height:58px;

    padding:0 18px !important;

    font-size:14px;

    box-shadow:
        inset 0 0 0 1px #e5e7eb;

    transition:.25s ease;
}

.form-control:focus{

    background:#fff !important;

    box-shadow:
        0 0 0 4px rgba(255,94,20,.12),
        inset 0 0 0 1px #ff5e14 !important;
}

/* =========================
BUTTONS
========================= */

.action-btn{

    border:none;

    border-radius:14px;

    padding:14px 22px;

    font-size:14px;

    font-weight:700;

    transition:.25s ease;

    text-decoration:none !important;

    display:inline-flex;

    align-items:center;

    gap:8px;
}

.action-btn:hover{

    transform:translateY(-3px);
}

.btn-orange{

    background:#ff5e14;

    color:#fff;

    box-shadow:
        0 10px 25px rgba(255,94,20,.25);
}

.btn-dark-pro{

    background:#0b1c39;

    color:#fff;
}

</style>

</head>

<body>

<!-- HEADER (igual que index) -->
 <header>
    <div class="header-area">
        <div class="main-header">
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">

                        <!-- LOGO -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>

                        <!-- MENU CORRECTO -->
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">

                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="/">Inicio</a></li>
                                            <li><a href="/clientes">Clientes</a></li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>

                        <!-- MOBILE -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container page-wrap">

    <div class="form-card">

<h1 class="page-title">

    Nuevo Cliente

</h1>

<p class="page-subtitle">

    Registra un nuevo cliente dentro del sistema TransportesPro.

</p>

<form method="POST" action="/clientes">

    @csrf

    <div class="row">

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Nombre completo

            </label>

            <input
                type="text"
                name="nombre"
                class="form-control"
                placeholder="Ej. Juan Pérez"
            >

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Correo electrónico

            </label>

            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="cliente@email.com"
            >

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Teléfono

            </label>

            <input
                type="text"
                name="telefono"
                class="form-control"
                placeholder="+502 5555-5555"
            >

        </div>

        <div class="col-md-6 mb-4">

            <label class="form-label">

                Dirección

            </label>

            <input
                type="text"
                name="direccion"
                class="form-control"
                placeholder="Ciudad, zona o colonia"
            >

        </div>

    </div>

    <div
        style="
            display:flex;
            gap:14px;
            flex-wrap:wrap;
            margin-top:12px;
        "
    >

        <button
            class="action-btn btn-orange"
        >

            💾 Guardar Cliente

        </button>

        <a
            href="/clientes"
            class="action-btn btn-dark-pro"
        >

            ⬅ Volver

        </a>

    </div>
</div>
</form>

</div>

</body>
</html>
