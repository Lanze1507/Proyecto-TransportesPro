<!doctype html>

<html lang="es">

<head>

<meta charset="utf-8">

<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>Editar Camión - TransportesPro</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<style>

body{

    background:#f4f7fb;
}

/* =========================
PAGE TITLE
========================= */

.page-title{

    font-size:42px;

    font-weight:800;

    color:#0b1c39;

    margin-bottom:8px;
}

.page-subtitle{

    color:#6b7280;

    font-size:15px;

    margin-bottom:45px;
}

/* =========================
FORM CARD
========================= */

.form-card{

    background:#fff;

    border-radius:28px;

    padding:45px;

    box-shadow:
        0 20px 60px rgba(0,0,0,.06);
}

/* =========================
INPUTS
========================= */

.custom-input{

    height:58px;

    border:none;

    border-radius:16px;

    background:#f8fafc;

    padding:0 18px;

    transition:.25s ease;

    font-size:14px;

    box-shadow:
        inset 0 0 0 1px #e5e7eb;
}

.custom-input:focus{

    background:#fff;

    box-shadow:
        0 0 0 4px rgba(255,94,20,.10),
        inset 0 0 0 1px #ff5e14;

    transform:translateY(-2px);
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

/* =========================
LABELS
========================= */

.form-label{

    font-size:13px;

    font-weight:700;

    color:#374151;

    margin-bottom:10px;
}

/* =========================
TRUCK ICON
========================= */

.truck-preview{

    width:88px;

    height:88px;

    margin:auto;

    border-radius:24px;

    background:
        linear-gradient(135deg,#3b82f6,#2563eb);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:38px;

    color:#fff;

    box-shadow:
        0 20px 40px rgba(37,99,235,.25);

    margin-bottom:25px;

    position:relative;

    overflow:hidden;
}

.truck-preview::after{

    content:'';

    position:absolute;

    width:120px;

    height:120px;

    border-radius:50%;

    background:rgba(255,255,255,.10);

    top:-50px;

    right:-20px;
}

/* =========================
ERRORS
========================= */

.alert-custom{

    border:none;

    border-radius:16px;

    padding:18px 20px;

    background:#fee2e2;

    color:#991b1b;
}

</style>

</head>

<body>

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

                                    <img src="{{ asset('assets/img/logo/logoNombre.png') }}" alt="TransportesPro">

                                </a>

                            </div>

                        </div>

                        <!-- MENU -->
                        <div class="col-xl-10 col-lg-10">

                            <div class="menu-wrapper d-flex align-items-center justify-content-end">

                                <div class="main-menu d-none d-lg-block">

                                    <nav>

                                        <ul id="navigation" class="d-flex align-items-center">

                                            <li><a href="/">Inicio</a></li>

                                            <li><a href="/admin/viajes">Panel Admin</a></li>

                                            <li><a href="/admin/camiones">Camiones</a></li>

                                            @auth

                                            <li>

                                                <form method="POST" action="{{ route('logout') }}">

                                                    @csrf

                                                    <button
                                                        style="
                                                            background:none;
                                                            border:none;
                                                            color:white;
                                                            cursor:pointer;
                                                        "
                                                    >

                                                        Cerrar sesión

                                                    </button>

                                                </form>

                                            </li>

                                            @endauth

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

<main>

<section class="section-padding30">

    <div class="container">

        <div class="text-center mb-5">

            


        </div>

        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-9">

                <div class="form-card">

                    <div class="truck-preview">

                        🚛

                    </div>

                    <div class="mb-4 text-center">

                        <h3
                            style="
                                font-weight:800;
                                color:#0b1c39;
                                margin-bottom:8px;
                            "
                        >

                            Editar Camión

                        </h3>

                        <p
                            style="
                                color:#6b7280;
                                margin:0;
                            "
                        >

                            Modifica los datos registrados del vehículo.

                        </p>

                    </div>

                    @if ($errors->any())

                    <div class="alert-custom mb-4">

                        <ul class="mb-0">

                            @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                    @endif

                    <form
                        method="POST"
                        action="/admin/camiones/{{ $camion->id }}"
                    >

                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-lg-6 mb-4">

                                <label class="form-label">

                                    Placa

                                </label>

                                <input
                                    type="text"
                                    name="placa"
                                    value="{{ $camion->placa }}"
                                    class="form-control custom-input"
                                    required
                                >

                            </div>

                            <div class="col-lg-6 mb-4">

                                <label class="form-label">

                                    Modelo

                                </label>

                                <input
                                    type="text"
                                    name="modelo"
                                    value="{{ $camion->modelo }}"
                                    class="form-control custom-input"
                                    required
                                >

                            </div>

                            <div class="col-12 mb-4">

                                <label class="form-label">

                                    Capacidad (kg)

                                </label>

                                <input
                                    type="number"
                                    name="capacidad"
                                    value="{{ $camion->capacidad }}"
                                    class="form-control custom-input"
                                    required
                                >

                            </div>

                            <div
                                class="col-12 d-flex justify-content-between align-items-center flex-wrap gap-3"
                            >

                                <a
                                    href="/admin/camiones"
                                    class="action-btn btn-dark-pro"
                                >

                                    ← Volver

                                </a>

                                <button
                                    class="action-btn btn-orange"
                                >

                                    💾 Guardar Cambios

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

</main>

<footer
    style="
        text-align:center;
        padding:25px;
        color:#9ca3af;
        font-size:13px;
    "
>

    © {{ date('Y') }} TransportesPro

</footer>

</body>

</html>