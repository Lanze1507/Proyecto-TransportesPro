<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TransportesPro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
</head>
<body>
<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{ asset('assets/img/logo/loder.jpg') }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
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
            <div class="header-bottom  header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/"><img src="assets/img/logo/logoNombre.png" alt="" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper  d-flex align-items-center justify-content-end">
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

                                            <li>

                                                <a href="/admin/viajes">

                                                    Panel Admin

                                                </a>

                                            </li>

                                        @elseif(auth()->user()->role === 'operador')

                                            <li>

                                                <a href="/operador/viajes">

                                                    Gestión Viajes

                                                </a>

                                            </li>

                                        @else

                                            <li>

                                                <a href="/dashboard">

                                                    Mi Panel

                                                </a>

                                            </li>

                                        @endif

                                        <li>

                                            <form method="POST" action="{{ route('logout') }}">

                                                @csrf

                                                <button
                                                    style="
                                                        background:none;
                                                        border:none;
                                                        color:orange;
                                                        cursor:pointer;
                                                    "
                                                >

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
                                    <a href="#cotizacion" class="btn header-btn">Obten tu cotización</a>
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
    <!--? slider Area Start-->
    <div class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9">
                            <div class="hero__caption">
                                <h1 >Servicios de <span>Logistica</span> segura y confiable</h1>
                            </div>
                            <!--Hero form -->
                            <form id="trackingForm">

    <div class="tracking-box d-flex">

        <input
            type="text"
            id="codigoTracking"
            class="form-control"
            placeholder="Ingresa tu código de guía"
            required
        >

        <button
            type="submit"
            class="btn header-btn ml-2"
        >
            Rastrear
        </button>

    </div>

</form>
                            <!-- Hero Pera -->
                            <div class="hero-pera">
                                <p>Para consulta del estado del pedido</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->
    <!--? our info Start -->
    <div class="our-info-area pt-70 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="flaticon-support"></span>
                        </div>
                        <div class="info-caption">
                            <p>Llamanos en cualquier momento</p>
                            <span>+ (502) 5555-5555</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="flaticon-clock"></span>
                        </div>
                        <div class="info-caption">
                            <p>domingo CERRADO</p>
                            <span>Lun - Sab 8.00 - 18.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-info mb-30">
                        <div class="info-icon">
                            <span class="flaticon-place"></span>
                        </div>
                        <div class="info-caption">
                            <p>Ciudad de Guatemala, 01001</p>
                            <span>Guatemala</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our info End -->
    <!--? Categories Area Start -->
    <div class="categories-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <span>Nuestros servicios</span>
                        <h2>LO QUE PODEMOS HACER POR TI</h2>
                    </div>
                </div>
            </div>
           <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="single-cat text-center mb-50 custom-cat">
            
            <div class="cat-icon mb-3">
                <span class="flaticon-shipped"></span>
            </div>

            <div class="cat-cap">
                <h5><a href="#">Transporte terrestre</a></h5>
                <p>
                    Movemos tus envíos de forma rápida, segura y totalmente controlada. 
                    Con nuestra tecnología de seguimiento en tiempo real, puedes conocer 
                    la ubicación exacta de tu carga en cada momento. Optimizamos rutas, 
                    reducimos tiempos de entrega y garantizamos que tus productos lleguen 
                    en perfectas condiciones a su destino.
                </p>
            </div>

        </div>
    </div>
</div>

<style id="0r2kpl">
.custom-cat {
    padding: 40px 30px;
    border-radius: 18px;
    background: #fff;
    transition: all 0.35s ease;
    cursor: pointer;
}

.custom-cat:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 50px rgba(0,0,0,0.12);
}

.custom-cat .cat-icon span {
    font-size: 55px;
    transition: 0.3s;
}

.custom-cat:hover .cat-icon span {
    color: #0d6efd;
    transform: scale(1.15);
}

.custom-cat h5 a {
    font-size: 22px;
    font-weight: 600;
    display: block;
    margin-bottom: 12px;
}

.custom-cat p {
    font-size: 15px;
    line-height: 1.7;
    color: #6c757d;
}
/* =========================
   MOBILE IMPROVEMENTS
========================= */

@media (max-width: 768px){

    /* Hero */
    .hero__caption h1{
        font-size: 32px !important;
        line-height: 1.2;
        text-align: center;
    }

    .hero-pera{
        text-align:center;
    }

    /* Tracking */
    .tracking-box{
        display:flex;
        flex-direction:column;
        gap:10px;
    }

    .tracking-box input,
    .tracking-box button{
        width:100%;
    }

    /* Navbar */
    .header-btn{
        width:100%;
        text-align:center;
    }

    /* Sections */
    .section-tittle h2{
        font-size:28px !important;
        line-height:1.3;
    }

    .section-tittle span{
        font-size:14px;
    }

    /* About */
    .about-caption{
        text-align:center;
    }

    /* Testimonial form */
    .testimonial-form{
        margin-top:30px;
    }

    .testimonial-form input,
    .testimonial-form button{
        width:100%;
    }

    /* Footer */
    .footer-heading h2{
        font-size:24px;
        text-align:center;
    }

    .contact-number{
        text-align:center;
        display:block;
        margin-top:15px;
    }
}

/* Extra small devices */
@media (max-width: 480px){

    .hero__caption h1{
        font-size:26px !important;
    }

    .section-tittle h2{
        font-size:22px !important;
    }

    .custom-cat{
        padding:20px !important;
    }

    .custom-cat p{
        font-size:14px;
    }
}
<style>
@media (max-width: 768px){

    .header-area .logo{
        text-align:center;
        margin-bottom:15px;
    }

    .header-area .logo img{
        max-width:180px;
    }

    .single-info{
        flex-direction:column;
        text-align:center;
    }

    .single-info .info-caption{
        padding-left:0 !important;
        margin-top:10px;
    }

    .team-caption{
        position:relative !important;
        bottom:0 !important;
    }

    .blog-cap{
        margin-left:0 !important;
        margin-top:15px;
    }

    .contact-form-wrapper{
        padding:20px !important;
    }

    .about-font-img,
    .about-back-img{
        position:relative !important;
        top:auto !important;
        right:auto !important;
    }

    .about-font-img img,
    .about-back-img img{
        width:100%;
    }

    .footer-social{
        text-align:center;
        margin-top:20px;
    }

}
</style>
</style>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Area End -->
    <!--? About Area Start -->
    <div class="about-low-area padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <span>Sobre nuestra compañia</span>
                            <h2>¡Soluciones logísticas y de transporte seguras que nos ahorran un tiempo valioso!</h2>
                        </div>
                        <p>En TransportesPro ofrecemos servicios de transporte confiables, eficientes y adaptados a tus necesidades. Nos especializamos en la gestión de envíos con seguimiento en tiempo real, garantizando seguridad y puntualidad en cada entrega.</p>
                        <p>Nuestra plataforma permite a los clientes monitorear sus envíos, gestionar rutas y optimizar procesos logísticos, brindando una experiencia moderna, rápida y segura.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img">
                            <img src="assets/img/gallery/about2.png" alt="" class="img-fluid">
                        </div>
                        <div class="about-back-img d-none d-lg-block">
                            <img src="assets/img/gallery/about1.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Area End -->
    <!--? contact-form start -->
<section
    id="cotizacion"
    class="contact-form-area section-bg pt-115 pb-120 fix"
    data-background="assets/img/gallery/section_bg02.jpg"
>

    <div class="container">

        <div class="row justify-content-end">

            <div class="col-xl-8 col-lg-9">

                <div class="contact-form-wrapper">

                    <!-- TITULO -->
                    <div class="section-tittle mb-50">

                        <span>
                            Solicita una cotización
                        </span>

                        <h2>
                            Calcula el costo de tu envío de forma rápida y segura
                        </h2>

                        <p>
                            En TransportesPro te ofrecemos una forma sencilla de obtener una cotización personalizada para tu envío.
                        </p>

                    </div>

                    <!-- ALERTA -->
                    @if(session('success'))

                    <div
                        style="
                            background:#d1fae5;
                            color:#065f46;
                            padding:15px;
                            border-radius:10px;
                            margin-bottom:25px;
                            font-weight:600;
                        "
                    >

                        {{ session('success') }}

                    </div>

                    @endif

                    <!-- FORM -->
                    <form
                        action="{{ route('cotizacion.store') }}"
                        method="POST"
                        class="contact-form"
                    >

                        @csrf

                        <div class="row">

                            <!-- NOMBRE -->
                            <div class="col-lg-6 col-md-6">

                                <div class="input-form">

                                    <input
                                        type="text"
                                        name="nombre"
                                        placeholder="Nombre completo"
                                        required
                                    >

                                </div>

                            </div>

                            <!-- EMAIL -->
                            <div class="col-lg-6 col-md-6">

                                <div class="input-form">

                                    <input
                                        type="email"
                                        name="email"
                                        placeholder="Correo electrónico"
                                        required
                                    >

                                </div>

                            </div>

                            <!-- TELEFONO -->
                            <div class="col-lg-12">

                                <div class="input-form">

                                    <input
                                        type="text"
                                        name="telefono"
                                        placeholder="Número de contacto"
                                        required
                                    >

                                </div>

                            </div>

                            <!-- TIPO CARGA -->
                            <div class="col-lg-6">

                                <div class="select-items">

                                    <select
                                        name="tipo_carga"
                                        id="select1"
                                        required
                                    >

                                        <option value="">
                                            Tipo de carga
                                        </option>

                                        <option value="Carga general">
                                            Carga general
                                        </option>

                                        <option value="Carga perecedera">
                                            Carga perecedera
                                        </option>

                                        <option value="Carga peligrosa">
                                            Carga peligrosa
                                        </option>

                                        <option value="Carga refrigerada">
                                            Carga refrigerada
                                        </option>

                                    </select>

                                </div>

                            </div>

                            <!-- CIUDAD -->
                            <div class="col-lg-6 col-md-6">

                                <div class="input-form">

                                    <input
                                        type="text"
                                        name="ciudad_origen"
                                        placeholder="Ciudad de origen"
                                        required
                                    >

                                </div>

                            </div>

                            <!-- INCOTERM -->
                            <div class="col-lg-6 col-md-6">

                                <div class="input-form">

                                    <input
                                        type="text"
                                        name="incoterm"
                                        placeholder="Incoterms (FOB, CIF, DDP)"
                                    >

                                </div>

                            </div>

                            <!-- PESO -->
                            <div class="col-lg-6 col-md-6">

                                <div class="input-form">

                                    <input
                                        type="number"
                                        step="0.01"
                                        name="peso"
                                        placeholder="Peso total (kg)"
                                        required
                                    >

                                </div>

                            </div>

                            <!-- ALTURA -->
                            <div class="col-lg-4 col-md-4">

                                <div class="input-form">

                                    <input
                                        type="number"
                                        step="0.01"
                                        name="alto"
                                        placeholder="Altura (cm)"
                                    >

                                </div>

                            </div>

                            <!-- ANCHO -->
                            <div class="col-lg-4 col-md-4">

                                <div class="input-form">

                                    <input
                                        type="number"
                                        step="0.01"
                                        name="ancho"
                                        placeholder="Ancho (cm)"
                                    >

                                </div>

                            </div>

                            <!-- LARGO -->
                            <div class="col-lg-4 col-md-4">

                                <div class="input-form">

                                    <input
                                        type="number"
                                        step="0.01"
                                        name="largo"
                                        placeholder="Largo (cm)"
                                    >

                                </div>

                            </div>

                            <!-- SERVICIOS -->
                            <div class="col-lg-12">

                                <div class="radio-wrapper mb-30 mt-15">

                                    <label
                                        style="
                                            font-weight:700;
                                            margin-bottom:15px;
                                            display:block;
                                        "
                                    >
                                        Servicios adicionales:
                                    </label>

                                    <div class="addons-group">
                                        <label class="addon">
                                            <input type="checkbox" name="express" value="1">
                                            <span class="addon-box">
                                                <span class="addon-title">Entrega exprés</span>
                                            </span>
                                        </label>
                                        <label class="addon">
                                            <input type="checkbox" name="seguro" value="1">
                                            <span class="addon-box">
                                                <span class="addon-title">Seguro de carga</span>
                                            </span>
                                        </label>
                                        <label class="addon">
                                            <input type="checkbox" name="embalaje" value="1">
                                            <span class="addon-box">
                                                <span class="addon-title">Embalaje especializado</span>
                                            </span>
                                        </label>
                                    </div>

                                </div>

                            </div>

                            <!-- BOTON -->
                            <div class="col-lg-12">

                                <button
                                    type="submit"
                                    class="submit-btn"
                                >

                                    Solicitar cotización

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- contact-form end -->
    <!--Team Ara Start -->
    <div class="team-area section-padding30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span>Nuestro equipo</span>
                        <h2>Conoce a nuestro equipo de expertos</h2>
                    </div> 
                </div>
            </div>
                <div class="row justify-content-center">
                
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-team mb-30 text-center">
                        <div class="team-img">
                            <img src="assets/img/gallery/team2.png" alt="" class="img-fluid">
                            <div class="team-caption">
                                <h3><a href="#">Lanse Castellanos</a></h3>
                                <p>Desarrollador del sistema</p>
                                <!-- Blog Social -->
                                <div class="team-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fas fa-globe"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-team mb-30 text-center">
                        <div class="team-img">
                            <img src="assets/img/gallery/team3.png" alt="" class="img-fluid">
                            <div class="team-caption">
                                <h3><a href="#">Cristal Muñoz</a></h3>
                                <p>Administrador de la plataforma</p>
                                <!-- Blog Social -->
                                <div class="team-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fas fa-globe"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Ara End -->
    <!--? Testimonial Start -->
    <div class="testimonial-area testimonial-padding section-bg" data-background="assets/img/gallery/section_bg04.jpg">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-7 col-lg-7">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2 mb-25">
                        <span>Tetimonios</span>
                        <h2>Lo que nuestros clientes opinan!</h2>
                    </div> 
                    <div class="h1-testimonial-active mb-70">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial ">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>El servicio es excelente y siempre cumple con las expectativas.</p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center">
                                    <div class="founder-img">
                                        <img src="assets/img/gallery/Dashboardpage_testi.png" alt="" class="img-fluid">
                                    </div>
                                    <div class="founder-text">
                                        <span>Jon Smith</span>
                                        <p>Diseñador</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial ">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <p>Muy bueno, los paquetes llegaron a tiempo.</p>
                                </div>
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center">
                                    <div class="founder-img">
                                        <img src="assets/img/gallery/Dashboardpage_testi.png" alt="" class="img-fluid">
                                    </div>
                                    <div class="founder-text">
                                        <span>Carlitos Lopez</span>
                                        <p>Programador</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Start -->
               <div class="col-xl-4 col-lg-5 col-md-8">
    <div class="testimonial-form text-center">
        <h3>Siempre atentos, siempre conectados con tu envío</h3>
        <input type="text" placeholder="Ingresa tu destino">
        <button name="submit" class="submit-btn">Solicitar cotización</button>
    </div>
</div>
                <!-- Form End -->
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <!--? Blog Area Start -->
    <div class="home-blog-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center mb-70">
                        <span>Nuestras noticias recientes</span>
                        <h2>Blog de turistas</h2>
                    </div>
                </div>
            </div>
           <div class="row">

    <div class="col-lg-4 col-md-6">
        <div class="home-blog-single mb-30">
            <div class="blog-img-cap">
                <div class="blog-img">
                    <img src="assets/img/gallery/blog01.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="blog-caption">
                <div class="blog-date text-center">
                    <span>10</span>
                    <p>JUN</p>
                </div>
                <div class="blog-cap">
                    <ul>
                        <li><a href="#"><i class="ti-user"></i> Admin</a></li>
                        <li><a href="#"><i class="ti-comment-alt"></i> 5</a></li>
                    </ul>
                    <h3>
                        <a href="#">Consejos para asegurar tus envíos durante el transporte</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="home-blog-single mb-30">
            <div class="blog-img-cap">
                <div class="blog-img">
                    <img src="assets/img/gallery/blog1.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="blog-caption">
                <div class="blog-date text-center">
                    <span>15</span>
                    <p>JUN</p>
                </div>
                <div class="blog-cap">
                    <ul>
                        <li><a href="#"><i class="ti-user"></i> Admin</a></li>
                        <li><a href="#"><i class="ti-comment-alt"></i> 3</a></li>
                    </ul>
                    <h3>
                        <a href="#">Cómo optimizar rutas para entregas más rápidas y eficientes</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="home-blog-single mb-30">
            <div class="blog-img-cap">
                <div class="blog-img">
                    <img src="assets/img/gallery/blog02.png" alt="" class="img-fluid">
                </div>
            </div>
            <div class="blog-caption">
                <div class="blog-date text-center">
                    <span>20</span>
                    <p>JUN</p>
                </div>
                <div class="blog-cap">
                    <ul>
                        <li><a href="#"><i class="ti-user"></i> Admin</a></li>
                        <li><a href="#"><i class="ti-comment-alt"></i> 7</a></li>
                    </ul>
                    <h3>
                        <a href="#">Seguimiento en tiempo real: mejora la experiencia del cliente</a>
                    </h3>
                </div>
            </div>
        </div>
    </div>

</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
</main>
<footer>
    <!--? Footer Start-->
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
                <a href="/"><img src="assets/img/logo/logoNombre.png" alt="" class="img-fluid"></a>
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
                            <p>
                            Copyright © <script>document.write(new Date().getFullYear());</script> 
                            TransportesPro. Todos los derechos reservados.</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

    <style id="addons-style">
      .addons-group{ display:grid; grid-template-columns:1fr; gap:16px; }
      .addon{ display:block; position:relative; cursor:pointer; }
      .addon input{ position:absolute; opacity:0; pointer-events:none; }
      .addon-box{ display:flex; align-items:center; gap:12px; border:1.5px solid #e5e7eb; border-radius:12px; padding:16px 18px; min-height:56px; background:#fff; color:#374151; font-weight:600; transition:all .2s ease; }
      .addon-box::before{ content:''; width:20px; height:20px; border:2px solid #9ca3af; border-radius:4px; background:#fff; transition:all .2s ease; flex:0 0 20px; }
      .addon input:checked + .addon-box{ border-color:#ff5e14; background:#fff7f3; box-shadow:0 6px 18px rgba(255,94,20,.14); color:#0b1c39; }
      .addon input:checked + .addon-box::before{ background:#ff5e14; border-color:#ff5e14; box-shadow:inset 0 0 0 3px #fff; }
      .addon-box:hover{ transform:translateY(-1px); }
      .addon-title{ font-size:14px; }
      @media (min-width: 576px){ .addons-group{ grid-template-columns: repeat(2, 1fr); gap:16px; } }
      @media (min-width: 992px){ .addons-group{ grid-template-columns: repeat(3, 1fr); gap:20px; } }
    </style>

    <style id="responsive-overrides">
      /* Generic responsive media */
      img, video { max-width: 100%; height: auto; }

      /* Header logo sizing */
      .header-area .logo img { max-height: 48px; width: auto; height: auto; }

      /* Hero title and section titles */
      @media (max-width: 991.98px) { .hero__caption h1 { font-size: 36px; line-height: 1.2; } }
      @media (max-width: 575.98px) { .hero__caption h1 { font-size: 28px; } .section-tittle h2 { font-size: 24px; } }

      /* Slider height adjust */
      @media (max-width: 991.98px) { .slider-height { min-height: 70vh; padding: 60px 0; } }
      @media (max-width: 575.98px) { 
        .slider-height { min-height: 60vh; padding: 40px 0; }
      }

      @media (max-width:768px){
    .header-right-btn{
        margin-top:15px;
    }
}

      /* Tracking form stack on mobile */
      .tracking-box { gap: 10px; }
      @media (max-width: 575.98px) {
        .tracking-box { flex-direction: column; align-items: stretch; }
        .tracking-box .form-control,
        .tracking-box .btn { width: 100%; }
        .tracking-box .btn { margin-left: 0 !important; }
      }

      /* Contact form paddings reduce on mobile */
      @media (max-width: 575.98px) {
        .pt-115 { padding-top: 60px; }
        .pb-120 { padding-bottom: 60px; }
        .section-padding30 { padding: 30px 0; }
      }

      /* Cards adjustments */
      @media (max-width: 575.98px) {
        .custom-cat { padding: 28px 20px; }
        .custom-cat h5 a { font-size: 18px; }
        .custom-cat p { font-size: 14px; }
      }

      /* Footer text alignment on mobile */
      @media (max-width: 575.98px) {
        .wantToWork-caption2 h2 { font-size: 20px; }
        .contact-number { float: none !important; display: block; margin-top: 12px; }
      }

      /* Make common block images responsive */
      .about-img img,
      .team-img img,
      .blog-img img,
      .founder-img img,
      .footer-logo img { max-width: 100%; height: auto; }

      /* Reduce margins to avoid overflow on small screens */
      @media (max-width: 575.98px) {
        .mb-80 { margin-bottom: 40px; }
        .mb-70 { margin-bottom: 35px; }
        .mb-50 { margin-bottom: 30px; }
      }
    </style>

    <!-- JS here -->

    <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Nice-select, sticky -->
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    
    <!-- contact js -->
    <script src="{{ asset('assets/js/contact.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script> 
    <script>

document
.getElementById('trackingForm')

.addEventListener('submit', function(e){

    e.preventDefault();

    let codigo =

        document
        .getElementById('codigoTracking')
        .value
        .trim();

    if(!codigo) return;

    window.location.href =

        '/seguimiento/' + codigo;

});

</script>  
{{--
    ══════════════════════════════════════════════════════════════
    CHATBOT WIDGET — TransPro Asistente IA
    
    INSTRUCCIONES DE USO:
    1. Copia este bloque completo y pégalo al final de welcome.blade.php,
       justo ANTES del cierre </body>.
    2. Asegúrate de tener en tu .env:  ANTHROPIC_API_KEY=sk-ant-...
    3. Agrega la ruta en web.php:       Route::post('/api/chatbot', ...)
    4. Agrega el controlador:           app/Http/Controllers/ChatbotController.php
    ══════════════════════════════════════════════════════════════
--}}

<style>
/* ── Variables del widget ── */
#transpro-chat-widget {
    --brand:       #ff5e14;
    --brand-dark:  #0b1c39;
    --brand-light: rgba(255,94,20,.10);
    --bubble-size: 60px;
    --chat-w:      370px;
    --chat-h:      520px;
    --radius:      18px;
    font-family: 'Segoe UI', system-ui, sans-serif;
}
#transpro-chat-widget {
    position: fixed; bottom: 28px; right: 28px;
    z-index: 99999; display: flex; flex-direction: column; align-items: flex-end;
}
#tpw-bubble {
    width: var(--bubble-size); height: var(--bubble-size); border-radius: 50%;
    background: var(--brand); display: flex; align-items: center; justify-content: center;
    cursor: pointer; position: relative;
    box-shadow: 0 4px 20px rgba(255,94,20,.45);
    transition: transform .2s, box-shadow .2s; flex-shrink: 0;
}
#tpw-bubble:hover { transform: scale(1.07); box-shadow: 0 6px 28px rgba(255,94,20,.55); }
#tpw-bubble svg   { width: 26px; height: 26px; fill: #fff; }
#tpw-notif {
    position: absolute; top: -3px; right: -3px;
    width: 18px; height: 18px; border-radius: 50%;
    background: #ef4444; border: 2px solid #f0f2f5;
    font-size: 10px; color: #fff; font-weight: 700;
    display: flex; align-items: center; justify-content: center;
}
#tpw-panel {
    width: var(--chat-w); height: var(--chat-h); background: #fff;
    border-radius: var(--radius);
    box-shadow: 0 20px 60px rgba(0,0,0,.18), 0 4px 16px rgba(0,0,0,.08);
    display: flex; flex-direction: column; overflow: hidden; margin-bottom: 14px;
    transform-origin: bottom right; transition: opacity .22s, transform .22s;
}
#tpw-panel.tpw-hidden {
    opacity: 0; transform: scale(0.88) translateY(12px); pointer-events: none;
}
.tpw-header {
    background: var(--brand-dark); padding: 14px 16px;
    display: flex; align-items: center; gap: 11px; flex-shrink: 0;
}
.tpw-avatar {
    width: 40px; height: 40px; border-radius: 50%; background: var(--brand);
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
}
.tpw-hinfo { flex: 1; }
.tpw-hname  { font-size: 14px; font-weight: 700; color: #fff; }
.tpw-hstatus {
    font-size: 11px; color: rgba(255,255,255,.55);
    display: flex; align-items: center; gap: 5px; margin-top: 2px;
}
.tpw-dot { width: 7px; height: 7px; border-radius: 50%; background: #22c55e; flex-shrink: 0; }
.tpw-close {
    background: none; border: none; cursor: pointer;
    color: rgba(255,255,255,.5); font-size: 20px;
    line-height: 1; padding: 4px; transition: color .15s;
}
.tpw-close:hover { color: #fff; }
.tpw-quick {
    padding: 9px 13px 6px; display: flex; gap: 6px; flex-wrap: wrap;
    border-bottom: 1px solid #f3f4f6; flex-shrink: 0;
}
.tpw-qa {
    font-size: 11px; font-weight: 600; padding: 4px 10px; border-radius: 999px;
    border: 1px solid #e5e7eb; background: #f9fafb; color: #374151;
    cursor: pointer; transition: all .15s; white-space: nowrap;
}
.tpw-qa:hover { background: var(--brand-light); border-color: var(--brand); color: var(--brand); }
#tpw-messages {
    flex: 1; overflow-y: auto; padding: 14px 13px;
    display: flex; flex-direction: column; gap: 11px; scroll-behavior: smooth;
}
#tpw-messages::-webkit-scrollbar { width: 4px; }
#tpw-messages::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 4px; }
.tpw-msg { display: flex; gap: 8px; align-items: flex-end; max-width: 88%; }
.tpw-msg.tpw-bot  { align-self: flex-start; }
.tpw-msg.tpw-user { align-self: flex-end; flex-direction: row-reverse; }
.tpw-mavatar {
    width: 27px; height: 27px; border-radius: 50%; background: var(--brand);
    flex-shrink: 0; display: flex; align-items: center; justify-content: center; font-size: 13px;
}
.tpw-mbubble {
    padding: 9px 12px; border-radius: 14px;
    font-size: 13px; line-height: 1.5; max-width: calc(100% - 36px);
}
.tpw-bot  .tpw-mbubble { background: #f3f4f6; color: #111827; border-bottom-left-radius: 4px; }
.tpw-user .tpw-mbubble { background: var(--brand); color: #fff; border-bottom-right-radius: 4px; }
.tpw-mtime { font-size: 10px; color: #9ca3af; margin-top: 3px; padding: 0 3px; }
.tpw-typing { display: flex; gap: 4px; padding: 3px 2px; }
.tpw-typing span {
    width: 7px; height: 7px; border-radius: 50%; background: #9ca3af;
    animation: tpwBounce 1.2s infinite;
}
.tpw-typing span:nth-child(2) { animation-delay: .2s; }
.tpw-typing span:nth-child(3) { animation-delay: .4s; }
@keyframes tpwBounce {
    0%,60%,100% { transform: translateY(0); }
    30%          { transform: translateY(-6px); }
}
.tpw-track-form {
    background: #fff; border: 1px solid #e5e7eb;
    border-radius: 11px; padding: 11px; margin-top: 4px; width: 210px;
}
.tpw-track-form p   { font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 7px; }
.tpw-track-form input {
    width: 100%; border: 1px solid #e5e7eb; border-radius: 7px;
    padding: 7px 9px; font-size: 12px; outline: none;
    letter-spacing: 1px; margin-bottom: 7px; font-family: monospace;
}
.tpw-track-form input:focus { border-color: var(--brand); }
.tpw-track-form button {
    width: 100%; background: var(--brand); color: #fff;
    border: none; border-radius: 7px; padding: 7px;
    font-size: 12px; font-weight: 700; cursor: pointer;
}
.tpw-track-form button:hover { opacity: .9; }
.tpw-footer {
    padding: 10px 13px; border-top: 1px solid #f3f4f6;
    display: flex; gap: 8px; align-items: flex-end; flex-shrink: 0;
}
#tpw-input {
    flex: 1; border: 1px solid #e5e7eb; border-radius: 12px;
    padding: 8px 12px; font-size: 13px; resize: none; outline: none;
    max-height: 88px; min-height: 38px; line-height: 1.45;
    transition: border-color .15s; font-family: inherit;
}
#tpw-input:focus        { border-color: var(--brand); }
#tpw-input::placeholder { color: #9ca3af; }
#tpw-send {
    width: 38px; height: 38px; border-radius: 50%;
    background: var(--brand); border: none; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; transition: opacity .15s, transform .1s;
}
#tpw-send:hover  { opacity: .88; }
#tpw-send:active { transform: scale(.93); }
#tpw-send svg    { width: 16px; height: 16px; fill: #fff; }
.tpw-powered {
    text-align: center; font-size: 10px; color: #c4c4c4;
    padding: 3px 0 7px; flex-shrink: 0;
}
@media (max-width: 480px) {
    #transpro-chat-widget { bottom: 16px; right: 16px; }
    #tpw-panel { width: calc(100vw - 32px); }
}
</style>

<div id="transpro-chat-widget" role="complementary" aria-label="Asistente virtual TransPro">

    <div id="tpw-panel" class="tpw-hidden" aria-live="polite">

        <div class="tpw-header">
            <div class="tpw-avatar">🚛</div>
            <div class="tpw-hinfo">
                <div class="tpw-hname">TransPro Asistente</div>
                <div class="tpw-hstatus">
                    <div class="tpw-dot"></div>
                    En línea · responde en segundos
                </div>
            </div>
            <button class="tpw-close" id="tpw-close" aria-label="Cerrar chat">×</button>
        </div>

        <div class="tpw-quick" id="tpw-quick">
            <button class="tpw-qa" data-msg="¿Qué servicios de transporte ofrecen?">📦 Servicios</button>
            <button class="tpw-qa" data-msg="Quiero rastrear mi envío">🔍 Rastrear</button>
            <button class="tpw-qa" data-msg="¿Cuánto cuesta un flete?">💰 Tarifas</button>
            <button class="tpw-qa" data-msg="Quiero hablar con un operador">👤 Operador</button>
        </div>

        <div id="tpw-messages"></div>

        <div class="tpw-footer">
            <textarea id="tpw-input" placeholder="Escribe tu mensaje..." rows="1" aria-label="Mensaje al asistente"></textarea>
            <button id="tpw-send" aria-label="Enviar mensaje">
                <svg viewBox="0 0 24 24"><path d="M2 21l21-9L2 3v7l15 2-15 2v7z"/></svg>
            </button>
        </div>
        <div class="tpw-powered">Impulsado por Claude AI · TransportesPro</div>

    </div>

    <div id="tpw-bubble" role="button" tabindex="0" aria-label="Abrir asistente virtual">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/>
        </svg>
        <div id="tpw-notif" aria-hidden="true">1</div>
    </div>

</div>

<script>
(function () {

    var SYSTEM_PROMPT = [
    'Eres TransPro Asistente de TransportesPro Guatemala. Responde en español, máximo 2 oraciones.',
    'SERVICIOS: carga general, refrigerada, nacional e internacional, rastreo GPS, firma digital.',
    'TARIFAS: varían por peso/distancia, no des precios exactos, deriva a operador: +502 5192-2981.',
    'RASTREO: pide código TRX-XXXXXX y redirige a /seguimiento/{codigo}.',
    'HORARIO: Lun-Sab 8am-6pm. Si no sabes algo, ofrece conectar con operador.',
    ].join(' ');

    var history   = [];
    var isOpen    = false;
    var isLoading = false;

    var panel    = document.getElementById('tpw-panel');
    var bubble   = document.getElementById('tpw-bubble');
    var notif    = document.getElementById('tpw-notif');
    var messages = document.getElementById('tpw-messages');
    var input    = document.getElementById('tpw-input');
    var btnSend  = document.getElementById('tpw-send');
    var btnClose = document.getElementById('tpw-close');

    function getTime() {
        return new Date().toLocaleTimeString('es-GT', { hour: '2-digit', minute: '2-digit' });
    }

    function addMessage(role, text) {
        var wrap = document.createElement('div');
        wrap.className = 'tpw-msg tpw-' + role;
        if (role === 'bot') {
            var av = document.createElement('div');
            av.className = 'tpw-mavatar';
            av.textContent = '🚛';
            wrap.appendChild(av);
        }
        var col = document.createElement('div');
        col.style.cssText = 'display:flex;flex-direction:column;max-width:calc(100% - 36px)';
        var bub = document.createElement('div');
        bub.className = 'tpw-mbubble';
        bub.textContent = text;
        var time = document.createElement('div');
        time.className = 'tpw-mtime';
        time.textContent = getTime();
        col.appendChild(bub);
        col.appendChild(time);
        wrap.appendChild(col);
        messages.appendChild(wrap);
        messages.scrollTop = messages.scrollHeight;
        return bub;
    }

    function showTyping() {
        var wrap = document.createElement('div');
        wrap.className = 'tpw-msg tpw-bot';
        wrap.id = 'tpw-typing';
        var av = document.createElement('div');
        av.className = 'tpw-mavatar';
        av.textContent = '🚛';
        var bub = document.createElement('div');
        bub.className = 'tpw-mbubble';
        var dots = document.createElement('div');
        dots.className = 'tpw-typing';
        dots.innerHTML = '<span></span><span></span><span></span>';
        bub.appendChild(dots);
        wrap.appendChild(av);
        wrap.appendChild(bub);
        messages.appendChild(wrap);
        messages.scrollTop = messages.scrollHeight;
    }

    function removeTyping() {
        var el = document.getElementById('tpw-typing');
        if (el) el.remove();
    }

    function showTrackingForm() {
        var wrap = document.createElement('div');
        wrap.className = 'tpw-msg tpw-bot';
        var av = document.createElement('div');
        av.className = 'tpw-mavatar';
        av.textContent = '🚛';
        var bub = document.createElement('div');
        bub.className = 'tpw-mbubble';
        bub.style.cssText = 'background:transparent;padding:0;';
        var form = document.createElement('div');
        form.className = 'tpw-track-form';
        form.innerHTML =
            '<p>Ingresa tu código de guía</p>' +
            '<input type="text" id="tpw-track-input" placeholder="TRX-000000" maxlength="10"/>' +
            '<button onclick="window._tpwTrack()">Rastrear envío →</button>';
        bub.appendChild(form);
        wrap.appendChild(av);
        wrap.appendChild(bub);
        messages.appendChild(wrap);
        messages.scrollTop = messages.scrollHeight;
    }

    window._tpwTrack = function () {
        var inp = document.getElementById('tpw-track-input');
        if (!inp) return;
        var val = inp.value.trim().toUpperCase();
        if (!/^TRX-[A-Z0-9]{6}$/.test(val)) {
            alert('Formato inválido. Ejemplo: TRX-000123');
            return;
        }
        addMessage('user', 'Rastrear envío ' + val);
        addMessage('bot', 'Puedes rastrear tu envío en tiempo real aquí: ' + window.location.origin + '/seguimiento/' + val);
        history.push({ role: 'user',      content: 'Rastrear envío ' + val });
        history.push({ role: 'assistant', content: 'Puedes rastrear en: /seguimiento/' + val });
    };

    /* ══════════════════════════════════════════════════════
       CAMBIO CLAVE: el fetch ahora apunta a /api/chatbot
       (ruta Laravel) en lugar de llamar a Anthropic directo.
       Esto elimina el error de CORS y mantiene la API key
       segura en el servidor.
    ══════════════════════════════════════════════════════ */
    function sendMessage(text) {
        if (!text.trim() || isLoading) return;
        isLoading = true;
        btnSend.disabled = true;  // ← agrega esta línea
        btnSend.style.opacity = '0.5';  // ← y esta

        addMessage('user', text);
        history.push({ role: 'user', content: text });
        showTyping();

        fetch('/api/chatbot', {                          // ← ruta Laravel (proxy)
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                ? document.querySelector('meta[name="csrf-token"]').content
                                : ''
            },
            body: JSON.stringify({
                system:   SYSTEM_PROMPT,
                messages: history
            })
        })
        .then(function (res) { return res.json(); })
        .then(function (data) {
            removeTyping();
            var reply = (data.content && data.content[0] && data.content[0].text)
                ? data.content[0].text
                : 'Lo siento, no pude procesar tu consulta. Intenta de nuevo.';
            addMessage('bot', reply);
            history.push({ role: 'assistant', content: reply });
            var askedForCode = reply.toLowerCase().includes('trx') &&
                               reply.toLowerCase().includes('código');
            if (askedForCode) showTrackingForm();
        })
        .catch(function () {
            removeTyping();
            addMessage('bot', 'Hubo un error de conexión. Intenta de nuevo en un momento.');
        })
        .finally(function () { 
            isLoading = false; 
            btnSend.disabled = false;      // 
            btnSend.style.opacity = '1'; 
        });
    }

    bubble.addEventListener('click', function () {
        isOpen = !isOpen;
        panel.classList.toggle('tpw-hidden', !isOpen);
        notif.style.display = 'none';
        if (isOpen && messages.children.length === 0) {
            setTimeout(function () {
                showTyping();
                setTimeout(function () {
                    removeTyping();
                    addMessage('bot', '¡Hola! 👋 Soy el asistente de TransportesPro. ¿En qué puedo ayudarte hoy?');
                }, 900);
            }, 300);
        }
        if (isOpen) input.focus();
    });

    btnClose.addEventListener('click', function () {
        isOpen = false;
        panel.classList.add('tpw-hidden');
    });

    btnSend.addEventListener('click', function () {
        var txt = input.value.trim();
        if (txt) { sendMessage(txt); input.value = ''; input.style.height = 'auto'; }
    });

    input.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            var txt = input.value.trim();
            if (txt) { sendMessage(txt); input.value = ''; input.style.height = 'auto'; }
        }
    });

    input.addEventListener('input', function () {
        input.style.height = 'auto';
        input.style.height = Math.min(input.scrollHeight, 88) + 'px';
    });

    document.querySelectorAll('.tpw-qa').forEach(function (btn) {
        btn.addEventListener('click', function () { sendMessage(btn.getAttribute('data-msg')); });
    });

    bubble.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') bubble.click();
    });

})();
</script>
{{-- ══ FIN CHATBOT WIDGET ══ --}} 
</body>
</html>