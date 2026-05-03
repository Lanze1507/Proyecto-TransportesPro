<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Nuevo Piloto - TransportesPro</title>
    <meta name="description" content="Crear nuevo piloto en TransportesPro">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- CSS here (mismo set que welcome.blade.php) -->
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

[!-- Custom styles para este formulario -->
<style>
    .custom-input {
    height: 55px;
    border-radius: 10px;
    border: 1px solid #ddd;
    transition: all 0.3s ease;
}

.custom-input:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40,167,69,0.15);
}

.save-btn {
    transition: all 0.3s ease;
}

.save-btn:hover {
    transform: translateY(-2px) scale(1.03);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
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
    <!-- Header Start (igual que welcome.blade.php) -->
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
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
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
    <!-- Hero/encabezado de sección -->
    <div class="slider-area">
        <div class="single-slider d-flex align-items-center" style="min-height: 220px; background: #0b1c39;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="text-white mb-2">Nuevo Piloto</h1>
                        <p class="text-white-50 mb-0">Registra un piloto en el sistema</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario de creación -->
    <section class="section-padding30" style="background: url('{{ asset('assets/img/gallery/section_bg02.jpg') }}') no-repeat center center/cover; position: relative;">
    
    <div style="position:absolute; inset:0; background: rgba(0,0,0,0.6);"></div>

    <div class="container position-relative">

        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-10">

                <div class="card p-4 p-md-5 shadow-lg" style="border-radius: 18px; border:none;">

                    <div class="text-center mb-4">
                        <h2 style="font-weight:700;">Crear nuevo piloto</h2>
                        <p style="color:#777;">Completa la información del piloto</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('pilotos.store') }}">
                        @csrf

                        <div class="row">

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="nombre" class="form-control custom-input"
                                    placeholder="Nombre completo"
                                    value="{{ old('nombre') }}" required>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="telefono" class="form-control custom-input"
                                    placeholder="Teléfono"
                                    value="{{ old('telefono') }}" required>
                            </div>

                            <div class="col-lg-12 mb-4">
                                <input type="text" name="licencia" class="form-control custom-input"
                                    placeholder="Número de licencia"
                                    value="{{ old('licencia') }}" required>
                            </div>

                            <div class="col-12 d-flex justify-content-between align-items-center">

                                <a href="/admin/pilotos" class="btn btn-outline-dark px-4">
                                    ← Volver
                                </a>

                                <button class="btn btn-success btn-lg px-5 save-btn">
                                    Guardar piloto
                                </button>

                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>

</section>
</main>

<footer>
    <!-- Footer Start (igual que welcome.blade.php) -->
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

<!-- JS here (mismo set que welcome.blade.php) -->
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
</body>
</html>
