<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Panel Admin - Viajes | TransportesPro</title>
    <meta name="description" content="Administración de viajes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <!-- CSS here -->
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

        
        /* Botón Editar en amarillo (warning) con mejor contraste */
        .btn-warning.btn-sm {
            background-color: #ffc107;
            border-color: #e0a800;
            color: #ffffff;
        }
        .btn-warning.btn-sm:hover {
            background-color: #e0a800;
            border-color: #d39e00;
            color: #fff;
        }

        /* Compactar el hero ("Administración de Viajes") y su imagen de fondo */
        .slider-area .single-slider.slider-height {
            min-height: 320px !important;
            height: 320px !important;
            padding: 40px 0;
        }
        .hero__caption h1 {
            font-size: 38px;
            line-height: 1.2;
        }
        .hero-pera p {
            font-size: 16px;
            margin-top: 8px;
        }

        /* Ajustes responsivos */
        @media (max-width: 991.98px) {
            .slider-area .single-slider.slider-height {
                min-height: 260px !important;
                height: 260px !important;
                padding: 30px 0;
            }
            .hero__caption h1 {
                font-size: 30px;
            }
        }
        .hero__caption h1 {
        font-size: 38px;
        line-height: 1.2;
        color: #ffffff !important;
    }
    .hero-pera p {
        font-size: 16px;
        margin-top: 8px;
        color: #ffffff !important;
    }

        
    </style>

</head>
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
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top d-none d-lg-block">
                    <div class="container">
                        <div class="col-xl-12">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="header-info-left">
                                    <ul>
                                        <li>Phone: +99 (0) 101 0000 888</li>
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
                            <!-- Logo -->
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="/"><img src="{{ asset('assets/img/logo/logoNombre.png') }}" alt="TransportesPro"></a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                    <!-- Main-menu -->
                                    <div class="main-menu d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation" class="d-flex align-items-center">
                                                <li><a href="/">Inicio</a></li>
                                                <li><a href="/clientes">Clientes</a></li>
                                                <li><a href="/admin/pilotos">Pilotos</a></li>
                                                <li><a href="/admin/camiones">Camiones</a></li>
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
                                    <!-- Header-btn -->
                                    <div class="header-right-btn d-none d-lg-block ml-20">
                                        <a href="contact.html" class="btn header-btn">Obten tu cotización</a>
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

<div class="slider-area ">
    <div class="single-slider slider-height d-flex align-items-center"
     style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
        url('{{ asset("assets/img/gallery/footer_bg.jpg") }}') no-repeat center center;
        background-size: cover;">
    <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-9">
                        <div class="hero__caption">
                            <h1>Administración de Viajes</h1>
                        </div>
                        <div class="hero-pera">
                            <p>Gestiona tus viajes, clientes y acciones desde el panel administrativo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


        <div class="our-info-area pt-70 pb-40">
            <div class="container">
                <h2 class="mb-4">Viajes</h2>

                <div style="margin-bottom:20px; display:flex; gap:10px; flex-wrap: wrap;">
                    <a href="/admin/viajes/create" class="btn btn-primary">➕ Nuevo Viaje</a>
                    <a href="/clientes" class="btn btn-secondary">👥 Gestionar Clientes</a>
                    <a href="/admin/pilotos" class="btn btn-info"> Gestionar Pilotos</a>
                    <a href="/admin/camiones" class="btn btn-info"> Gestionar Camiones</a>
                    <a href="/" class="btn btn-dark">🏠 Inicio</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($viajes as $viaje)
                                <tr>
                                    <td>{{ $viaje->cliente->nombre ?? 'N/A' }}</td>
                                    <td>{{ $viaje->origen }}</td>
                                    <td>{{ $viaje->destino }}</td>
                                    <td>{{ $viaje->estado }}</td>
                                    <td>
                                    <div style="display:flex; gap:10px; align-items:center;">
                                        
                                        <a href="/admin/viajes/{{ $viaje->id }}/edit" class="btn btn-warning btn-sm text-dark">
                                        ✏️ Editar
                                    </a>
                                        <form method="POST" action="/admin/viajes/{{ $viaje->id }}" style="margin:0;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            🗑 Eliminar
                                        </button>
                                    </form>

                                    </div>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- JS here -->
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