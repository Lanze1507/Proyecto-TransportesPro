<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pilotos - TransportesPro</title>
    <meta name="description" content="Listado de pilotos de TransportesPro">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- CSS here (copiado de welcome.blade.php) -->
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
</head>
<style>
    .buscador-pro{

    border-radius:14px;

    border:1.5px solid #dbe2ea;

    padding:14px 18px;

    transition:.3s ease;

    width:100%;
}

.buscador-pro:focus{

    border-color:#ff5e14;

    box-shadow:0 0 0 4px rgba(255,94,20,.12);

    transform:scale(1.015);
}
</style>
<body>
<!--? Preloader Start -->
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
    <!-- Header Start (copiado de welcome.blade.php) -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top d-none d-lg-block">
                <div class="container">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="header-info-left">
                                <ul>     
                                    <li>Numero: +99 (0) 101 0000 888</li>
                                    <li>Email: noreply@yourdomain.com</li>
                                </ul>
                            </div>
                            <div class="header-info-right">
                                <ul class="header-social">    
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li> <a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/"><img src="{{ asset('assets/img/logo/logoNombre.png') }}" alt="TransportesPro"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav> 
                                        <ul id="navigation" class="d-flex align-items-center">
                                            <li><a href="/">Inicio</a></li>
                                            <li><a href="#">Contactanos</a></li>

                                            @guest
                                                <li class="ml-3">
                                                    <a href="{{ route('login') }}" class="btn header-btn btn-sm" style="padding: .95rem .95rem; font-size: .92rem;">
                                                        Login
                                                    </a>
                                                </li>
                                                <li class="ml-2">
                                                    <a href="{{ route('register') }}" class="btn header-btn btn-sm" style="padding: .95rem .95rem; font-size: .92rem;">
                                                        Registrarse
                                                    </a>
                                                </li>
                                            @endguest

                                            @auth
                                                @if(auth()->user()->role === 'admin')
                                                    <li><a href="/admin/viajes">Panel Admin</a></li>
                                                @else
                                                    <li><a href="/dashboard">Mi Panel</a></li>
                                                @endif
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <button style="background:none;border:none;color:white;cursor:pointer;">
                                                            Cerrar sesión
                                                        </button>
                                                    </form>
                                                </li>
                                            @endauth
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                <div class="header-right-btn d-none d-lg-block ml-20">
                                    <a href="#" class="btn header-btn">Obten tu cotización</a>
                                </div>
                            </div>
                        </div> 
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <!-- Header End -->
</header>

<main>
    <!-- Hero sencillo para la sección de Pilotos -->
    <div class="slider-area">
        <div class="single-slider d-flex align-items-center" style="min-height: 220px; background: #0b1c39;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center text-white">
                        <h1 class="text-white mb-2">Pilotos</h1>
                        <p class="text-white-50 mb-0">Gestión de pilotos registrados en la plataforma</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Listado de Pilotos -->
    <section class="section-padding30">
        <div class="container">
            <div class="row justify-content-between align-items-center mb-4">
                <div class="col-md-6">
                    <div class="section-tittle mb-0">
                        <span>Administración</span>
                        <h2 class="mb-0">Listado de Pilotos</h2>
                        <div class="mt-3" style="max-width: 420px;">

    <input
        type="text"
        id="buscadorPilotos"
        class="form-control buscador-pro"
        placeholder="🔍 Buscar piloto por nombre, teléfono o licencia..."
    >

</div>
                    </div>
                </div>
                <div class="col-md-6 text-md-right mt-3 mt-md-0">
                    <a href="/admin/pilotos/create" class="btn header-btn">➕ Nuevo Piloto</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card p-3 p-md-4" style="border-radius: 12px;">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover mb-0" id="tablaPilotos">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Licencia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pilotos as $p)
                                        <tr>
                                            <td>{{ $p->nombre }}</td>
                                            <td>{{ $p->telefono }}</td>
                                            <td>{{ $p->licencia }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center text-muted">No hay pilotos registrados.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @isset($pilotos)
                            @if(method_exists($pilotos, 'links'))
                                <div class="mt-3 d-flex justify-content-end">
                                    {{ $pilotos->links() }}
                                </div>
                            @endif
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer>
    <!-- Footer Start (copiado de welcome.blade.php) -->
    <div class="footer-area footer-bg">
        <div class="container">
            <div class="footer-top footer-padding">
                <!-- footer Heading -->
                <div class="footer-heading">
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-8 col-md-8">
                            <div class="wantToWork-caption wantToWork-caption2">
                                <h2>Entendemos la importancia de cada envío y trabajamos para que llegue seguro y a tiempo</h2>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <span class="contact-number f-right">+502 1234-5678</span>
                        </div>
                    </div>
                </div>

                <!-- Footer Menu -->
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>EMPRESA</h4>
                                <ul>
                                    <li><a href="#">Sobre nosotros</a></li>
                                    <li><a href="#">Servicios</a></li>
                                    <li><a href="#">Noticias</a></li>
                                    <li><a href="#">Política de privacidad</a></li>
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
                                    <li><a href="#">Envíos nacionales</a></li>
                                    <li><a href="#">Seguimiento en tiempo real</a></li>
                                    <li><a href="#">Transporte express</a></li>
                                    <li><a href="#">Gestión logística</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-logo">
                                <a href="/"><img src="{{ asset('assets/img/logo/logoNombre.png') }}" alt=""></a>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p class="info1">
                                        TransportesPro es una plataforma diseñada para facilitar la gestión de envíos, 
                                        brindando soluciones seguras, rápidas y eficientes para empresas y clientes.
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
                <!-- Footer Bottom -->
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
    </div>  
    <!-- Footer End -->
</footer>

<!-- Scroll Up -->
<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here (copiado de welcome.blade.php) -->
<script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/animated.headline.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('assets/js/contact.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/mail-script.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
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
