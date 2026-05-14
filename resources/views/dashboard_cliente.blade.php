<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Dashboard Cliente</title>

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
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>

<style>

body{

    background:#f8fafc;
}

/* HERO */

.dashboard-hero{

    background:#ffffff;

    border-radius:22px;

    padding:38px;

    margin-bottom:35px;

    border:1px solid rgba(15,23,42,.06);

    box-shadow:
        0 10px 35px rgba(15,23,42,.06);

    animation:fadeUp .55s ease;
}

.dashboard-hero::before{

    content:'';

    position:absolute;

    width:260px;
    height:260px;

    border-radius:50%;

    background:rgba(255,255,255,.04);

    right:-80px;
    top:-80px;
}

.dashboard-hero h2{

    color:#0f172a;

    font-size:34px;

    font-weight:800;

    margin-bottom:8px;

    letter-spacing:-1px;
}

.dashboard-hero p{

    color:#64748b;

    margin:0;

    font-size:15px;

    max-width:700px;

    line-height:1.7;
}

/* KPI */

.kpi-card{

    background:white;

    border-radius:20px;

    padding:26px;

    transition:.25s ease;

    border:1px solid rgba(15,23,42,.06);

    box-shadow:
        0 6px 20px rgba(15,23,42,.05);

    position:relative;

    overflow:hidden;
}

.kpi-card:hover{

    transform:translateY(-5px);

    box-shadow:
        0 18px 35px rgba(15,23,42,.08);
}

.kpi-card::before{

    content:'';

    position:absolute;

    width:90px;
    height:90px;

    border-radius:50%;

    background:rgba(15,23,42,.03);

    top:-30px;
    right:-30px;
}

.kpi-total{
    border-left:5px solid #0f172a;
}

.kpi-ruta{
    border-left:5px solid #2563eb;
}

.kpi-pendiente{
    border-left:5px solid #f59e0b;
}

.kpi-entregado{
    border-left:5px solid #10b981;
}

.kpi-icon{

    font-size:34px;

    margin-bottom:14px;
}

.kpi-label{

    font-size:14px;

    color:#64748b;

    margin-bottom:6px;
}
.kpi-number{

    font-size:36px;

    font-weight:800;

    line-height:1;

    color:#0f172a;
}

/* PANEL */

.panel-card{

    background:white;

    border-radius:22px;

    overflow:hidden;

    border:1px solid rgba(15,23,42,.06);

    box-shadow:
        0 10px 35px rgba(15,23,42,.06);

    animation:fadeUp .7s ease;
}

.panel-header{

    background:white;

    border-bottom:1px solid #eef2f7;

    padding:24px 30px;

    display:flex;

    justify-content:space-between;

    align-items:center;
}

.panel-header h5{

    margin:0;

    font-weight:700;

    font-size:22px;

    color:#0f172a;
}

.panel-body{

    padding:30px;
}

/* BUSCADOR */

.search-box{

    width:320px;

    max-width:100%;
}

.search-input{

    border:none;

    border-radius:16px;

    padding:14px 18px;

    background:#f1f5f9;

    transition:.25s ease;
}

.search-input:focus{

    background:white;

    box-shadow:
        0 0 0 4px rgba(255,94,20,.12);

    border-color:#ff5e14;
}

/* TABLA */

.table{

    border-collapse:separate;

    border-spacing:0 14px;
}

.table thead th{

    border:none;

    color:#64748b;

    font-size:13px;

    text-transform:uppercase;

    letter-spacing:.7px;
}

.table tbody tr{

    background:#fff;

    transition:.25s ease;

    box-shadow:
        0 8px 22px rgba(0,0,0,.05);
}

.table tbody tr:hover{

    transform:scale(1.01);

    box-shadow:
        0 14px 28px rgba(0,0,0,.08);
}

.table tbody td{

    vertical-align:middle;

    border-top:none;
    border-bottom:none;

    padding:20px 18px;
}

/* BADGES */

.estado-badge{

    padding:9px 16px;

    border-radius:999px;

    font-size:12px;

    font-weight:700;

    letter-spacing:.5px;
}

.estado-pendiente{
    background:#fef3c7;
    color:#92400e;
}

.estado-ruta{
    background:#dbeafe;
    color:#1d4ed8;
}

.estado-entregado{
    background:#d1fae5;
    color:#065f46;
}

/* INFO EXTRA */

.extra-info{

    font-size:13px;

    color:#64748b;

    margin-top:6px;

    line-height:1.6;
}

/* TIMELINE */

.timeline-box{

    margin-top:18px;

    padding-top:18px;

    border-top:1px dashed #e2e8f0;
}

.timeline-item{

    position:relative;

    padding-left:28px;

    margin-bottom:14px;
}

.timeline-item:last-child{

    margin-bottom:0;
}

.timeline-dot{

    position:absolute;

    left:0;
    top:4px;

    width:12px;
    height:12px;

    border-radius:50%;

    background:#ff5e14;

    box-shadow:
        0 0 0 4px rgba(255,94,20,.12);
}

.timeline-content{

    font-size:13px;

    color:#475569;

    line-height:1.5;
}

.timeline-date{

    display:block;

    margin-top:4px;

    font-size:11px;

    color:#94a3b8;
}

/* BOTÓN MAPA */

.btn-map{

    background:
        linear-gradient(135deg,#ff5e14,#ff7a18);

    color:white;

    border:none;

    border-radius:14px;

    padding:10px 18px;

    font-size:13px;

    font-weight:700;

    transition:.25s ease;
}

.btn-map:hover{

    transform:
        translateY(-2px)
        scale(1.03);

    color:white;

    box-shadow:
        0 10px 24px rgba(255,94,20,.28);
}

/* MAPA */

#map{
    border-radius:18px;
    overflow:hidden;
    min-height:420px;
}

.modal-content{

    border:none;

    border-radius:24px;

    overflow:hidden;
}

/* ANIMACIÓN */

.fade-in{
    animation:fadeUp .6s ease;
}

@keyframes fadeUp{

    from{
        opacity:0;
        transform:translateY(20px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}



</style>
</style>

</head>

<body>

<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{ asset('assets/img/logo/loder.jpg') }}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader End -->
<header>
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-lg-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>
                                    <li>Telefono: +99 (0) 101 0000 888</li>
                                    <li>Email: noreply@yourdomain.com</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/"><img src="assets/img/logo/logoNombre.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation" class="d-flex align-items-center">
                                            <li><a href="/">Inicio</a></li>
                                            <li><a href="#">Contactanos</a></li>
                                            @guest
                                                <li class="ml-3">
                                                    <a href="{{ route('login') }}" class="btn header-btn btn-sm" style="padding: .95rem .95rem; font-size: .92rem;">Login</a>
                                                </li>
                                                <li class="ml-2">
                                                    <a href="{{ route('register') }}" class="btn header-btn btn-sm" style="padding: .95rem .95rem; font-size: .92rem;">Registrarse</a>
                                                </li>
                                            @endguest
                                            @auth
                                                @if(auth()->user()->role === 'admin')
                                                    <li><a href="/clientes">Panel Admin</a></li>
                                                @else
                                                    <li><a href="/dashboard">Mi Panel</a></li>
                                                @endif
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <button style="background:none;border:none;color:white;cursor:pointer;">Cerrar sesión</button>
                                                    </form>
                                                </li>
                                            @endauth
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-right-btn d-none d-lg-block ml-20">
                                    <a href="contact.html" class="btn header-btn">Obten tu cotización</a>
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

<div class="container section-padding30 fade-in">
    <div class="dashboard-hero">

    <h2>
        Bienvenido, {{ auth()->user()->name }}
    </h2>

    <p>
        Supervisa el estado de tus envíos, consulta rutas y monitorea entregas en tiempo real.
    </p>

</div>

    <!-- RESUMEN -->
    @php
        $total = count($viajes);
        $enRuta = $viajes->where('estado','en_ruta')->count();
        $pendientes = $viajes->where('estado','pendiente')->count();
        $entregados = $viajes->where('estado','completado')->count();
    @endphp

   <div class="row mb-5">

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="kpi-card kpi-total">
            <div class="kpi-icon">📦</div>
            <div class="kpi-label">Total de envíos</div>
            <div class="kpi-number">{{ $total }}</div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="kpi-card kpi-ruta">
            <div class="kpi-icon">🚚</div>
            <div class="kpi-label">En ruta</div>
            <div class="kpi-number">{{ $enRuta }}</div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="kpi-card kpi-pendiente">
            <div class="kpi-icon">⏳</div>
            <div class="kpi-label">Pendientes</div>
            <div class="kpi-number">{{ $pendientes }}</div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="kpi-card kpi-entregado">
            <div class="kpi-icon">✅</div>
            <div class="kpi-label">Entregados</div>
            <div class="kpi-number">{{ $entregados }}</div>
        </div>
    </div>

</div>

    <!-- TABLA -->
    <div class="panel-card">

        <div class="panel-header">

    <h5>
        📍 Mis Envíos
    </h5>

    <div class="search-box">

        <input
            type="text"
            id="buscadorEnvios"
            class="form-control search-input"
            placeholder="🔍 Buscar envío..."
        >

    </div>

</div>

<div class="panel-body">

        <table class="table align-middle table-hover">
            <thead class="table-light">
                <tr>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Ubicación</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                </tr>
            </thead>

           <tbody>

@forelse($viajes as $viaje)

<tr>

    {{-- ORIGEN --}}
    <td>

        <strong>
            {{ $viaje->origen }}
        </strong>

        <div class="extra-info">

            🚛
            {{ $viaje->camion->placa ?? 'Sin camión' }}

        </div>

    </td>

    {{-- DESTINO --}}
    <td>

        <strong>
            {{ $viaje->destino }}
        </strong>

        <div class="extra-info">

            👨‍✈️
            {{ $viaje->piloto->nombre ?? 'Sin piloto asignado' }}

        </div>

    </td>

    {{-- UBICACIÓN --}}
    <td>

        @if($viaje->lat_destino && $viaje->lng_destino)

            <button
                class="btn-map"
                onclick="
                    mostrarMapa(
                        '{{ $viaje->lat_destino }}',
                        '{{ $viaje->lng_destino }}',
                        '{{ $viaje->id }}'
                    )
                "
            >

                Ver seguimiento

            </button>

        @else

            <span class="text-muted">

                Sin ubicación

            </span>

        @endif

    </td>

    {{-- FECHA --}}
    <td>

        {{ $viaje->created_at
            ? $viaje->created_at->format('d/m/Y')
            : '—'
        }}

    </td>

    {{-- ESTADO --}}
    <td>

        @if($viaje->estado == 'pendiente')

            <span class="estado-badge estado-pendiente">

                Pendiente

            </span>

        @elseif($viaje->estado == 'en_ruta')

            <span class="estado-badge estado-ruta">

                En ruta

            </span>

        @else

            <span class="estado-badge estado-entregado">

                Entregado

            </span>

        @endif

        {{-- TIMELINE --}}
        <div class="timeline-box">

            @forelse($viaje->historial as $evento)

                <div class="timeline-item">

                    <div class="timeline-dot"></div>

                    <div class="timeline-content">

                        {{ $evento->descripcion }}

                        <span class="timeline-date">

                            {{ $evento->created_at->format('d/m/Y H:i') }}

                        </span>

                    </div>

                </div>

            @empty

                <small class="text-muted">

                    Sin historial disponible

                </small>

            @endforelse

        </div>

    </td>

</tr>

@empty

<tr>

    <td colspan="5" class="text-center text-muted">

        No tienes envíos registrados

    </td>

</tr>

@endforelse

</tbody>
        </table>

    </div>

</div>
</main>

<footer>
<div class="footer-area footer-bg">
    <div class="container">
        <div class="footer-top footer-padding">

            <div class="footer-heading">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-8 col-md-8">
                        <div class="wantToWork-caption wantToWork-caption2">
                            <h2>Gestiona tus envíos de forma rápida, segura y eficiente</h2>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <span class="contact-number f-right">+502 1234-5678</span>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-between">

                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>EMPRESA</h4>
                            <ul>
                                <li><a href="#">Sobre nosotros</a></li>
                                <li><a href="#">Servicios</a></li>
                                <li><a href="#">Contacto</a></li>
                                <li><a href="#">Privacidad</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>HORARIOS</h4>
                            <ul>
                                <li><a href="#">Lunes - Viernes: 8am - 6pm</a></li>
                                <li><a href="#">Sábado: 9am - 4pm</a></li>
                                <li><a href="#">Domingo: Cerrado</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>SERVICIOS</h4>
                            <ul>
                                <li><a href="#">Envíos</a></li>
                                <li><a href="#">Seguimiento</a></li>
                                <li><a href="#">Transporte express</a></li>
                                <li><a href="#">Logística</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                    <div class="single-footer-caption mb-50">

                        <div class="footer-logo">
                            <a href="/"><img src="assets/img/logo/logoNombre.png" alt=""></a>
                        </div>

                        <div class="footer-tittle">
                            <div class="footer-pera">
                                <p class="info1">
                                    Plataforma diseñada para el control y seguimiento de envíos en tiempo real,
                                    optimizando procesos logísticos de manera eficiente.
                                </p>
                            </div>
                        </div>

                        <div class="footer-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="footer-bottom">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12">
                    <div class="footer-copy-right text-center">
                        <p>
                        Copyright © <script>document.write(new Date().getFullYear());</script>
                        TransportesPro. Todos los derechos reservados.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</footer>

<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- MODAL MAPA -->
<div class="modal fade" id="mapModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Ubicación del envío</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <div id="map" style="height:400px;"></div>
      </div>
    </div>
  </div>
</div>

<!-- JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
window.addEventListener('load', function() {
    const preloader = document.getElementById('preloader-active');
    if (preloader) {
        preloader.style.transition = 'opacity 0.5s ease';
        preloader.style.opacity = '0';
        setTimeout(() => {
            preloader.style.display = 'none';
        }, 500);
    }
});

let map;
let marker;
let trailLine;
let pulseCircle;
let animationFrame;

// Ruta
const ruta = [
    [14.6349, -90.5069],
    [14.9, -90.2],
    [15.0, -90.0],
    [15.1, -89.9],
    [15.2, -89.8],
    [15.5, -89.2],
    [15.7276, -88.5944]
];

// Icono camión
const camionIcon = L.icon({
    iconUrl: 'https://cdn-icons-png.flaticon.com/512/1995/1995470.png',
    iconSize: [42, 42],
    iconAnchor: [21, 42],
    popupAnchor: [0, -38]
});

function mostrarMapa(lat, lng, viajeId) {

    const modal = new bootstrap.Modal(document.getElementById('mapModal'));
    modal.show();

    setTimeout(() => {

        if (map) {
            map.remove();
            cancelAnimationFrame(animationFrame);
        }

        map = L.map('map', {
            zoomControl: false,
            scrollWheelZoom: false
        });

        // Mapa más limpio
        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap & CartoDB'
        }).addTo(map);

        // Ruta base (gris)
        const routeLine = L.polyline(ruta, {
            color: '#dee2e6',
            weight: 4,
            opacity: 0.6
        }).addTo(map);

        // Ruta recorrida (verde)
        trailLine = L.polyline([ruta[0]], {
            color: '#20c997',
            weight: 5,
            opacity: 1
        }).addTo(map);

        // Efecto pulso
        pulseCircle = L.circleMarker(ruta[0], {
            radius: 10,
            fillColor: '#0dcaf0',
            fillOpacity: 0.2,
            stroke: false
        }).addTo(map);

        map.fitBounds(routeLine.getBounds(), { padding: [50, 50] });

        // Marcador
        marker = L.marker(ruta[0], { icon: camionIcon }).addTo(map)
            .bindPopup("<b>🚚 En camino</b><br>Tu envío está en ruta")
            .openPopup();

        // 🔥 MOVIMIENTO SUAVE REAL
        let segment = 0;
        let progress = 0;

        function animar() {

            if (segment >= ruta.length - 1) {

    // 🔥 FORZAR POSICIÓN EXACTA FINAL
    const finalPos = ruta[ruta.length - 1];

    marker.setLatLng(finalPos);
    pulseCircle.setLatLng(finalPos);
    trailLine.addLatLng(finalPos);

    map.panTo(finalPos, {
        animate: true,
        duration: 0.5
    });

    marker.bindPopup("<b>✅ Entregado</b><br>Entrega completada").openPopup();

    // actualizar BD
    fetch(`/viaje/completar/${viajeId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(res => res.json())
    .then(() => {
        setTimeout(() => location.reload(), 1200);
    });

    return;
}

            let start = ruta[segment];
            let end = ruta[segment + 1];

            progress += 0.005; // velocidad suave

            if (progress >= 1) {
                progress = 0;
                segment++;
            }

            let lat = start[0] + (end[0] - start[0]) * progress;
            let lng = start[1] + (end[1] - start[1]) * progress;

            const pos = [lat, lng];

            marker.setLatLng(pos);
            trailLine.addLatLng(pos);
            pulseCircle.setLatLng(pos);

            // movimiento suave sin zoom brusco
            map.panTo(pos, {
                animate: true,
                duration: 0.3
            });

            animationFrame = requestAnimationFrame(animar);
        }

        animar();

    }, 300);
}

// BUSCADOR EN TIEMPO REAL
document
.getElementById('buscadorEnvios')

.addEventListener('input', function(){

    let filtro =
        this.value.toLowerCase();

    let filas =
        document.querySelectorAll('table tbody tr');

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