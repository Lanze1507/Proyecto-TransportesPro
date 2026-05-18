<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard Piloto | TransportesPro</title>
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

/* ── Topbar ── */
.topbar {
    background: #0b1c39;
    padding: 10px 0;
    position: sticky; top: 0; z-index: 999;
    box-shadow: 0 2px 16px rgba(0,0,0,.25);
}
.topbar .brand { font-size:18px; font-weight:800; color:#fff; text-decoration:none; }
.topbar .brand span { color:#ff5e14; }
.topbar .nav-links a {
    color:rgba(255,255,255,.75); font-size:13px; font-weight:600;
    text-decoration:none; margin-left:24px; transition:color .15s;
}
.topbar .nav-links a:hover { color:#ff5e14; }
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

/* ── Page header ── */
.page-header { display:flex; align-items:flex-start; justify-content:space-between; margin-bottom:36px; flex-wrap:wrap; gap:12px; }
.page-header h1 { font-size:34px; font-weight:800; color:#0b1c39; margin:0 0 4px; }
.page-header p  { color:#6b7280; font-size:14px; margin:0; }

/* ── KPI Cards ── */
.kpi-card {
    background:#fff; border-radius:20px; padding:26px 22px;
    position:relative; overflow:hidden; height:100%;
    box-shadow:0 8px 32px rgba(0,0,0,.06);
    border:1px solid rgba(0,0,0,.03);
    transition:.3s ease;
}
.kpi-card:hover { transform:translateY(-5px); box-shadow:0 20px 50px rgba(0,0,0,.10); }
.kpi-card .kpi-icon { font-size:34px; margin-bottom:12px; display:block; }
.kpi-card .kpi-num  { font-size:40px; font-weight:800; line-height:1; margin-bottom:4px; }
.kpi-card .kpi-lbl  { font-size:13px; font-weight:600; color:#6b7280; margin:0; }
.kpi-card::after {
    content:''; position:absolute; width:110px; height:110px;
    border-radius:50%; right:-25px; bottom:-25px; opacity:.08;
}
.kpi-total    .kpi-num { color:#0b1c39; } .kpi-total::after    { background:#0b1c39; }
.kpi-activo   .kpi-num { color:#7c3aed; } .kpi-activo::after   { background:#8b5cf6; }
.kpi-proximo  .kpi-num { color:#2563eb; } .kpi-proximo::after  { background:#3b82f6; }
.kpi-hecho    .kpi-num { color:#059669; } .kpi-hecho::after    { background:#10b981; }

/* ── Panel card ── */
.panel-card { background:#fff; border-radius:18px; box-shadow:0 6px 28px rgba(0,0,0,.06); overflow:hidden; margin-bottom:24px; }
.panel-head { background:#0b1c39; color:#fff; padding:15px 22px; display:flex; align-items:center; justify-content:space-between; }
.panel-head h5 { margin:0; font-size:15px; font-weight:700; }
.panel-body { padding:20px 22px; }

/* ── Viaje activo ── */
.viaje-activo-card {
    background: linear-gradient(135deg, #0b1c39 0%, #1a3a6b 100%);
    border-radius: 20px;
    padding: 30px;
    color: #fff;
    position: relative;
    overflow: hidden;
    margin-bottom: 24px;
    box-shadow: 0 12px 40px rgba(11,28,57,.3);
}
.viaje-activo-card::before {
    content:'🚛';
    position:absolute; right:24px; top:50%;
    transform:translateY(-50%);
    font-size:80px; opacity:.12;
}
.viaje-activo-card .va-label {
    font-size:11px; font-weight:700; letter-spacing:2px;
    color:#ff5e14; text-transform:uppercase; margin-bottom:10px;
}
.viaje-activo-card h3 { font-size:22px; font-weight:800; margin:0 0 6px; }
.viaje-activo-card .va-sub { font-size:13px; color:rgba(255,255,255,.65); margin:0; }
.va-ruta {
    display:flex; align-items:center; gap:10px;
    margin:18px 0; font-size:15px; font-weight:600;
}
.va-ruta .arrow { color:#ff5e14; font-size:18px; }
.va-info { display:flex; gap:20px; flex-wrap:wrap; margin-top:18px; }
.va-info .vi-item { font-size:13px; }
.va-info .vi-item span { color:rgba(255,255,255,.55); display:block; font-size:11px; }

/* ── Badges ── */
.badge-estado {
    padding:4px 12px; border-radius:999px;
    font-size:11px; font-weight:700; white-space:nowrap;
}
.estado-pendiente  { background:#fef3c7; color:#92400e; }
.estado-aprobado   { background:#dbeafe; color:#1e40af; }
.estado-en_transito{ background:#ede9fe; color:#5b21b6; }
.estado-en_ruta    { background:#ede9fe; color:#5b21b6; }
.estado-entregado  { background:#d1fae5; color:#065f46; }
.estado-completado { background:#d1fae5; color:#065f46; }
.estado-cancelado  { background:#f3f4f6; color:#374151; }
.estado-rechazado  { background:#fee2e2; color:#991b1b; }

/* ── Tabla ── */
.table-sm thead th {
    background:#f8fafc; font-size:11px; font-weight:700;
    text-transform:uppercase; letter-spacing:.5px;
    color:#6b7280; border-top:none; padding:10px 14px;
}
.table-sm tbody td {
    font-size:13px; padding:10px 14px;
    vertical-align:middle; border-color:#f3f4f6;
}
.table-sm tbody tr:hover { background:#fafafa; }

/* ── Perfil card ── */
.perfil-card {
    background: linear-gradient(135deg,#ff5e14,#ff7a18);
    border-radius:18px; padding:26px 22px; color:#fff;
    margin-bottom:24px; box-shadow:0 8px 32px rgba(255,94,20,.25);
}
.perfil-card .avatar {
    width:64px; height:64px; border-radius:50%;
    background:rgba(255,255,255,.2);
    display:flex; align-items:center; justify-content:center;
    font-size:28px; margin-bottom:14px;
}
.perfil-card h4 { font-size:20px; font-weight:800; margin:0 0 4px; }
.perfil-card .info-row-p { font-size:13px; color:rgba(255,255,255,.8); padding:5px 0; border-bottom:1px solid rgba(255,255,255,.15); }
.perfil-card .info-row-p:last-child { border-bottom:none; }
.perfil-card .info-row-p strong { color:#fff; float:right; }

/* ── Sin datos ── */
.empty-state { text-align:center; padding:30px; color:#9ca3af; font-size:13px; }

/* ── Alert ── */
.alert-op {
    background:#fff; border:none; border-left:5px solid #ff5e14;
    border-radius:14px; padding:14px 20px; font-size:14px;
    font-weight:600; color:#0b1c39;
    box-shadow:0 6px 24px rgba(0,0,0,.06); margin-bottom:24px;
}

</style>
</head>
<body>

{{-- ══ TOP BAR ══ --}}
<div class="topbar">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('piloto.dashboard') }}" class="brand">Trans<span>Pro</span></a>
            <div class="nav-links d-none d-lg-flex">
                <a href="{{ route('piloto.dashboard') }}">Dashboard</a>
            </div>
            <div class="d-flex align-items-center">
                <span style="color:rgba(255,255,255,.6);font-size:13px;">
                    👤 {{ auth()->user()->name }}
                </span>
                <span class="role-badge">PILOTO</span>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button class="btn-logout">Salir</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ══ CONTENIDO ══ --}}
<main>
<div class="container dash-wrap">

    @if(session('success'))
        <div class="alert-op">✅ {{ session('success') }}</div>
    @endif

    {{-- Header --}}
    <div class="page-header">
        <div>
            <h1>Bienvenido, {{ $pilotos->nombre }} 👋</h1>
            <p>Tu panel de viajes · {{ now()->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    {{-- ══ KPIs ══ --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-lg-3">
            <div class="kpi-card kpi-total">
                <span class="kpi-icon">🗺️</span>
                <div class="kpi-num">{{ $stats['total'] }}</div>
                <p class="kpi-lbl">Total viajes</p>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="kpi-card kpi-activo">
                <span class="kpi-icon">🚛</span>
                <div class="kpi-num">{{ $stats['en_transito'] }}</div>
                <p class="kpi-lbl">En tránsito</p>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="kpi-card kpi-proximo">
                <span class="kpi-icon">⏳</span>
                <div class="kpi-num">{{ $stats['pendientes'] }}</div>
                <p class="kpi-lbl">Por iniciar</p>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="kpi-card kpi-hecho">
                <span class="kpi-icon">✅</span>
                <div class="kpi-num">{{ $stats['completados'] }}</div>
                <p class="kpi-lbl">Completados</p>
            </div>
        </div>
    </div>

    <div class="row g-4">

        {{-- ══ Columna principal ══ --}}
        <div class="col-lg-8">

            {{-- Viaje activo --}}
            @if($viaje_activo)
            <div class="viaje-activo-card">
                <p class="va-label">● Viaje en curso ahora</p>
                <h3>Viaje #{{ $viaje_activo->id }}</h3>
                <p class="va-sub">Cliente: {{ $viaje_activo->cliente->nombre ?? '—' }}</p>

                <div class="va-ruta">
                    <span>📍 {{ Str::limit($viaje_activo->origen, 35) }}</span>
                    <span class="arrow">→</span>
                    <span>🏁 {{ Str::limit($viaje_activo->destino, 35) }}</span>
                </div>

                <div class="va-info">
                    <div class="vi-item">
                        <span>Camión</span>
                        {{ $viaje_activo->camion->placa ?? '—' }}
                    </div>
                    <div class="vi-item">
                        <span>Modelo</span>
                        {{ $viaje_activo->camion->modelo ?? '—' }}
                    </div>
                    <div class="vi-item">
                        <span>Estado</span>
                        {{ ucfirst(str_replace('_',' ',$viaje_activo->estado)) }}
                    </div>
                    <div class="vi-item">
                        <span>Iniciado</span>
                        {{ $viaje_activo->updated_at?->format('d/m/Y H:i') }}
                    </div>
                </div>

                {{-- Mapa si hay coordenadas --}}
                @if($viaje_activo->lat_origen && $viaje_activo->lng_origen)
                <div id="mapa-activo"
                    style="margin-top:20px;border-radius:12px;overflow:hidden;height:200px;"></div>
                @endif
            </div>

            {{-- Historial del viaje activo --}}
            @if($viaje_activo->historial->count())
            <div class="panel-card mb-4">
                <div class="panel-head">
                    <h5>📋 Historial del viaje actual</h5>
                </div>
                <div class="panel-body" style="padding:0 22px;">
                    @foreach($viaje_activo->historial as $h)
                    <div style="display:flex;gap:12px;align-items:flex-start;padding:10px 0;border-bottom:1px solid #f3f4f6;">
                        <div style="width:8px;height:8px;border-radius:50%;background:#ff5e14;margin-top:5px;flex-shrink:0;"></div>
                        <div>
                            <p style="margin:0;font-size:13px;color:#374151;">{{ $h->descripcion }}</p>
                            <p style="margin:2px 0 0;font-size:11px;color:#9ca3af;">{{ $h->created_at?->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @else
            {{-- Sin viaje activo --}}
            <div class="panel-card mb-4" style="border:2px dashed #e5e7eb;">
                <div class="panel-body empty-state">
                    <div style="font-size:48px;margin-bottom:12px;">🟢</div>
                    <p style="font-size:16px;font-weight:700;color:#374151;margin:0 0 4px;">Sin viaje activo en este momento</p>
                    <p style="margin:0;">Estás disponible. El operador te asignará el próximo viaje.</p>
                </div>
            </div>
            @endif

            {{-- Próximos viajes (aprobados listos para iniciar) --}}
            @if($viajes_proximos->count())
            <div class="panel-card mb-4">
                <div class="panel-head" style="background:linear-gradient(135deg,#2563eb,#1d4ed8);">
                    <h5>📅 Próximos viajes asignados ({{ $viajes_proximos->count() }})</h5>
                </div>
                <div class="panel-body" style="padding:0;">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Origen → Destino</th>
                                <th>Camión</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($viajes_proximos as $v)
                            <tr>
                                <td style="font-weight:700;color:#9ca3af;">#{{ $v->id }}</td>
                                <td style="font-weight:600;">{{ $v->cliente->nombre ?? '—' }}</td>
                                <td style="font-size:12px;">
                                    {{ Str::limit($v->origen, 18) }}
                                    <span style="color:#ff5e14;">→</span>
                                    {{ Str::limit($v->destino, 18) }}
                                </td>
                                <td>{{ $v->camion->placa ?? '—' }}</td>
                                <td>
                                    <span class="badge-estado estado-{{ $v->estado }}">
                                        {{ ucfirst(str_replace('_',' ',$v->estado)) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            {{-- Historial de viajes completados --}}
            <div class="panel-card">
                <div class="panel-head">
                    <h5>📦 Historial de viajes</h5>
                </div>
                <div class="panel-body" style="padding:0;">
                    <table class="table table-sm table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cliente</th>
                                <th>Destino</th>
                                <th>Camión</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($viajes_recientes as $v)
                            <tr>
                                <td style="font-weight:700;color:#9ca3af;">#{{ $v->id }}</td>
                                <td style="font-weight:600;">{{ $v->cliente->nombre ?? '—' }}</td>
                                <td style="font-size:12px;color:#6b7280;">{{ Str::limit($v->destino, 28) }}</td>
                                <td>{{ $v->camion->placa ?? '—' }}</td>
                                <td>
                                    <span class="badge-estado estado-{{ $v->estado }}">
                                        {{ ucfirst(str_replace('_',' ',$v->estado)) }}
                                    </span>
                                </td>
                                <td style="font-size:12px;color:#9ca3af;">
                                    {{ $v->updated_at?->format('d/m/Y') }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="empty-state">Sin historial de viajes aún.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>{{-- /col-lg-8 --}}

        {{-- ══ Columna lateral: perfil del piloto ══ --}}
        <div class="col-lg-4">

            {{-- Perfil --}}
            <div class="perfil-card">
                <div class="avatar">🧑‍✈️</div>
                <h4>{{ $pilotos->nombre }}</h4>
                <p style="font-size:13px;color:rgba(255,255,255,.7);margin:0 0 16px;">
                    {{ auth()->user()->email }}
                </p>
                <div class="info-row-p">
                    Teléfono <strong>{{ $pilotos->telefono ?? '—' }}</strong>
                </div>
                <div class="info-row-p">
                    Licencia <strong>{{ $pilotos->licencia ?? '—' }}</strong>
                </div>
                <div class="info-row-p">
                    DPI <strong>{{ $pilotos->dpi ?? '—' }}</strong>
                </div>
                <div class="info-row-p">
                    Estado
                    <strong>
                        @if($stats['en_transito'] > 0)
                            🟠 En ruta
                        @else
                            🟢 Disponible
                        @endif
                    </strong>
                </div>
            </div>

            {{-- Resumen numérico --}}
            <div class="panel-card">
                <div class="panel-head">
                    <h5>📊 Tu resumen</h5>
                </div>
                <div class="panel-body">
                    @php
                        $total = $stats['total'] ?: 1;
                        $pct = round(($stats['completados'] / $total) * 100);
                    @endphp
                    <p style="font-size:13px;color:#6b7280;margin:0 0 6px;">
                        Tasa de completados
                    </p>
                    <div style="font-size:32px;font-weight:800;color:#059669;margin-bottom:6px;">
                        {{ $pct }}%
                    </div>
                    <div style="height:8px;border-radius:999px;background:#f1f5f9;overflow:hidden;margin-bottom:20px;">
                        <div style="height:100%;width:{{ $pct }}%;background:linear-gradient(90deg,#10b981,#059669);border-radius:999px;transition:width .6s;"></div>
                    </div>

                    <div style="display:flex;justify-content:space-between;font-size:13px;padding:8px 0;border-bottom:1px solid #f3f4f6;">
                        <span style="color:#6b7280;">Total asignados</span>
                        <span style="font-weight:700;">{{ $stats['total'] }}</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;font-size:13px;padding:8px 0;border-bottom:1px solid #f3f4f6;">
                        <span style="color:#6b7280;">Completados</span>
                        <span style="font-weight:700;color:#059669;">{{ $stats['completados'] }}</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;font-size:13px;padding:8px 0;border-bottom:1px solid #f3f4f6;">
                        <span style="color:#6b7280;">En tránsito</span>
                        <span style="font-weight:700;color:#7c3aed;">{{ $stats['en_transito'] }}</span>
                    </div>
                    <div style="display:flex;justify-content:space-between;font-size:13px;padding:8px 0;">
                        <span style="color:#6b7280;">Por iniciar</span>
                        <span style="font-weight:700;color:#2563eb;">{{ $stats['pendientes'] }}</span>
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
                <p style="margin:0;">Copyright &copy; {{ date('Y') }} TransportesPro · Panel de Piloto</p>
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

{{-- Mapa del viaje activo --}}
@if(isset($viaje_activo) && $viaje_activo && $viaje_activo->lat_origen && $viaje_activo->lng_origen)
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const latO = {{ $viaje_activo->lat_origen }};
    const lngO = {{ $viaje_activo->lng_origen }};
    const latD = {{ $viaje_activo->lat_destino ?? 'null' }};
    const lngD = {{ $viaje_activo->lng_destino ?? 'null' }};

    const map = L.map('mapa-activo').setView([latO, lngO], 7);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    L.marker([latO, lngO]).addTo(map)
        .bindPopup('<b>Origen</b><br>{{ addslashes($viaje_activo->origen) }}')
        .openPopup();

    if (latD && lngD) {
        L.marker([latD, lngD]).addTo(map)
            .bindPopup('<b>Destino</b><br>{{ addslashes($viaje_activo->destino) }}');
        L.polyline([[latO, lngO],[latD, lngD]], {
            color:'#ff5e14', weight:3, dashArray:'6,6'
        }).addTo(map);
        map.fitBounds([[latO, lngO],[latD, lngD]], { padding:[20,20] });
    }
});
</script>
@endif

</body>
</html>