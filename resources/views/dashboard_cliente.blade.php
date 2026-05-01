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
body {
    background: #f4f6f9;
}

/* Cards */
.card {
    border: none;
    border-radius: 12px;
    transition: 0.3s;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

/* Tabla */
.table tbody tr:hover {
    background: #f1f1f1;
}

/* Animación */
.fade-in {
    animation: fadeIn 0.8s ease;
}
@keyframes fadeIn {
    from {opacity:0; transform:translateY(10px);}
    to {opacity:1; transform:translateY(0);}
}

/* Header */
.header-box {
    background: white;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 20px;
}

/* Mapa */
#map {
    border-radius: 18px;
    overflow: hidden;
    min-height: 420px;
    border: 1px solid rgba(13, 110, 253, 0.12);
    box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.35);
}

.modal-content {
    border-radius: 22px;
    overflow: hidden;
    border: none;
    box-shadow: 0 28px 80px rgba(15, 23, 42, 0.18);
}

.modal-header {
    border-bottom: none;
}

.leaflet-popup-content-wrapper {
    border-radius: 16px;
    box-shadow: 0 14px 35px rgba(15, 23, 42, 0.18);
}

.leaflet-popup-tip {
    background: white;
}
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

<div class="container mt-4 fade-in section-padding30">

    <!-- RESUMEN -->
    @php
        $total = count($viajes);
        $enRuta = $viajes->where('estado','en_ruta')->count();
        $pendientes = $viajes->where('estado','pendiente')->count();
        $entregados = $viajes->where('estado','completado')->count();
    @endphp

    <div class="row text-center mb-4">

        <div class="col-md-3">
            <div class="single-info mb-30 p-4">
                <h6 class="mb-2">📦 Total</h6>
                <h2>{{ $total }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="single-info mb-30 p-4">
                <h6 class="mb-2">🚚 En ruta</h6>
                <h2 class="text-primary">{{ $enRuta }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="single-info mb-30 p-4">
                <h6 class="mb-2">⏳ Pendientes</h6>
                <h2 class="text-warning">{{ $pendientes }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="single-info mb-30 p-4">
                <h6 class="mb-2">✅ Entregados</h6>
                <h2 class="text-success">{{ $entregados }}</h2>
            </div>
        </div>

    </div>

    <!-- TABLA -->
    <div class="single-info p-4">

        <div class="d-flex justify-content-between mb-3 align-items-center">
            <div>
                <h5>📍 Mis Envíos</h5>
                <span class="section-tittle-line"></span>
            </div>
        </div>

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
                    <td>{{ $viaje->origen }}</td>
                    <td>{{ $viaje->destino }}</td>

                    <td>
                        @if($viaje->lat_destino && $viaje->lng_destino)
    <button class="btn btn-sm btn-info"
        onclick="mostrarMapa('{{ $viaje->lat_destino }}','{{ $viaje->lng_destino }}', '{{ $viaje->id }}')">
        Ver mapa
    </button>
@else
    <span class="text-muted">Sin ubicación</span>
@endif
                    </td>

                    <td>{{ $viaje->fecha_salida }}</td>

                    <td>
                        @if($viaje->estado == 'pendiente')
                            <span class="badge bg-warning text-dark">Pendiente</span>
                        @elseif($viaje->estado == 'en_ruta')
                            <span class="badge bg-primary">En ruta</span>
                        @else
                            <span class="badge bg-success">Entregado</span>
                        @endif
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
</script>

</body>
</html>