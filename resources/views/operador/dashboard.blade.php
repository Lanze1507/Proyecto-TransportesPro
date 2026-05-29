<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard Operador | TransportesPro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<style>
body { background: #f4f7fb; }
.dash-wrap { padding: 50px 0 80px; }

/* Topbar */
.topbar {
    background: #0b1c39; padding: 10px 0;
    position: sticky; top: 0; z-index: 999;
    box-shadow: 0 2px 16px rgba(0,0,0,.25);
}
.topbar .brand { font-size:18px; font-weight:800; color:#fff; text-decoration:none; }
.topbar .brand span { color:#ff5e14; }
.topbar .nav-links a {
    color:rgba(255,255,255,.75); font-size:13px; font-weight:600;
    text-decoration:none; margin-left:24px; transition:color .15s;
}
.topbar .nav-links a:hover, .topbar .nav-links a.active { color:#ff5e14; }
.role-badge {
    background:rgba(255,94,20,.15); border:1px solid rgba(255,94,20,.3);
    color:#ff5e14; font-size:12px; font-weight:700;
    padding:4px 12px; border-radius:999px; margin-left:12px;
}
.btn-logout {
    background:none; border:1.5px solid rgba(255,255,255,.2);
    color:rgba(255,255,255,.7); font-size:12px; font-weight:600;
    padding:5px 14px; border-radius:8px; cursor:pointer; margin-left:14px;
    transition:all .15s;
}
.btn-logout:hover { border-color:#ff5e14; color:#ff5e14; }

/* KPI Cards */
.kpi-card {
    background:#fff; border-radius:16px; padding:24px 20px;
    position:relative; overflow:hidden;
    box-shadow:0 6px 24px rgba(0,0,0,.07);
    border:1px solid rgba(0,0,0,.04);
    transition:.25s ease; height:100%;
    text-decoration:none; display:block;
}
.kpi-card:hover { transform:translateY(-5px); box-shadow:0 18px 48px rgba(0,0,0,.11); text-decoration:none; }
.kpi-card .kpi-icon { font-size:32px; margin-bottom:10px; display:block; }
.kpi-card .kpi-num  { font-size:38px; font-weight:800; line-height:1; margin-bottom:4px; }
.kpi-card .kpi-lbl  { font-size:13px; font-weight:600; color:#6b7280; margin:0; }
.kpi-card::after {
    content:''; position:absolute; width:100px; height:100px;
    border-radius:50%; right:-20px; bottom:-20px; opacity:.08;
}
.kpi-pendiente  .kpi-num { color:#d97706; } .kpi-pendiente::after  { background:#f59e0b; }
.kpi-transito   .kpi-num { color:#7c3aed; } .kpi-transito::after   { background:#8b5cf6; }
.kpi-completado .kpi-num { color:#059669; } .kpi-completado::after { background:#10b981; }
.kpi-total      .kpi-num { color:#0b1c39; } .kpi-total::after      { background:#0b1c39; }
.kpi-pilotos    .kpi-num { color:#0891b2; } .kpi-pilotos::after    { background:#06b6d4; }
.kpi-camiones   .kpi-num { color:#dc2626; } .kpi-camiones::after   { background:#ef4444; }

/* Panel */
.panel-card { background:#fff; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,.07); overflow:hidden; margin-bottom:24px; }
.panel-head { background:#0b1c39; color:#fff; padding:14px 22px; display:flex; align-items:center; justify-content:space-between; }
.panel-head h5 { margin:0; font-size:15px; font-weight:700; }
.panel-head a  { color:#ff5e14; font-size:13px; font-weight:600; text-decoration:none; }

/* Tabla */
.table-sm thead th {
    background:#f8fafc; font-size:11px; font-weight:700;
    text-transform:uppercase; letter-spacing:.5px;
    color:#6b7280; border-top:none; padding:10px 14px;
}
.table-sm tbody td { font-size:13px; padding:10px 14px; vertical-align:middle; border-color:#f3f4f6; }
.table-sm tbody tr:hover { background:#fafafa; }

/* Badges */
.badge-estado { padding:4px 12px; border-radius:999px; font-size:11px; font-weight:700; }
.estado-pendiente  { background:#fef3c7; color:#92400e; }
.estado-aprobado   { background:#dbeafe; color:#1e40af; }
.estado-en_ruta    { background:#ede9fe; color:#5b21b6; }
.estado-completado { background:#d1fae5; color:#065f46; }
.estado-cancelado  { background:#f3f4f6; color:#374151; }
.estado-rechazado  { background:#fee2e2; color:#991b1b; }

.btn-ver {
    background:#0b1c39; color:#fff; border:none; border-radius:8px;
    padding:4px 12px; font-size:12px; font-weight:600;
    text-decoration:none; transition:background .15s;
}
.btn-ver:hover { background:#ff5e14; color:#fff; text-decoration:none; }

/* Alerta pendientes */
.alerta-pendientes {
    border-left:5px solid #f59e0b; background:#fffbeb;
    border-radius:12px; padding:16px 20px;
    font-size:14px; font-weight:600; color:#92400e;
    margin-bottom:24px;
}

/* Recurso row */
.recurso-row {
    display:flex; justify-content:space-between; align-items:center;
    padding:10px 0; border-bottom:1px solid #f3f4f6; font-size:13px;
}
.recurso-row:last-child { border-bottom:none; }
</style>
</head>
<body>

{{-- TOPBAR --}}
<div class="topbar">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('operador.dashboard') }}" class="brand">Trans<span>Pro</span></a>
            <div class="nav-links d-none d-lg-flex">
                <a href="{{ route('operador.dashboard') }}" class="active">Dashboard</a>
                <a href="{{ route('operador.viajes.index') }}">Viajes</a>
            </div>
            <div class="d-flex align-items-center">
                <span style="color:rgba(255,255,255,.6);font-size:13px;">👤 {{ auth()->user()->name }}</span>
                <span class="role-badge">OPERADOR</span>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button class="btn-logout">Salir</button>
                </form>
            </div>
        </div>
    </div>
</div>

<main>
<div class="container dash-wrap">

    @if(session('success'))
        <div class="alerta-pendientes" style="border-color:#10b981;background:#f0fdf4;color:#065f46;">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- Header --}}
    <div class="d-flex align-items-start justify-content-between mb-4 flex-wrap" style="gap:12px;">
        <div>
            <h2 style="font-weight:800;color:#0b1c39;margin:0 0 4px;">Dashboard Operador</h2>
            <p style="color:#6b7280;font-size:14px;margin:0;">
                Resumen operativo · {{ now()->format('d/m/Y H:i') }}
            </p>
        </div>
        <a href="{{ route('operador.viajes.index') }}"
        style="background:#ff5e14;color:#fff;padding:10px 20px;border-radius:10px;font-size:14px;font-weight:700;text-decoration:none;">
            Ver todos los viajes →
        </a>
    </div>

    {{-- Alerta si hay pendientes --}}
    @if($stats['pendientes'] > 0)
    <div class="alerta-pendientes">
        ⚠️ Hay <strong>{{ $stats['pendientes'] }}</strong>
        {{ $stats['pendientes'] == 1 ? 'viaje pendiente' : 'viajes pendientes' }}
        esperando tu aprobación.
        <a href="{{ route('operador.viajes.index') }}" style="color:#d97706;margin-left:8px;font-weight:700;">
            Revisar ahora →
        </a>
    </div>
    @endif

    {{-- KPIs fila 1 --}}
    <div class="row g-3 mb-3">
        <div class="col-6 col-lg-3">
            <a href="{{ route('operador.viajes.index') }}" class="kpi-card kpi-total">
                <span class="kpi-icon">🗺️</span>
                <div class="kpi-num">{{ $stats['total'] }}</div>
                <p class="kpi-lbl">Total viajes</p>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a href="{{ route('operador.viajes.index') }}" class="kpi-card kpi-pendiente">
                <span class="kpi-icon">⏳</span>
                <div class="kpi-num">{{ $stats['pendientes'] }}</div>
                <p class="kpi-lbl">Pendientes</p>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a href="{{ route('operador.viajes.index') }}" class="kpi-card kpi-transito">
                <span class="kpi-icon">🚛</span>
                <div class="kpi-num">{{ $stats['en_ruta'] }}</div>
                <p class="kpi-lbl">En ruta</p>
            </a>
        </div>
        <div class="col-6 col-lg-3">
            <a href="{{ route('operador.viajes.index') }}" class="kpi-card kpi-completado">
                <span class="kpi-icon">📦</span>
                <div class="kpi-num">{{ $stats['completados'] }}</div>
                <p class="kpi-lbl">Completados</p>
            </a>
        </div>
    </div>

    {{-- KPIs fila 2 --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="kpi-card kpi-pilotos" style="cursor:default;">
                <span class="kpi-icon">🧑‍✈️</span>
                <div class="kpi-num">{{ $stats['pilotos_activos'] }}</div>
                <p class="kpi-lbl">Pilotos disponibles</p>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="kpi-card kpi-camiones" style="cursor:default;">
                <span class="kpi-icon">🚚</span>
                <div class="kpi-num">{{ $stats['camiones_disponibles'] }}</div>
                <p class="kpi-lbl">Camiones disponibles</p>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="kpi-card" style="cursor:default;">
                <span class="kpi-icon">❌</span>
                <div class="kpi-num" style="color:#dc2626;">{{ $stats['cancelados'] }}</div>
                <p class="kpi-lbl">Cancelados</p>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="kpi-card" style="cursor:default;">
                <span class="kpi-icon">🏢</span>
                <div class="kpi-num" style="color:#7c3aed;">{{ $stats['clientes'] }}</div>
                <p class="kpi-lbl">Clientes</p>
            </div>
        </div>
    </div>

    <div class="row g-4">

        {{-- Columna principal --}}
        <div class="col-lg-8">

            {{-- Viajes que requieren atención --}}
            @if($viajes_pendientes->count() > 0)
            <div class="panel-card" style="border:2px solid #fef3c7;">
                <div class="panel-head" style="background:linear-gradient(135deg,#d97706,#f59e0b);">
                    <h5>⚠️ Requieren atención ({{ $viajes_pendientes->count() }})</h5>
                    <a href="{{ route('operador.viajes.index') }}">Ver todos</a>
                </div>
                <div style="padding:0;">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Origen → Destino</th>
                                <th>Hace</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($viajes_pendientes as $v)
                            <tr>
                                <td style="font-weight:700;color:#9ca3af;">#{{ $v->id }}</td>
                                <td style="font-weight:600;">{{ $v->cliente->nombre ?? '—' }}</td>
                                <td style="font-size:12px;color:#6b7280;">
                                    {{ Str::limit($v->origen, 18) }}
                                    <span style="color:#ff5e14;">→</span>
                                    {{ Str::limit($v->destino, 18) }}
                                </td>
                                <td style="color:#9ca3af;font-size:12px;">
                                    {{ $v->created_at?->diffForHumans() }}
                                </td>
                                <td>
                                    <a href="{{ route('operador.viajes.show', $v->id) }}"
                                    class="btn-ver">Gestionar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            {{-- Últimos viajes --}}
            <div class="panel-card">
                <div class="panel-head">
                    <h5>📋 Últimos 8 viajes</h5>
                    <a href="{{ route('operador.viajes.index') }}">Ver todos →</a>
                </div>
                <div style="padding:0;">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Guía</th>
                                <th>Cliente</th>
                                <th>Destino</th>
                                <th>Piloto</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($viajes_recientes as $v)
                            <tr>
                                <td style="font-family:monospace;font-size:12px;color:#6b7280;">
                                    {{ $v->codigo_guia ?? '#'.$v->id }}
                                </td>
                                <td style="font-weight:600;font-size:13px;">
                                    {{ $v->cliente->nombre ?? '—' }}
                                </td>
                                <td style="font-size:12px;color:#6b7280;">
                                    {{ Str::limit($v->destino, 25) }}
                                </td>
                                <td style="font-size:12px;">
                                    {{ $v->piloto->nombre ?? '—' }}
                                </td>
                                <td>
                                    <span class="badge-estado estado-{{ $v->estado }}">
                                        {{ ucfirst(str_replace('_',' ',$v->estado)) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('operador.viajes.show', $v->id) }}"
                                    class="btn-ver">Ver</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align:center;padding:30px;color:#9ca3af;">
                                    No hay viajes registrados.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>{{-- /col-lg-8 --}}

        {{-- Columna lateral --}}
        <div class="col-lg-4">

            {{-- Acciones rápidas --}}
            <div class="panel-card mb-4">
                <div class="panel-head"><h5>⚡ Acciones rápidas</h5></div>
                <div style="padding:16px;">
                    <a href="{{ route('operador.viajes.index') }}"
                    style="display:block;background:#f8fafc;border:1.5px solid #e5e7eb;border-radius:10px;
                            padding:12px 16px;text-decoration:none;color:#374151;font-size:13px;
                            font-weight:600;margin-bottom:10px;transition:all .15s;"
                    onmouseover="this.style.background='#0b1c39';this.style.color='#fff'"
                    onmouseout="this.style.background='#f8fafc';this.style.color='#374151'">
                        📋 Ver todos los viajes
                    </a>
                    <a href="{{ route('operador.viajes.index') }}?estado=pendiente"
                    style="display:block;background:#fffbeb;border:1.5px solid #fde68a;border-radius:10px;
                            padding:12px 16px;text-decoration:none;color:#92400e;font-size:13px;
                            font-weight:600;margin-bottom:10px;">
                        ⏳ Ver pendientes ({{ $stats['pendientes'] }})
                    </a>
                    <a href="{{ route('operador.viajes.index') }}?estado=en_ruta"
                    style="display:block;background:#f5f3ff;border:1.5px solid #ddd6fe;border-radius:10px;
                            padding:12px 16px;text-decoration:none;color:#5b21b6;font-size:13px;
                            font-weight:600;">
                        🚛 Ver en ruta ({{ $stats['en_ruta'] }})
                    </a>
                </div>
            </div>

            {{-- Estado de recursos --}}
            <div class="panel-card">
                <div class="panel-head"><h5>🔧 Estado de recursos</h5></div>
                <div style="padding:16px 20px;">
                    <div class="recurso-row">
                        <span style="color:#6b7280;">Pilotos disponibles</span>
                        <strong style="color:#059669;">{{ $stats['pilotos_activos'] }}</strong>
                    </div>
                    <div class="recurso-row">
                        <span style="color:#6b7280;">Camiones disponibles</span>
                        <strong style="color:#059669;">{{ $stats['camiones_disponibles'] }}</strong>
                    </div>
                    <div class="recurso-row">
                        <span style="color:#6b7280;">Viajes aprobados</span>
                        <strong style="color:#2563eb;">{{ $stats['aprobados'] }}</strong>
                    </div>
                    <div class="recurso-row">
                        <span style="color:#6b7280;">Viajes rechazados</span>
                        <strong style="color:#dc2626;">{{ $stats['rechazados'] }}</strong>
                    </div>
                    <div class="recurso-row">
                        <span style="color:#6b7280;">Total clientes</span>
                        <strong style="color:#0b1c39;">{{ $stats['clientes'] }}</strong>
                    </div>
                </div>
            </div>

        </div>{{-- /col-lg-4 --}}
    </div>{{-- /row --}}

</div>
</main>

<footer>
    <div class="footer-area footer-bg" style="padding:20px 0;">
        <div class="container">
            <div class="footer-copy-right text-center">
                <p style="margin:0;">Copyright &copy; {{ date('Y') }} TransportesPro · Panel de Operador</p>
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
</body>
</html>