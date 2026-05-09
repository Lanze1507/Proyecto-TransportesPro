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
        /* ── KPI cards ── */
        .kpi-card {
            border-radius: 14px;
            padding: 22px 20px;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 6px 24px rgba(0,0,0,.15);
            transition: transform .2s;
        }
        .kpi-card:hover { transform: translateY(-4px); }
        .kpi-card .kpi-icon { font-size: 36px; opacity: .85; }
        .kpi-card .kpi-num  { font-size: 34px; font-weight: 700; line-height: 1; }
        .kpi-card .kpi-lbl  { font-size: 13px; opacity: .85; margin-top: 2px; }
        .kpi-pendiente  { background: linear-gradient(135deg,#f59e0b,#d97706); }
        .kpi-aprobado   { background: linear-gradient(135deg,#3b82f6,#1d4ed8); }
        .kpi-transito   { background: linear-gradient(135deg,#8b5cf6,#6d28d9); }
        .kpi-entregado  { background: linear-gradient(135deg,#10b981,#059669); }

        /* ── Tabla ── */
        .panel-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0,0,0,.08);
            overflow: hidden;
        }
        .panel-card .panel-header {
            background: #0f0f0f;
            color: #fff;
            padding: 16px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .panel-card .panel-header h4 { margin: 0; font-size: 18px; font-weight: 600; }
        .panel-card .panel-body { padding: 20px 24px; }

        .table thead th {
            background: #f8f9fa;
            border-top: none;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
            color: #6b7280;
        }
        .table tbody tr { transition: background .15s; }
        .table tbody tr:hover { background: #f9fafb; }

        /* ── Badges de estado ── */
        .badge-estado {
            padding: 5px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .3px;
        }
        .estado-pendiente  { background: #fef3c7; color: #92400e; }
        .estado-aprobado   { background: #dbeafe; color: #1e40af; }
        .estado-en_transito{ background: #ede9fe; color: #5b21b6; }
        .estado-entregado  { background: #d1fae5; color: #065f46; }
        .estado-rechazado  { background: #fee2e2; color: #991b1b; }
        .estado-cancelado  { background: #f3f4f6; color: #374151; }

        /* ── Filtros ── */
        .filtros-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 18px;
        }
        .filtros-bar .btn-filtro {
            border-radius: 999px;
            padding: 5px 16px;
            font-size: 13px;
            border: 1.5px solid #e5e7eb;
            background: #fff;
            color: #374151;
            cursor: pointer;
            transition: all .15s;
        }
        .filtros-bar .btn-filtro.active,
        .filtros-bar .btn-filtro:hover {
            background: #0f0f0f;
            color: #fff;
            border-color: #0f0f0f;
        }

        /* ── Acciones ── */
        .btn-accion {
            border-radius: 8px;
            padding: 5px 12px;
            font-size: 12px;
            font-weight: 600;
            transition: all .2s;
            border: none;
        }
        .btn-ver      { background: #0f0f0f; color: #fff; }
        .btn-ver:hover{ background: #333; color: #fff; }
        .btn-aprobar  { background: #10b981; color: #fff; }
        .btn-rechazar { background: #ef4444; color: #fff; }
        .btn-aprobar:hover  { background: #059669; color: #fff; }
        .btn-rechazar:hover { background: #dc2626; color: #fff; }

        /* ── Alert ── */
        .alert-success-custom {
            background: #d1fae5; color: #065f46;
            border: none; border-left: 4px solid #10b981;
            border-radius: 8px; padding: 12px 16px;
            margin-bottom: 16px; font-size: 14px;
        }

        /* ── Search ── */
        .search-input {
            border-radius: 999px;
            padding: 8px 18px;
            border: 1.5px solid #e5e7eb;
            font-size: 14px;
            width: 220px;
            outline: none;
        }
        .search-input:focus { border-color: #ff5e14; }

        /* ── Page top spacing ── */
        .operador-wrap { padding: 40px 0 60px; }
    </style>
</head>
<body>

{{-- ══════════════════════════════════════════
    HEADER (mismo estilo del proyecto)
══════════════════════════════════════════ --}}
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
                                            <li><a href="{{ route('operador.viajes.index') }}" style="color:#ff5e14;font-weight:700;">Panel Operador</a></li>
                                            <li><a href="/clientes">Clientes</a></li>
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

{{-- ══════════════════════════════════════════
    CONTENIDO PRINCIPAL
══════════════════════════════════════════ --}}
<main>
<div class="container operador-wrap">

    {{-- Título --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 style="font-weight:800;margin:0;">Panel de Operador</h2>
            <p style="color:#6b7280;margin:0;font-size:14px;">Gestión y seguimiento de viajes</p>
        </div>
        <span style="font-size:13px;color:#9ca3af;">{{ now()->format('d/m/Y H:i') }}</span>
    </div>

    {{-- Alerta de éxito --}}
    @if(session('success'))
        <div class="alert-success-custom">
            ✅ {{ session('success') }}
        </div>
    @endif

    {{-- ── KPIs ── --}}
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="kpi-card kpi-pendiente">
                <div class="kpi-icon">⏳</div>
                <div>
                    <div class="kpi-num">{{ $viajes->where('estado','pendiente')->count() }}</div>
                    <div class="kpi-lbl">Pendientes</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="kpi-card kpi-aprobado">
                <div class="kpi-icon">✅</div>
                <div>
                    <div class="kpi-num">{{ $viajes->where('estado','aprobado')->count() }}</div>
                    <div class="kpi-lbl">Aprobados</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="kpi-card kpi-transito">
                <div class="kpi-icon">🚛</div>
                <div>
                    <div class="kpi-num">{{ $viajes->where('estado','en_transito')->count() }}</div>
                    <div class="kpi-lbl">En tránsito</div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="kpi-card kpi-entregado">
                <div class="kpi-icon">📦</div>
                <div>
                    <div class="kpi-num">{{ $viajes->where('estado','entregado')->count() }}</div>
                    <div class="kpi-lbl">Entregados</div>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Tabla de viajes ── --}}
    <div class="panel-card">
        <div class="panel-header">
            <h4>📋 Todos los viajes</h4>
            <input class="search-input" type="text" id="buscador" placeholder="🔍 Buscar viaje...">
        </div>
        <div class="panel-body">

            {{-- Filtros por estado --}}
            <div class="filtros-bar">
                <button class="btn-filtro active" data-estado="todos">Todos ({{ $viajes->count() }})</button>
                <button class="btn-filtro" data-estado="pendiente">⏳ Pendientes</button>
                <button class="btn-filtro" data-estado="aprobado">✅ Aprobados</button>
                <button class="btn-filtro" data-estado="en_transito">🚛 En tránsito</button>
                <button class="btn-filtro" data-estado="entregado">📦 Entregados</button>
                <button class="btn-filtro" data-estado="cancelado">❌ Cancelados</button>
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
                            <td style="font-weight:600;color:#9ca3af;font-size:13px;">#{{ $viaje->id }}</td>
                            <td>
                                <span style="font-weight:600;">{{ $viaje->cliente->nombre ?? '—' }}</span>
                                <br><small style="color:#9ca3af;">{{ $viaje->cliente->email ?? '' }}</small>
                            </td>
                            <td>
                                <span title="{{ $viaje->origen }}">
                                    {{ Str::limit($viaje->origen, 30) }}
                                </span>
                            </td>
                            <td>
                                <span title="{{ $viaje->destino }}">
                                    {{ Str::limit($viaje->destino, 30) }}
                                </span>
                            </td>
                            <td>
                                @if($viaje->piloto)
                                    <span style="font-weight:600;">{{ $viaje->piloto->nombre }}</span>
                                @else
                                    <span style="color:#d97706;font-size:12px;">Sin asignar</span>
                                @endif
                            </td>
                            <td>
                                @if($viaje->camion)
                                    <span style="font-weight:600;">{{ $viaje->camion->placa }}</span>
                                @else
                                    <span style="color:#d97706;font-size:12px;">Sin asignar</span>
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
                                    {{-- Ver detalle --}}
                                    <a href="{{ route('operador.viajes.show', $viaje->id) }}"
                                    class="btn-accion btn-ver">Ver</a>

                                    {{-- Aprobar (solo si está pendiente) --}}
                                    @if($viaje->estado === 'pendiente')
                                        <form method="POST" action="{{ route('operador.viajes.aprobar', $viaje->id) }}" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn-accion btn-aprobar">Aprobar</button>
                                        </form>
                                        <form method="POST" action="{{ route('operador.viajes.rechazar', $viaje->id) }}" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn-accion btn-rechazar">Rechazar</button>
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

        </div>{{-- /panel-body --}}
    </div>{{-- /panel-card --}}

</div>
</main>

{{-- ══ Footer mínimo ══ --}}
<footer>
    <div class="footer-area footer-bg" style="padding: 20px 0;">
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

<script>
// ── Filtro por estado ──
document.querySelectorAll('.btn-filtro').forEach(btn => {
    btn.addEventListener('click', function () {
        document.querySelectorAll('.btn-filtro').forEach(b => b.classList.remove('active'));
        this.classList.add('active');

        const estado = this.dataset.estado;
        document.querySelectorAll('#tablaViajes tbody tr').forEach(row => {
            if (estado === 'todos' || row.dataset.estado === estado) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});

// ── Búsqueda en tiempo real ──
document.getElementById('buscador').addEventListener('input', function () {
    const q = this.value.toLowerCase();
    document.querySelectorAll('#tablaViajes tbody tr').forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(q) ? '' : 'none';
    });
});
</script>

</body>
</html>