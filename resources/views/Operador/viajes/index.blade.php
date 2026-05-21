<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Panel Operador - TransportesPro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

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

/* =========================
   ESTILO GENERAL
========================= */

body{
    background:#f4f7fb;
    background-image:
        radial-gradient(circle at top right, rgba(255,94,20,.05), transparent 25%),
        radial-gradient(circle at bottom left, rgba(11,28,57,.05), transparent 30%);
}

/* =========================
   WRAP
========================= */

.operador-wrap{
    padding:60px 0 80px;
}

/* =========================
   TITULOS
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
    margin:0;
}

/* =========================
   ALERT
========================= */

.alert-success-custom{
    background:#fff;
    color:#0b1c39;
    border:none;
    border-left:5px solid #ff5e14;
    border-radius:14px;
    padding:18px 22px;
    margin-bottom:28px;
    font-size:14px;
    font-weight:600;
    box-shadow:0 10px 35px rgba(0,0,0,.06);
}

/* =========================
   KPI CARDS
========================= */

.kpi-card{
    background:#fff;
    border-radius:22px;
    padding:22px;
    position:relative;
    overflow:hidden;
    transition:.35s ease;
    box-shadow:0 15px 45px rgba(0,0,0,.06);
    border:1px solid rgba(0,0,0,.03);
    height:100%;
}

.kpi-card:hover{
    transform:translateY(-8px);
    box-shadow:0 25px 60px rgba(0,0,0,.10);
}

.kpi-card::before{
    content:'';
    position:absolute;
    width:140px;
    height:140px;
    border-radius:50%;
    right:-45px;
    top:-45px;
    opacity:.08;
}

.kpi-pendiente::before{
    background:#ffb347;
}

.kpi-aprobado::before{
    background:#2563eb;
}

.kpi-transito::before{
    background:#7c3aed;
}

.kpi-completado::before{
    background:#10b981;
}

.kpi-rechazado::before{
    background:#dc2626;
}


.kpi-icon{
    width:70px;
    height:70px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:32px;
    margin-bottom:20px;
}

.kpi-pendiente .kpi-icon{
    background:rgba(255,179,71,.15);
}

.kpi-aprobado .kpi-icon{
    background:rgba(37,99,235,.12);
}

.kpi-transito .kpi-icon{
    background:rgba(124,58,237,.12);
}

.kpi-completado .kpi-icon{
    background:rgba(16,185,129,.12);
}

.kpi-rechazado .kpi-icon{
    background:rgba(220,38,38,.12);
}

.kpi-num{
    font-size:34px;
    font-weight:800;
    color:#0b1c39;
    line-height:1;
}

.kpi-lbl{
    margin-top:8px;
    color:#6b7280;
    font-size:14px;
    font-weight:600;
}

/* =========================
   PANEL
========================= */

.panel-card{
    background:#fff;
    border-radius:24px;
    overflow:hidden;
    box-shadow:0 15px 50px rgba(0,0,0,.06);
}

.panel-header{
    background:#fff;
    border-bottom:1px solid #eef2f7;
    padding:28px 30px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:15px;
}

.panel-header h4{
    margin:0;
    font-size:26px;
    font-weight:800;
    color:#0b1c39;
}

.panel-body{
    padding:30px;
}

/* =========================
   SEARCH
========================= */

.search-input{
    border:none;
    background:#f7f9fc;
    height:54px;
    padding:0 22px;
    border-radius:999px;
    width:250px;
    transition:.3s ease;
    font-size:14px;
    color:#0b1c39;
    box-shadow:inset 0 0 0 1px #e8edf5;
}

.search-input:focus{
    outline:none;
    width:320px;
    background:#fff;
    box-shadow:
        0 0 0 4px rgba(255,94,20,.10),
        inset 0 0 0 1px #ff5e14;
}

/* =========================
   FILTROS
========================= */

.filtros-bar{
    display:flex;
    flex-wrap:wrap;
    gap:12px;
    margin-bottom:30px;
}

.btn-filtro{
    border:none;
    background:#f3f6fa;
    color:#6b7280;
    border-radius:999px;
    padding:12px 20px;
    font-size:13px;
    font-weight:700;
    transition:.25s ease;
    cursor:pointer;
}

.btn-filtro:hover{
    transform:translateY(-3px);
    background:#fff2eb;
    color:#ff5e14;
}

.btn-filtro.active{
    background:#ff5e14;
    color:#fff;
    box-shadow:0 10px 25px rgba(255,94,20,.25);
}

/* =========================
   TABLA
========================= */

.table-responsive{
    border-radius:18px;
    overflow:hidden;
}

.table{
    margin-bottom:0;
}

.table thead th{
    background:#f7f9fc;
    border:none;
    padding:18px 16px;
    font-size:12px;
    font-weight:800;
    text-transform:uppercase;
    color:#6b7280;
    letter-spacing:.8px;
}

.table tbody td{
    padding:22px 16px;
    vertical-align:middle;
    border-top:1px solid #f1f5f9;
    color:#374151;
    font-size:14px;
}

.table tbody tr{
    transition:.25s ease;
}

.table tbody tr:hover{
    background:#fafcff;
}

/* =========================
   BADGES
========================= */

.badge-estado{
    padding:8px 15px;
    border-radius:999px;
    font-size:11px;
    font-weight:800;
    letter-spacing:.4px;
}

.estado-pendiente{
    background:#fff4df;
    color:#c27c00;
}

.estado-aprobado{
    background:#e7f0ff;
    color:#2563eb;
}

.estado-en_ruta{
    background:#efe7ff;
    color:#7c3aed;
}

.estado-completado{
    background:#dcfce7;
    color:#059669;
}

.estado-rechazado{
    background:#fee2e2;
    color:#dc2626;
}

.estado-cancelado{
    background:#f3f4f6;
    color:#4b5563;
}

/* =========================
   BOTONES
========================= */

.btn-accion{
    border:none;
    border-radius:12px;
    padding:10px 16px;
    font-size:12px;
    font-weight:700;
    transition:.25s ease;
}

.btn-ver{
    background:#0b1c39;
    color:#fff;
}

.btn-ver:hover{
    background:#13284d;
    color:#fff;
}

.btn-aprobar{
    background:#10b981;
    color:#fff;
}

.btn-aprobar:hover{
    background:#059669;
}

.btn-rechazar{
    background:#ef4444;
    color:#fff;
}

.btn-rechazar:hover{
    background:#dc2626;
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    .page-title{
        font-size:30px;
    }

    .panel-header{
        flex-direction:column;
        align-items:flex-start;
    }

    .search-input{
        width:100%;
    }

    .search-input:focus{
        width:100%;
    }

}

</style>
</head>

<body>

<header>
    <div class="header-area">
        <div class="main-header">

            <div class="header-top d-none d-lg-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">

                            <div class="header-info-left">
                                <ul>
                                    <li>TransportesPro - Panel Operativo</li>
                                    <li>operaciones@transportespro.com</li>
                                </ul>
                            </div>

                            <div class="header-info-right">
                                <ul class="header-social">

                                    <li>
                                        <span style="color:#fff;font-size:13px;">
                                            👤 {{ auth()->user()->name }}
                                        </span>
                                    </li>

                                    <li>

    <span
        style="
            background:#ff5e14;
            color:#fff;
            padding:5px 14px;
            border-radius:999px;
            font-size:11px;
            font-weight:700;
        "
    >

        @if(auth()->user()->role === 'admin')

            ADMIN

        @elseif(auth()->user()->role === 'operador')

            OPERADOR

        @elseif(auth()->user()->role === 'piloto')

            PILOTO

        @else

            CLIENTE

        @endif

    </span>

</li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="header-bottom header-sticky">
                <div class="container">

                    <div class="row align-items-center">

                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ asset('assets/img/logo/logoNombre.png') }}" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="col-xl-10 col-lg-10">

                            <div class="menu-wrapper d-flex align-items-center justify-content-end">

                                <div class="main-menu d-none d-lg-block">

                                    <nav>

                                        <ul id="navigation" class="d-flex align-items-center">

                                            <li>

    <a href="/">

        Inicio

    </a>

</li>

@auth

    @if(auth()->user()->role === 'admin')

        <li>

            <a href="/admin/viajes">

                Panel Admin

            </a>

        </li>

        <li>

            <a href="/clientes">

                Clientes

            </a>

        </li>

        <li>

            <a href="/admin/pilotos">

                Pilotos

            </a>

        </li>

        <li>

            <a href="/admin/camiones">

                Camiones

            </a>

        </li>

    @endif

    @if(auth()->user()->role === 'operador')

        <li>

            <a href="/operador/viajes">

                Gestión Viajes

            </a>

        </li>

    @endif

@endauth
                                                <form method="POST"
                                                      action="{{ route('logout') }}"
                                                      style="display:inline;">
                                                    @csrf

                                                    <button style="
                                                        background:none;
                                                        border:none;
                                                        color:white;
                                                        cursor:pointer;
                                                        font-size:14px;
                                                    ">
                                                        Cerrar sesión
                                                    </button>
                                                </form>
                                            </li>

                                        </ul>

                                    </nav>

                                </div>

                            </div>

                        </div>

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

<div class="container operador-wrap">

    <div class="d-flex align-items-center justify-content-between mb-5 flex-wrap">

        <div>
            <h2 class="page-title">
                Panel de Operador
            </h2>

            <p class="page-subtitle">
                Gestión y seguimiento inteligente de viajes
            </p>
        </div>

        <span style="font-size:13px;color:#9ca3af;">
            {{ now()->format('d/m/Y H:i') }}
        </span>

    </div>

    @if(session('success'))
        <div class="alert-success-custom">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="row mb-4">

        <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
            <div class="kpi-card kpi-pendiente">
                <div class="kpi-icon">⏳</div>

                <div>
                    <div class="kpi-num">
                        {{ $viajes->where('estado','pendiente')->count() }}
                    </div>

                    <div class="kpi-lbl">
                        Pendientes
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
            <div class="kpi-card kpi-aprobado">
                <div class="kpi-icon">✅</div>

                <div>
                    <div class="kpi-num">
                        {{ $viajes->where('estado','aprobado')->count() }}
                    </div>

                    <div class="kpi-lbl">
                        Aprobados
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
            <div class="kpi-card kpi-transito">
                <div class="kpi-icon">🚛</div>

                <div>
                    <div class="kpi-num">
                        {{ $viajes->where('estado','en_ruta')->count() }}
                    </div>

                    <div class="kpi-lbl">
                        En ruta
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
            <div class="kpi-card kpi-completado">
                <div class="kpi-icon">📦</div>

                <div>
                    <div class="kpi-num">
                        {{ $viajes->where('estado','completado')->count() }}
                    </div>

                    <div class="kpi-lbl">
                        Completados
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-4 col-md-6 mb-4">
            <div class="kpi-card kpi-rechazado">
                <div class="kpi-icon">❌</div>

                <div>
                    <div class="kpi-num">
                        {{ $viajes->where('estado','rechazado')->count() }}
                    </div>

                    <div class="kpi-lbl">
                        Rechazados
                    </div>
                </div>
            </div>
        </div>
    

    </div>

    <div class="panel-card">

        <div class="panel-header">

            <h4>📋 Gestión de viajes</h4>

            <input
                class="search-input"
                type="text"
                id="buscador"
                placeholder="🔍 Buscar viaje..."
            >

        </div>

        <div class="panel-body">

            <div class="filtros-bar">

                <button class="btn-filtro active" data-estado="todos">
                    Todos ({{ $viajes->count() }})
                </button>

                <button class="btn-filtro" data-estado="pendiente">
                    ⏳ Pendientes
                </button>

                <button class="btn-filtro" data-estado="aprobado">
                    ✅ Aprobados
                </button>

                <button class="btn-filtro" data-estado="en_ruta">
                    🚛 En ruta
                </button>

                <button class="btn-filtro" data-estado="completado">
                    📦 Completados
                </button>

                <button class="btn-filtro" data-estado="cancelado">
                    ❌ Cancelados
                </button>
                
                <button class="btn-filtro" data-estado="rechazado">
                    ⛔ Rechazados
                </button>

            </div>

            <div class="table-responsive">

                <table class="table table-hover" id="tablaViajes">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Origen</th>
                            <th>Destino</th>
                            <th>Piloto</th>
                            <th>Camión</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($viajes as $viaje)

                        <tr data-estado="{{ $viaje->estado }}">

                            <td style="font-weight:700;color:#9ca3af;">
                                #{{ $viaje->id }}
                            </td>

                            <td>
                                <span style="font-weight:700;color:#0b1c39;">
                                    {{ $viaje->cliente->nombre ?? '—' }}
                                </span>

                                <br>

                                <small style="color:#9ca3af;">
                                    {{ $viaje->cliente->email ?? '' }}
                                </small>
                            </td>

                            <td>
                                {{ Str::limit($viaje->origen, 30) }}
                            </td>

                            <td>
                                {{ Str::limit($viaje->destino, 30) }}
                            </td>

                            <td>
                                @if($viaje->piloto)
                                    <span style="font-weight:600;">
                                        {{ $viaje->piloto->nombre }}
                                    </span>
                                @else
                                    <span style="color:#d97706;font-size:12px;">
                                        Sin asignar
                                    </span>
                                @endif
                            </td>

                            <td>
                                @if($viaje->camion)
                                    <span style="font-weight:600;">
                                        {{ $viaje->camion->placa }}
                                    </span>
                                @else
                                    <span style="color:#d97706;font-size:12px;">
                                        Sin asignar
                                    </span>
                                @endif
                            </td>

                            <td>
                                <span class="badge-estado estado-{{ $viaje->estado }}">
                                    {{ ucfirst(str_replace('_',' ',$viaje->estado)) }}
                                </span>
                            </td>

                            <td style="font-size:13px;color:#6b7280;">
                                {{ $viaje->created_at ? $viaje->created_at->format('d/m/Y') : '—' }}
                            </td>

                            <td>

                                <div class="d-flex gap-2 flex-wrap">

                                    <a href="{{ route('operador.viajes.show', $viaje->id) }}"
                                       class="btn-accion btn-ver">
                                        Ver
                                    </a>

                                    @if($viaje->estado === 'pendiente')

                                        <form method="POST"
                                              action="{{ route('operador.viajes.aprobar', $viaje->id) }}"
                                              style="display:inline;">

                                            @csrf
                                            @method('PATCH')

                                            <button class="btn-accion btn-aprobar">
                                                Aprobar
                                            </button>

                                        </form>

                                        <form method="POST"
                                              action="{{ route('operador.viajes.rechazar', $viaje->id) }}"
                                              style="display:inline;">

                                            @csrf
                                            @method('PATCH')

                                            <button class="btn-accion btn-rechazar">
                                                Rechazar
                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="9"
                                style="text-align:center;padding:50px;color:#9ca3af;">
                                No hay viajes registrados aún.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</main>

<footer>
    <div class="footer-area footer-bg" style="padding:20px 0;">
        <div class="container">
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right text-center">
                            <p style="margin:0;">
                                Copyright &copy; {{ date('Y') }}
                                TransportesPro. Panel de Operador.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>

document.querySelectorAll('.btn-filtro').forEach(btn => {

    btn.addEventListener('click', function () {

        document.querySelectorAll('.btn-filtro')
            .forEach(b => b.classList.remove('active'));

        this.classList.add('active');

        const estado = this.dataset.estado;

        document.querySelectorAll('#tablaViajes tbody tr')
            .forEach(row => {

                if (estado === 'todos' || row.dataset.estado === estado) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }

            });

    });

});

document.getElementById('buscador').addEventListener('input', function () {

    const q = this.value.toLowerCase();

    document.querySelectorAll('#tablaViajes tbody tr')
        .forEach(row => {

            row.style.display =
                row.innerText.toLowerCase().includes(q)
                    ? ''
                    : 'none';

        });

});

</script>

</body>
</html>