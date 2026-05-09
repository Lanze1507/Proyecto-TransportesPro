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
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<style>

/* Fondo general */
body{
    background:#f5f7fa;
}

/* ───────── KPI CARDS ───────── */

.kpi-card{
    border-radius:16px;
    padding:24px 22px;
    color:#fff;
    display:flex;
    align-items:center;
    gap:18px;
    box-shadow:0 8px 30px rgba(0,0,0,.10);
    transition:.25s ease;
    position:relative;
    overflow:hidden;
}

.kpi-card::before{
    content:'';
    position:absolute;
    width:120px;
    height:120px;
    background:rgba(255,255,255,.08);
    border-radius:50%;
    right:-30px;
    top:-30px;
}

.kpi-card:hover{
    transform:translateY(-6px);
}

.kpi-card .kpi-icon{
    font-size:38px;
    opacity:.9;
}

.kpi-card .kpi-num{
    font-size:34px;
    font-weight:800;
    line-height:1;
}

.kpi-card .kpi-lbl{
    font-size:13px;
    opacity:.9;
    margin-top:4px;
    letter-spacing:.3px;
}

.kpi-pendiente{
    background:linear-gradient(135deg,#ffb347,#ff8c42);
}

.kpi-aprobado{
    background:linear-gradient(135deg,#3b82f6,#2563eb);
}

.kpi-transito{
    background:linear-gradient(135deg,#8b5cf6,#7c3aed);
}

.kpi-entregado{
    background:linear-gradient(135deg,#10b981,#059669);
}

/* ───────── PANEL ───────── */

.panel-card{
    background:#fff;
    border-radius:18px;
    box-shadow:0 10px 35px rgba(0,0,0,.06);
    overflow:hidden;
}

.panel-card .panel-header{
    background:#0b1c39;
    color:#fff;
    padding:18px 24px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:10px;
}

.panel-card .panel-header h4{
    margin:0;
    font-size:19px;
    font-weight:700;
}

.panel-card .panel-body{
    padding:24px;
}

/* ───────── TABLA ───────── */

.table{
    margin-bottom:0;
}

.table thead th{
    background:#f8fafc;
    border-top:none;
    border-bottom:1px solid #eef2f7;
    font-size:12px;
    font-weight:700;
    text-transform:uppercase;
    color:#6b7280;
    letter-spacing:.5px;
    padding:14px;
}

.table tbody td{
    padding:16px 14px;
    vertical-align:middle;
}

.table tbody tr{
    transition:.2s ease;
}

.table tbody tr:hover{
    background:#f9fbfd;
}

/* ───────── BADGES ───────── */

.badge-estado{
    padding:6px 13px;
    border-radius:999px;
    font-size:12px;
    font-weight:700;
}

.estado-pendiente{
    background:#fff3cd;
    color:#856404;
}

.estado-aprobado{
    background:#dbeafe;
    color:#1d4ed8;
}

.estado-en_transito{
    background:#ede9fe;
    color:#6d28d9;
}

.estado-entregado{
    background:#d1fae5;
    color:#065f46;
}

.estado-rechazado{
    background:#fee2e2;
    color:#991b1b;
}

.estado-cancelado{
    background:#f3f4f6;
    color:#374151;
}

/* ───────── FILTROS ───────── */

.filtros-bar{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
    margin-bottom:22px;
}

.btn-filtro{
    border-radius:999px;
    padding:7px 18px;
    font-size:13px;
    border:1.5px solid #e5e7eb;
    background:#fff;
    color:#374151;
    cursor:pointer;
    transition:.2s ease;
    font-weight:600;
}

.btn-filtro:hover,
.btn-filtro.active{
    background:#ff5e14;
    color:#fff;
    border-color:#ff5e14;
    transform:translateY(-2px);
}

/* ───────── BOTONES ───────── */

.btn-accion{
    border-radius:8px;
    padding:6px 13px;
    font-size:12px;
    font-weight:700;
    border:none;
    transition:.2s ease;
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

/* ───────── ALERT ───────── */

.alert-success-custom{
    background:#d1fae5;
    color:#065f46;
    border:none;
    border-left:5px solid #10b981;
    border-radius:10px;
    padding:14px 18px;
    margin-bottom:20px;
    font-size:14px;
}

/* ───────── SEARCH ───────── */

.search-input{
    border-radius:999px;
    padding:9px 18px;
    border:1.5px solid #dbe2ea;
    font-size:14px;
    width:240px;
    outline:none;
    transition:.25s ease;
}

.search-input:hover,
.search-input:focus{
    width:300px;
    border-color:#ff5e14;
    box-shadow:0 0 0 4px rgba(255,94,20,.10);
}

/* ───────── WRAP ───────── */

.operador-wrap{
    padding:45px 0 65px;
}

</style>
</head>

<body>

<header>
    <div class="header-area">
        <div class="main-header">

            {{-- TOP BAR ORIGINAL --}}
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
                                        <span style="
                                            background:#ff5e14;
                                            color:#fff;
                                            padding:4px 12px;
                                            border-radius:999px;
                                            font-size:11px;
                                            font-weight:700;
                                        ">
                                            OPERADOR
                                        </span>
                                    </li>

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- NAVBAR --}}
            <div class="header-bottom header-sticky">
                <div class="container">

                    <div class="row align-items-center">

                        {{-- LOGO --}}
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ asset('assets/img/logo/logoNombre.png') }}"
                                         alt="TransportesPro">
                                </a>
                            </div>
                        </div>

                        {{-- MENÚ --}}
                        <div class="col-xl-10 col-lg-10">

                            <div class="menu-wrapper d-flex align-items-center justify-content-end">

                                <div class="main-menu d-none d-lg-block">

                                    <nav>

                                        <ul id="navigation" class="d-flex align-items-center">

                                            <li>
                                                <a href="/">Inicio</a>
                                            </li>
                                            
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

                                            <li>
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

    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap">
        <div>
            <h2 style="font-weight:800;margin:0;">
                Panel de Operador
            </h2>

            <p style="color:#6b7280;margin:0;font-size:14px;">
                Gestión y seguimiento de viajes
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

    {{-- KPIs --}}
    <div class="row mb-4">

        <div class="col-lg-3 col-md-6 mb-3">
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

        <div class="col-lg-3 col-md-6 mb-3">
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

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="kpi-card kpi-transito">
                <div class="kpi-icon">🚛</div>

                <div>
                    <div class="kpi-num">
                        {{ $viajes->where('estado','en_transito')->count() }}
                    </div>

                    <div class="kpi-lbl">
                        En tránsito
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-3">
            <div class="kpi-card kpi-entregado">
                <div class="kpi-icon">📦</div>

                <div>
                    <div class="kpi-num">
                        {{ $viajes->where('estado','entregado')->count() }}
                    </div>

                    <div class="kpi-lbl">
                        Entregados
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- TABLA --}}
    <div class="panel-card">

        <div class="panel-header">
            <h4>📋 Todos los viajes</h4>

            <input
                class="search-input"
                type="text"
                id="buscador"
                placeholder="🔍 Buscar viaje..."
            >
        </div>

        <div class="panel-body">

            {{-- FILTROS --}}
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

                <button class="btn-filtro" data-estado="en_transito">
                    🚛 En tránsito
                </button>

                <button class="btn-filtro" data-estado="entregado">
                    📦 Entregados
                </button>

                <button class="btn-filtro" data-estado="cancelado">
                    ❌ Cancelados
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

                            <td style="font-weight:600;color:#9ca3af;font-size:13px;">
                                #{{ $viaje->id }}
                            </td>

                            <td>
                                <span style="font-weight:600;">
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

                                <div class="d-flex gap-1 flex-wrap">

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
                            <td colspan="9" style="text-align:center;padding:40px;color:#9ca3af;">
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