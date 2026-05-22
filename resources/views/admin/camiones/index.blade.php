<!doctype html>

<html lang="es">

<head>

<meta charset="utf-8">

<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>Camiones - TransportesPro</title>

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
TRUCK ICON
========================= */

.truck-avatar{

    width:52px;

    height:52px;

    border-radius:16px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:20px;

    font-weight:800;

    color:#fff;

    position:relative;

    overflow:hidden;

    box-shadow:
        0 10px 25px rgba(0,0,0,.10);
}

/* Variantes dinámicas */

.truck-red{

    background:
        linear-gradient(135deg,#ef4444,#dc2626);
}

.truck-blue{

    background:
        linear-gradient(135deg,#3b82f6,#2563eb);
}

.truck-green{

    background:
        linear-gradient(135deg,#10b981,#059669);
}

.truck-orange{

    background:
        linear-gradient(135deg,#ff7a18,#ff5e14);
}

.truck-purple{

    background:
        linear-gradient(135deg,#8b5cf6,#6d28d9);
}

.truck-dark{

    background:
        linear-gradient(135deg,#1f2937,#111827);
}

/* Glow */

.truck-avatar::after{

    content:'';

    position:absolute;

    width:70px;

    height:70px;

    background:rgba(255,255,255,.12);

    border-radius:50%;

    top:-30px;

    right:-20px;
}

/* =========================
BADGES
========================= */

.capacity-badge{

    background:#eef2ff;

    color:#4338ca;

    padding:8px 14px;

    border-radius:999px;

    font-size:12px;

    font-weight:700;
}

/* =========================
EDIT BUTTON
========================= */

.btn-edit{

    background:#fff7ed;

    color:#ea580c;

    border:none;

    border-radius:12px;

    padding:10px 14px;

    font-size:13px;

    font-weight:700;

    transition:.25s ease;
}

.btn-edit:hover{

    background:#ffedd5;

    transform:translateY(-2px);
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

                                            <li><a href="/admin/pilotos">Pilotos</a></li>

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

                Camiones

            </h1>

            <p class="page-subtitle">

                Administración y monitoreo de la flota de transporte.

            </p>

        </div>

        <div class="table-card">

            <div class="table-header">

                <h4>

                    Lista de camiones

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
                            id="buscador"
                            class="buscador-pro"
                            placeholder="🔍 Buscar camión..."
                        >

                    </div>

                    <a
                        href="/admin/viajes"
                        class="action-btn btn-dark-pro"
                    >

                        ⬅ Panel Admin

                    </a>

                    <a
                        href="/admin/camiones/create"
                        class="action-btn btn-orange"
                    >

                        ➕ Nuevo Camión

                    </a>

                </div>

            </div>

            <div class="table-responsive">

                <table class="table" id="tablaCamiones">

                    <thead>

                        <tr>

                            <th>Camión</th>

                            <th>Modelo</th>

                            <th>Capacidad</th>

                            <th>Acciones</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($camiones as $c)

                    <tr>

                        <td>

                            <div
                                style="
                                    display:flex;
                                    align-items:center;
                                    gap:14px;
                                "
                            >

                                @php

$colores = [

    'truck-red',
    'truck-blue',
    'truck-green',
    'truck-orange',
    'truck-purple',
    'truck-dark'

];

$colorClase = $colores[$loop->index % count($colores)];

@endphp

<div class="truck-avatar {{ $colorClase }}">

    🚛

</div>

                                <div>

                                    <div
                                        style="
                                            font-weight:700;
                                            color:#0b1c39;
                                        "
                                    >

                                        {{ $c->placa }}

                                    </div>

                                    <small style="color:#9ca3af;">

                                        Camión registrado

                                    </small>

                                </div>

                            </div>

                        </td>

                        <td>

                            {{ $c->modelo }}

                        </td>

                        <td>

                            <span class="capacity-badge">

                                {{ $c->capacidad }} kg

                            </span>

                        </td>

                        <td>

                            <a
                                href="/admin/camiones/{{ $c->id }}/edit"
                                class="btn-edit"
                            >

                                ✏️ Editar

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="4"
                            style="
                                text-align:center;
                                padding:50px;
                                color:#9ca3af;
                            "
                        >

                            No hay camiones registrados.

                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div
                style="
                    margin-top:25px;
                    padding:0 30px 30px;
                    display:flex;
                    justify-content:center;
                "
            >

                {{ $camiones->links() }}

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

<script>

document
.getElementById('buscador')

.addEventListener('input', function(){

    let filtro =
        this.value.toLowerCase();

    let filas =
        document.querySelectorAll(
            '#tablaCamiones tbody tr'
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