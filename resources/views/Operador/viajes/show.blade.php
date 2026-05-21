<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Detalle de Viaje #{{ $viaje->id }} - TransportesPro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        .detail-wrap { padding: 40px 0 60px; }

        /* ── Card base ── */
        .info-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,.08);
            overflow: hidden;
            margin-bottom: 24px;
        }
        .info-card .card-head {
            padding: 14px 22px;
            font-size: 15px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 1px solid #f3f4f6;
        }
        .info-card .card-head.dark  { background: #0f0f0f; color: #fff; }
        .info-card .card-head.orange{ background: linear-gradient(135deg,#ff5e14,#ff7a18); color: #fff; }
        .info-card .card-head.blue  { background: linear-gradient(135deg,#3b82f6,#1d4ed8); color: #fff; }
        .info-card .card-head.green { background: linear-gradient(135deg,#10b981,#059669); color: #fff; }
        .info-card .card-head.red   { background: linear-gradient(135deg,#ef4444,#dc2626); color: #fff; }
        .info-card .card-body-inner { padding: 20px 22px; }

        /* ── Info row ── */
        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 10px 0;
            border-bottom: 1px solid #f9fafb;
            font-size: 14px;
        }
        .info-row:last-child { border-bottom: none; }
        .info-row .lbl { color: #6b7280; font-weight: 500; min-width: 140px; }
        .info-row .val { font-weight: 600; color: #111827; text-align: right; }

        /* ── Estado badge ── */
        .badge-estado {
            padding: 6px 16px; border-radius: 999px;
            font-size: 13px; font-weight: 700;
        }
        .estado-pendiente  { background:#fef3c7; color:#92400e; }
        .estado-aprobado   { background:#dbeafe; color:#1e40af; }
        .estado-en_ruta    { background:#ede9fe; color:#5b21b6; }
        .estado-entregado  { background:#d1fae5; color:#065f46; }
        .estado-rechazado  { background:#fee2e2; color:#991b1b; }
        .estado-cancelado  { background:#f3f4f6; color:#374151; }

        /* ── Botones de acción ── */
        .btn-action {
            display: block; width: 100%; padding: 13px;
            border: none; border-radius: 12px; font-size: 15px;
            font-weight: 700; cursor: pointer; margin-bottom: 10px;
            transition: all .2s; letter-spacing: .3px;
        }
        .btn-aprobar  { background: linear-gradient(135deg,#10b981,#059669); color:#fff; }
        .btn-rechazar { background: linear-gradient(135deg,#ef4444,#dc2626); color:#fff; }
        .btn-cancelar { background: linear-gradient(135deg,#6b7280,#4b5563); color:#fff; }
        .btn-asignar  { background: linear-gradient(135deg,#ff5e14,#ff7a18); color:#fff; }
        .btn-action:hover { transform: scale(1.02); opacity: .92; color: #fff; }
        .btn-action:disabled { opacity: .45; cursor: not-allowed; transform: none; }

        /* ── Form asignación ── */
        .form-control {
            border-radius: 10px; padding: 10px 14px;
            font-size: 14px; border: 1.5px solid #e5e7eb;
        }
        .form-control:focus { border-color: #ff5e14; box-shadow: none; }
        .form-label { font-size: 13px; font-weight: 600; color: #374151; margin-bottom: 4px; }

        /* ── Timeline de estados ── */
        .timeline {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 0;
            position: relative;
        }
        .timeline::before {
            content:'';
            position: absolute;
            top: 50%; left: 0; right: 0;
            height: 3px;
            background: #e5e7eb;
            transform: translateY(-50%);
            z-index: 0;
        }
        .tl-step {
            display: flex; flex-direction: column; align-items: center; gap: 6px;
            position: relative; z-index: 1;
        }
        .tl-dot {
            width: 36px; height: 36px; border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px; background: #e5e7eb; color: #9ca3af;
            border: 3px solid #fff;
            box-shadow: 0 0 0 2px #e5e7eb;
        }
        .tl-dot.done  { background: #10b981; color:#fff; box-shadow: 0 0 0 2px #10b981; }
        .tl-dot.active{ background: #ff5e14; color:#fff; box-shadow: 0 0 0 2px #ff5e14; }
        .tl-label { font-size: 11px; font-weight: 600; color: #6b7280; white-space: nowrap; }
        .tl-label.active { color: #ff5e14; }
        .tl-label.done   { color: #10b981; }

        /* ── Alerta ── */
        .alert-custom {
            border-radius: 10px; padding: 12px 16px; font-size: 14px;
            margin-bottom: 16px; border: none;
        }
        .alert-ok  { background:#d1fae5; color:#065f46; border-left:4px solid #10b981; }
        .alert-err { background:#fee2e2; color:#991b1b; border-left:4px solid #ef4444; }

        /* ── Mapa miniatura ── */
        #mapa { border-radius: 12px; overflow: hidden; height: 220px; background:#f3f4f6; }
    </style>
</head>
<body>

{{-- ══ HEADER ══ --}}
<header>
    <div class="header-area">
        <div class="main-header">
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/"><img src="{{ asset('assets/img/logo/logoNombre.png') }}" alt="TransportesPro"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation" class="d-flex align-items-center">
                                            <li><a href="/">Inicio</a></li>
                                            <li><a href="{{ route('operador.viajes.index') }}">Gestión Viajes</a></li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                                    @csrf
                                                    <button style="background:none;border:none;color:white;cursor:pointer;font-size:14px;">
                                                        Cerrar sesión
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right-btn d-none d-lg-block ml-20">
                                    <span style="color:#ccc;font-size:13px;">
                                        👤 {{ auth()->user()->name }}
                                        <span style="background:#ff5e14;color:#fff;padding:2px 10px;border-radius:999px;font-size:11px;margin-left:6px;">OPERADOR</span>
                                    </span>
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

{{-- ══ CONTENIDO ══ --}}
<main>
<div class="container detail-wrap">

    {{-- Breadcrumb + título --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <p style="font-size:13px;color:#9ca3af;margin:0;">
                <a href="{{ route('operador.viajes.index') }}" style="color:#ff5e14;">Panel Operador</a>
                &rsaquo; Viaje #{{ $viaje->id }}
            </p>
            <h2 style="font-weight:800;margin:4px 0 0;">
                Detalle del Viaje
                <span class="badge-estado estado-{{ $viaje->estado }}" style="font-size:14px;vertical-align:middle;">
                    {{ ucfirst(str_replace('_',' ',$viaje->estado)) }}
                </span>
            </h2>
        </div>
        <a href="{{ route('operador.viajes.index') }}" class="btn btn-secondary" style="border-radius:10px;">
            ⬅ Volver
        </a>
    </div>

    {{-- Alertas --}}
    @if(session('success'))
        <div class="alert-custom alert-ok">✅ {{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert-custom alert-err">
            ⚠️ {{ $errors->first() }}
        </div>
    @endif

    {{-- ── Timeline de estado ── --}}
    <div class="info-card mb-4">
        <div class="card-head dark">🗺️ Estado del viaje</div>
        <div class="card-body-inner">
            @php
                $estados = ['pendiente','aprobado','en_ruta','completado'];
                $iconos  = ['⏳','✅','🚛','📦'];
                $actual  = $viaje->estado;
                $idx     = array_search($actual, $estados);
            @endphp
            <div class="timeline">
                @foreach($estados as $i => $e)
                    <div class="tl-step">
                        <div class="tl-dot {{ $i < $idx ? 'done' : ($i === $idx ? 'active' : '') }}">
                            {{ $iconos[$i] }}
                        </div>
                        <span class="tl-label {{ $i < $idx ? 'done' : ($i === $idx ? 'active' : '') }}">
                            {{ ucfirst(str_replace('_',' ',$e)) }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">

        {{-- ── Columna izquierda: info + mapa ── --}}
        <div class="col-lg-8">

            {{-- Info del viaje --}}
            <div class="info-card">
                <div class="card-head dark">📋 Información del viaje</div>
                <div class="card-body-inner">
                    <div class="info-row">
                        <span class="lbl">ID del viaje</span>
                        <span class="val">#{{ $viaje->id }}</span>
                    </div>
                    <div class="info-row">
                        <span class="lbl">Origen</span>
                        <span class="val">📍 {{ $viaje->origen }}</span>
                    </div>
                    <div class="info-row">
                        <span class="lbl">Destino</span>
                        <span class="val">🏁 {{ $viaje->destino }}</span>
                    </div>
                    <div class="info-row">
                        <span class="lbl">Estado actual</span>
                        <span class="val">
                            <span class="badge-estado estado-{{ $viaje->estado }}">
                                {{ ucfirst(str_replace('_',' ',$viaje->estado)) }}
                            </span>
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="lbl">Fecha de salida</span>
                        <span class="val">{{ $viaje->fecha_salida ? \Carbon\Carbon::parse($viaje->fecha_salida)->format('d/m/Y H:i') : '—' }}</span>
                    </div>
                    <div class="info-row">
                        <span class="lbl">Fecha de llegada</span>
                        <span class="val">{{ $viaje->fecha_llegada ? \Carbon\Carbon::parse($viaje->fecha_llegada)->format('d/m/Y H:i') : '—' }}</span>
                    </div>
                    <div class="info-row">
                        <span class="lbl">Creado el</span>
                        <span class="val">{{ $viaje->created_at ? $viaje->created_at->format('d/m/Y H:i') : '—' }}</span>
                    </div>
                </div>
            </div>

            {{-- Info del cliente --}}
            <div class="info-card">
                <div class="card-head blue">👤 Cliente</div>
                <div class="card-body-inner">
                    @if($viaje->cliente)
                        <div class="info-row">
                            <span class="lbl">Nombre</span>
                            <span class="val">{{ $viaje->cliente->nombre }}</span>
                        </div>
                        <div class="info-row">
                            <span class="lbl">Email</span>
                            <span class="val">{{ $viaje->cliente->email }}</span>
                        </div>
                        <div class="info-row">
                            <span class="lbl">Teléfono</span>
                            <span class="val">{{ $viaje->cliente->telefono ?? '—' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="lbl">Dirección</span>
                            <span class="val">{{ $viaje->cliente->direccion ?? '—' }}</span>
                        </div>
                    @else
                        <p style="color:#9ca3af;text-align:center;padding:16px 0;">Sin cliente asignado</p>
                    @endif
                </div>
            </div>

            {{-- Mapa (si hay coordenadas) --}}
            @if($viaje->lat_origen && $viaje->lng_origen)
            <div class="info-card">
                <div class="card-head dark">🗺️ Mapa de ruta</div>
                <div class="card-body-inner" style="padding:12px;">
                    <div id="mapa"></div>
                </div>
            </div>
            @endif

        </div>{{-- /col-lg-8 --}}

        {{-- ── Columna derecha: piloto, camión, acciones ── --}}
        <div class="col-lg-4">

            {{-- Piloto asignado --}}
            <div class="info-card">
                <div class="card-head green">🧑‍✈️ Piloto asignado</div>
                <div class="card-body-inner">
                    @if($viaje->piloto)
                        <div class="info-row">
                            <span class="lbl">Nombre</span>
                            <span class="val">{{ $viaje->piloto->nombre }}</span>
                        </div>
                        <div class="info-row">
                            <span class="lbl">Licencia</span>
                            <span class="val">{{ $viaje->piloto->licencia }}</span>
                        </div>
                        <div class="info-row">
                            <span class="lbl">Teléfono</span>
                            <span class="val">{{ $viaje->piloto->telefono ?? '—' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="lbl">Estado</span>
                            <span class="val">{{ ucfirst($viaje->piloto->estado) }}</span>
                        </div>
                    @else
                        <p style="color:#d97706;text-align:center;padding:12px 0;font-size:13px;">⚠️ Sin piloto asignado</p>
                    @endif
                </div>
            </div>

            {{-- Camión asignado --}}
            <div class="info-card">
                <div class="card-head dark">🚛 Camión asignado</div>
                <div class="card-body-inner">
                    @if($viaje->camion)
                        <div class="info-row">
                            <span class="lbl">Placa</span>
                            <span class="val">{{ $viaje->camion->placa }}</span>
                        </div>
                        <div class="info-row">
                            <span class="lbl">Modelo</span>
                            <span class="val">{{ $viaje->camion->modelo ?? '—' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="lbl">Capacidad</span>
                            <span class="val">{{ $viaje->camion->capacidad ?? '—' }} kg</span>
                        </div>
                        <div class="info-row">
                            <span class="lbl">Estado</span>
                            <span class="val">{{ ucfirst($viaje->camion->estado) }}</span>
                        </div>
                    @else
                        <p style="color:#d97706;text-align:center;padding:12px 0;font-size:13px;">⚠️ Sin camión asignado</p>
                    @endif
                </div>
            </div>

            {{-- ── Formulario de asignación ── --}}
            @if(in_array($viaje->estado, ['pendiente','aprobado']))
            <div class="info-card">
                <div class="card-head orange">⚙️ Asignar piloto y camión</div>
                <div class="card-body-inner">
                    <form method="POST" action="{{ route('operador.viajes.asignar', $viaje->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Piloto disponible</label>
                            <select name="piloto_id" class="form-control" required>
                                <option value="">— Seleccionar —</option>
                                @foreach($pilotos as $p)
                                    <option value="{{ $p->id }}" {{ $viaje->piloto_id == $p->id ? 'selected' : '' }}>
                                        {{ $p->nombre }} · {{ $p->licencia }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Camión disponible</label>
                            <select name="camion_id" class="form-control" required>
                                <option value="">— Seleccionar —</option>
                                @foreach($camiones as $c)
                                    <option value="{{ $c->id }}" {{ $viaje->camion_id == $c->id ? 'selected' : '' }}>
                                        {{ $c->placa }} · {{ $c->modelo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn-action btn-asignar">
                            🚛 Asignar y poner En Tránsito
                        </button>
                    </form>
                </div>
            </div>
            @endif

            {{-- ── Acciones de estado ── --}}
            <div class="info-card">
                <div class="card-head dark">🔧 Acciones</div>
                <div class="card-body-inner">

                    @if($viaje->estado === 'pendiente')
                        <form method="POST" action="{{ route('operador.viajes.aprobar', $viaje->id) }}">
                            @csrf @method('PATCH')
                            <button class="btn-action btn-aprobar">✅ Aprobar viaje</button>
                        </form>
                        <form method="POST" action="{{ route('operador.viajes.rechazar', $viaje->id) }}">
                            @csrf @method('PATCH')
                            <button class="btn-action btn-rechazar">❌ Rechazar viaje</button>
                        </form>
                    @endif

                    @if(in_array($viaje->estado, ['pendiente','aprobado']))
                        <form method="POST" action="{{ route('operador.viajes.cancelar', $viaje->id) }}"
                              onsubmit="return confirm('¿Seguro que deseas cancelar este viaje?')">
                            @csrf @method('PATCH')
                            <button class="btn-action btn-cancelar">🚫 Cancelar viaje</button>
                        </form>
                    @endif

                    @if(!in_array($viaje->estado, ['pendiente','aprobado','en_ruta']))
                        <p style="text-align:center;color:#9ca3af;font-size:13px;padding:10px 0;">
                            Este viaje ya no puede modificarse.
                        </p>
                    @endif

                </div>
            </div>

        </div>{{-- /col-lg-4 --}}
    </div>{{-- /row --}}

</div>
</main>

{{-- Footer --}}
<footer>
    <div class="footer-area footer-bg" style="padding:20px 0;">
        <div class="container">
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right text-center">
                            <p style="margin:0;">Copyright &copy; {{ date('Y') }} TransportesPro. Panel de Operador.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- Scripts --}}
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

{{-- Mapa con Leaflet (sin API key) --}}
@if($viaje->lat_origen && $viaje->lng_origen)
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const latO = {{ $viaje->lat_origen }};
    const lngO = {{ $viaje->lng_origen }};
    const latD = {{ $viaje->lat_destino ?? 'null' }};
    const lngD = {{ $viaje->lng_destino ?? 'null' }};

    const map = L.map('mapa').setView([latO, lngO], 7);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Marcador origen
    L.marker([latO, lngO])
        .addTo(map)
        .bindPopup('<b>Origen</b><br>{{ addslashes($viaje->origen) }}')
        .openPopup();

    // Marcador destino
    if (latD && lngD) {
        L.marker([latD, lngD])
            .addTo(map)
            .bindPopup('<b>Destino</b><br>{{ addslashes($viaje->destino) }}');

        // Línea de ruta
        L.polyline([[latO, lngO],[latD, lngD]], {
            color: '#ff5e14', weight: 3, dashArray: '6,6'
        }).addTo(map);

        // Ajustar zoom para mostrar ambos puntos
        map.fitBounds([[latO, lngO],[latD, lngD]], { padding: [30, 30] });
    }
});
</script>
@endif

</body>
</html>