<!doctype html>

<html class="no-js" lang="es">

<head>

    <meta charset="utf-8">

    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Pilotos - TransportesPro</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
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
SEARCH
========================= */

.buscador-pro{

    border:none;

    background:#fff;

    border-radius:16px;

    padding:16px 20px;

    transition:.3s ease;

    width:100%;

    font-size:14px;

    box-shadow:
        0 10px 30px rgba(0,0,0,.05);
}

.buscador-pro:focus{

    outline:none;

    box-shadow:
        0 0 0 4px rgba(255,94,20,.12);

    transform:translateY(-2px);
}

/* =========================
TABLE CARD
========================= */

.table-card{

    background:#fff;

    border-radius:24px;

    overflow:hidden;

    box-shadow:
        0 20px 60px rgba(0,0,0,.06);
}

.table-header{

    padding:28px 30px;

    border-bottom:1px solid #eef2f7;

    display:flex;

    justify-content:space-between;

    align-items:center;

    flex-wrap:wrap;

    gap:18px;
}

.table-header h4{

    margin:0;

    font-size:24px;

    font-weight:800;

    color:#0b1c39;
}

/* =========================
BUTTONS
========================= */

.action-btn{

    border:none;

    border-radius:14px;

    padding:13px 18px;

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

    color:#fff;
}

.btn-green{

    background:#10b981;

    color:#fff;

    box-shadow:
        0 10px 25px rgba(28, 255, 20, 0.25);
}

/* =========================
TABLE
========================= */

.table{

    margin-bottom:0;
}

.table thead th{

    background:#f8fafc;

    border:none;

    padding:18px;

    font-size:12px;

    font-weight:800;

    text-transform:uppercase;

    color:#6b7280;

    letter-spacing:.7px;
}

.table tbody td{

    padding:22px 18px;

    border-top:1px solid #f1f5f9;

    vertical-align:middle;

    font-size:14px;
}

.table tbody tr{

    transition:.25s ease;
}

.table tbody tr:hover{

    background:#fafcff;
}

/* =========================
PILOT AVATAR
========================= */

.pilot-avatar{

    width:44px;

    height:44px;

    border-radius:50%;

    background:#ffefe8;

    color:#ff5e14;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:800;

    font-size:16px;
}

/* =========================
LICENSE BADGE
========================= */

.licencia-badge{

    background:#eef2ff;

    color:#4338ca;

    padding:8px 14px;

    border-radius:999px;

    font-size:12px;

    font-weight:700;
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

                                            <li><a href="/clientes">Clientes</a></li>

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

        <div class="mb-5 text-center">

            <h1 class="page-title">

                Pilotos

            </h1>

            <p class="page-subtitle">

                Administración y monitoreo de pilotos registrados en TransportesPro.

            </p>

        </div>

        <div class="table-card">

            <div class="table-header">

                <h4>

                    👨‍✈️ Lista de pilotos

                </h4>

                <div
                    style="
                        display:flex;
                        gap:12px;
                        align-items:center;
                        flex-wrap:wrap;
                    "
                >

                    <div style="min-width:320px;">

                        <input
                            type="text"
                            id="buscadorPilotos"
                            class="buscador-pro"
                            placeholder="🔍 Buscar piloto..."
                        >

                    </div>

                    <div
    style="
        display:flex;
        gap:12px;
        align-items:center;
        flex-wrap:wrap;
    "
>

    <a
        href="/admin/viajes"
        class="action-btn"
        style="
            background:#0b1c39;
            color:#fff;
        "
    >

        ⬅ Volver

    </a>

    <a
        href="/admin/pilotos/create"
        class="action-btn btn-green"
    >

        ➕ Nuevo Piloto

    </a>

</div>

                </div>

            </div>

            <div class="table-responsive">

                <table class="table" id="tablaPilotos">

                    <thead>

                        <tr>

                            <th>Nombre</th>

                            <th>Teléfono</th>

                            <th>Licencia</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($pilotos as $p)

                        <tr>

                            <td>

                                <div
                                    style="
                                        display:flex;
                                        align-items:center;
                                        gap:14px;
                                    "
                                >

                                    <div class="pilot-avatar">

                                        {{ strtoupper(substr($p->nombre,0,1)) }}

                                    </div>

                                    <div>

                                        <div
                                            style="
                                                font-weight:700;
                                                color:#0b1c39;
                                            "
                                        >

                                            {{ $p->nombre }}

                                        </div>

                                        <small style="color:#9ca3af;">

                                            Piloto registrado

                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>

                                {{ $p->telefono }}

                            </td>

                            <td>

                                <span class="licencia-badge">

                                    {{ $p->licencia }}

                                </span>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="3"
                                style="
                                    text-align:center;
                                    padding:50px;
                                    color:#9ca3af;
                                "
                            >

                                No hay pilotos registrados.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            @isset($pilotos)

                @if(method_exists($pilotos, 'links'))

                <div
                    style="
                        margin-top:25px;
                        padding:0 30px 30px;
                        display:flex;
                        justify-content:center;
                    "
                >

                    {{ $pilotos->links() }}

                </div>

                @endif

            @endisset

        </div>

    </div>

</section>

</main>

<!-- JS -->
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>

document
.getElementById('buscadorPilotos')

.addEventListener('input', function(){

    let filtro =
        this.value.toLowerCase();

    let filas =
        document.querySelectorAll(
            '#tablaPilotos tbody tr'
        );

    filas.forEach(fila => {

        let texto =
            fila.innerText.toLowerCase();

        fila.style.display =
            texto.includes(filtro)
                ? ''
                : 'none';

    });

});

</script>

</body>

</html>