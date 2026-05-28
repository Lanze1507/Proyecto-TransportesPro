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

        

/* =========================
   GLOBAL
========================= */

body{

    background:#f4f7fb;

    background-image:
        radial-gradient(circle at top right, rgba(255,94,20,.05), transparent 25%),
        radial-gradient(circle at bottom left, rgba(11,28,57,.05), transparent 30%);
}

/* =========================
   HERO
========================= */

.slider-area .single-slider.slider-height{

    min-height:320px !important;

    height:320px !important;

    padding:40px 0;

    position:relative;
}

.hero__caption h1{

    font-size:48px;

    font-weight:800;

    color:#fff !important;

    margin-bottom:12px;
}

.hero-pera p{

    font-size:17px;

    color:#e5e7eb !important;

    max-width:650px;
}

/* =========================
   KPI CARDS
========================= */

.kpi-card{

    background:#fff;

    border-radius:20px;

    padding:20px;

    position:relative;

    overflow:hidden;

    transition:.3s ease;

    box-shadow:0 15px 45px rgba(0,0,0,.06);

    height:100%;
}

.kpi-card:hover{

    transform:translateY(-8px);

    box-shadow:0 25px 60px rgba(0,0,0,.12);
}

.kpi-card::before{

    content:'';

    position:absolute;

    width:140px;

    height:140px;

    border-radius:50%;

    top:-40px;

    right:-40px;

    opacity:.08;
}

.kpi-orange::before{ background:#ff5e14; }
.kpi-blue::before{ background:#2563eb; }
.kpi-purple::before{ background:#7c3aed; }
.kpi-green::before{ background:#10b981; }

.kpi-icon{

    width:58px;

    height:58px;

    border-radius:20px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:30px;

    margin-bottom:18px;
}

.kpi-orange .kpi-icon{
    background:rgba(255,94,20,.12);
}

.kpi-blue .kpi-icon{
    background:rgba(37,99,235,.12);
}

.kpi-purple .kpi-icon{
    background:rgba(124,58,237,.12);
}

.kpi-green .kpi-icon{
    background:rgba(16,185,129,.12);
}

.kpi-num{

    font-size:32px;

    font-weight:800;

    color:#0b1c39;

    line-height:1;
}

.kpi-label{

    margin-top:10px;

    color:#6b7280;

    font-size:14px;

    font-weight:600;
}

/* =========================
   PANEL
========================= */

.admin-panel{

    background:#fff;

    border-radius:28px;

    overflow:hidden;

    box-shadow:0 20px 60px rgba(0,0,0,.06);
}

.panel-header{

    padding:28px 32px;

    border-bottom:1px solid #eef2f7;

    display:flex;

    justify-content:space-between;

    align-items:center;

    flex-wrap:wrap;

    gap:14px;
}

.panel-header h2{

    margin:0;

    font-size:28px;

    font-weight:800;

    color:#0b1c39;
}

/* =========================
   BOTONES
========================= */

.action-btn{

    border:none;

    border-radius:14px;

    padding:13px 20px;

    font-size:13px;

    font-weight:700;

    transition:.25s ease;

    text-decoration:none;

    display:inline-flex;

    align-items:center;

    gap:8px;
}

.action-btn:hover{

    transform:translateY(-3px);

    text-decoration:none;
}

.btn-orange{

    background:#ff5e14;

    color:#fff;
}

.btn-orange:hover{

    background:#ff6f2f;

    color:#fff;
}

.btn-darkpro{

    background:#0b1c39;

    color:#fff;
}

.btn-darkpro:hover{

    background:#13284d;

    color:#fff;
}

.btn-soft{

    background:#f3f6fa;

    color:#374151;
}

.btn-soft:hover{

    background:#e8edf5;

    color:#111827;
}

/* =========================
   TABLA
========================= */

.table-responsive{

    padding:28px;
}

.table{

    margin-bottom:0;
}

.table thead th{

    border:none;

    background:#f7f9fc;

    padding:18px 16px;

    font-size:12px;

    text-transform:uppercase;

    letter-spacing:.8px;

    font-weight:800;

    color:#6b7280;
}

.table tbody td{

    padding:22px 16px;

    vertical-align:middle;

    border-top:1px solid #f1f5f9;

    font-size:14px;

    color:#374151;
}

.table tbody tr{

    transition:.2s ease;
}

.table tbody tr:hover{

    background:#fafcff;
}

/* =========================
   BADGES
========================= */

.estado-badge{

    padding:8px 15px;

    border-radius:999px;

    font-size:11px;

    font-weight:800;

    letter-spacing:.5px;
}

.estado-pendiente{
    background:#fff4df;
    color:#c27c00;
}

.estado-aprobado{
    background:#e7f0ff;
    color:#2563eb;
}

.estado-en_ruta{
    background:#efe7ff;
    color:#7c3aed;
}

.estado-completado{
    background:#dcfce7;
    color:#059669;
}

.estado-cancelado{
    background:#fee2e2;
    color:#dc2626;
}

/* =========================
   ACCIONES
========================= */

.btn-table{

    border:none;

    border-radius:12px;

    padding:10px 14px;

    font-size:12px;

    font-weight:700;

    transition:.25s ease;
}

.btn-edit{

    background:#fff4df;

    color:#c27c00;
}

.btn-edit:hover{

    background:#ffe7b3;
}

.btn-delete{

    background:#fee2e2;

    color:#dc2626;
}

.btn-delete:hover{

    background:#fecaca;
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    .hero__caption h1{

        font-size:34px;
    }

    .panel-header{

        flex-direction:column;

        align-items:flex-start;
    }

}

/* =========================
FILTROS
========================= */

.filtro-btn{

    border:none;

    background:#f3f6fa;

    color:#6b7280;

    border-radius:999px;

    padding:12px 18px;

    font-size:13px;

    font-weight:700;

    transition:.25s ease;

    cursor:pointer;
}

.filtro-btn:hover{

    background:#fff2eb;

    color:#ff5e14;

    transform:translateY(-2px);
}

.filtro-btn.active{

    background:#ff5e14;

    color:#fff;

    box-shadow:
        0 10px 25px rgba(255,94,20,.25);
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
                                                <li><a href="/operador/viajes">Operador</a></li>
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
            <div
    class="row mb-3 justify-content-center"
    style="
        max-width:1200px;
        margin:auto;
    "
>

    <div class="col-xl-2 col-lg-3 col-md-5 mb-3">

        <div class="kpi-card kpi-orange">

            <div class="kpi-icon">

                📦

            </div>

            <div class="kpi-num">

                {{ $totalViajes }}

            </div>

            <div class="kpi-label">

                Total viajes

            </div>

        </div>

    </div>

    <div class="col-xl-2 col-lg-3 col-md-5 mb-3">

        <div class="kpi-card kpi-blue">

            <div class="kpi-icon">

                🚛

            </div>

            <div class="kpi-num">

                {{ $enRuta }}

            </div>

            <div class="kpi-label">

                En ruta

            </div>

        </div>

    </div>

    <div class="col-xl-2 col-lg-3 col-md-5 mb-3">

        <div class="kpi-card kpi-purple">

            <div class="kpi-icon">

                ⏳

            </div>

            <div class="kpi-num">

                {{ $pendientes }}

            </div>

            <div class="kpi-label">

                Pendientes

            </div>

        </div>

    </div>

    <div class="col-xl-2 col-lg-3 col-md-5 mb-3">

        <div class="kpi-card kpi-green">

            <div class="kpi-icon">

                ✅

            </div>

            <div class="kpi-num">

                {{ $completados }}

            </div>

            <div class="kpi-label">

                Completados

            </div>

        </div>

    </div>

</div>
            <div class="container">
                <h2 class="mb-4">Viajes</h2>
                <div
    style="
        background:#fff;
        border-radius:24px;
        padding:25px;
        margin-bottom:30px;
        box-shadow:0 10px 40px rgba(0,0,0,.05);
    "
>

    <div
    style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
        flex-wrap:wrap;
        gap:10px;
    "
>

    <h4
        style="
            font-weight:800;
            margin:0;
            color:#0b1c39;
        "
    >

        🔔 Nuevos registros

    </h4>

    <button
        type="button"
        id="toggleNotificaciones"
        style="
            border:none;
            background:#ff5e14;
            color:white;
            padding:10px 16px;
            border-radius:12px;
            font-size:13px;
            font-weight:700;
            cursor:pointer;
        "
    >

        Ocultar

    </button>

</div>
<div id="contenedorNotificaciones">
   @forelse($notificaciones as $n)

    <div
        style="
            padding:18px;
            border-radius:16px;
            background:#f8fafc;
            margin-bottom:12px;
            position:relative;
        "
    >

        <form
            method="POST"
            action="{{ route('admin.notificaciones.delete', $n->id) }}"
            style="
                position:absolute;
                top:14px;
                right:14px;
            "
        >

            @csrf
            @method('DELETE')

            <button
                type="submit"
                style="
                    border:none;
                    background:#fee2e2;
                    color:#dc2626;
                    width:32px;
                    height:32px;
                    border-radius:50%;
                    cursor:pointer;
                    font-weight:800;
                "
            >

                ✕

            </button>

        </form>

        <div
            style="
                font-weight:700;
                color:#0b1c39;
                margin-bottom:5px;
            "
        >

            {{ $n->titulo }}

        </div>

        <div style="color:#6b7280;">

            {{ $n->mensaje }}

        </div>

        <small style="color:#9ca3af;">

            {{ $n->created_at->diffForHumans() }}

        </small>

    </div>

@empty

    <p style="color:#9ca3af;">

        No hay notificaciones.

    </p>

@endforelse
</div>

</div>
                <div
    style="
        display:flex;
        gap:12px;
        flex-wrap:wrap;
        align-items:center;
        margin-bottom:28px;
    "
>

    <form method="GET">

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="🔍 Buscar viaje..."
        style="
            height:48px;
            border:none;
            background:#f7f9fc;
            border-radius:14px;
            padding:0 18px;
            min-width:260px;
            font-size:14px;
            box-shadow:
                inset 0 0 0 1px #e5e7eb;
        "
    >

</form>

    <button
        class="filtro-btn active"
        data-estado="todos"
    >

        Todos

    </button>

    <button
        class="filtro-btn"
        data-estado="pendiente"
    >

        ⏳ Pendientes

    </button>

    <button
        class="filtro-btn"
        data-estado="en_ruta"
    >

        🚛 En ruta

    </button>

    <button
        class="filtro-btn"
        data-estado="completado"
    >

        ✅ Completados

    </button>

</div>

                <div
    style="
        margin-top:10px;
        margin-bottom:30px;
        display:flex;
        gap:12px;
        flex-wrap:wrap;
    "
>
                    <a href="/admin/viajes/create" class="action-btn btn-orange">➕ Nuevo Viaje</a>
                    <a href="/clientes" class="btn btn-secondary">👥 Gestionar Clientes</a>
                    <a href="/admin/pilotos" class="btn btn-info"> Gestionar Pilotos</a>
                    <a href="/admin/camiones" class="btn btn-info"> Gestionar Camiones</a>
                    <a href="/" class="btn btn-dark">🏠 Inicio</a>
                    <a
    href="{{ route('cotizaciones.index') }}"
    class="btn btn-success"
>

    📦 cotizaciones

</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
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

@forelse($viajes as $viaje)

<tr data-estado="{{ $viaje->estado }}">

    <td>

        {{ $viaje->cliente->nombre ?? 'N/A' }}

    </td>

    <td>

        {{ $viaje->origen }}

    </td>

    <td>

        {{ $viaje->destino }}

    </td>

    <td>

        <span
            class="estado-badge estado-{{ $viaje->estado }}"
        >

            {{ ucfirst(str_replace('_',' ',$viaje->estado)) }}

        </span>

    </td>

   <td>

    <div
        style="
            display:flex;
            gap:10px;
            align-items:center;
        "
    >

        <a
            href="/admin/viajes/{{ $viaje->id }}/edit"
            class="btn-table btn-edit"
        >

            ✏️ Editar

        </a>

        <a
            href="{{ route('admin.viajes.evidencias', $viaje->id) }}"
            class="btn-table"
            style="
                background:#dbeafe;
                color:#1d4ed8;
                text-decoration:none;
            "
        >

            📷 Evidencias

        </a>

        <form
            method="POST"
            action="/admin/viajes/{{ $viaje->id }}"
            style="margin:0;"
        >

            @csrf
            @method('DELETE')

            <button class="btn-table btn-delete">

                🗑 Eliminar

            </button>

        </form>

    </div>

</td>

</tr>

@empty

<tr>

    <td
        colspan="5"
        style="
            text-align:center;
            padding:50px;
            color:#9ca3af;
        "
    >

        No hay viajes registrados aún.

    </td>

</tr>

@endforelse

</tbody>
                        </tbody>
                    </table>
                </div>
                <div
    style="
        margin-top:30px;
        display:flex;
        justify-content:center;
    "
>

    {{ $viajes->links() }}

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
    <script>

/* =========================
FILTROS
========================= */

document.querySelectorAll('.filtro-btn')
.forEach(btn => {

    btn.addEventListener('click', function () {

        document.querySelectorAll('.filtro-btn')
        .forEach(b => b.classList.remove('active'));

        this.classList.add('active');

        const estado = this.dataset.estado;

        document.querySelectorAll('tbody tr')
        .forEach(row => {

            if(
                estado === 'todos'
                ||
                row.dataset.estado === estado
            ){

                row.style.display = '';

            }else{

                row.style.display = 'none';

            }

        });

    });

});



</script>
<script>

const btnToggle = document.getElementById(

    'toggleNotificaciones'

);

const contenedor = document.getElementById(

    'contenedorNotificaciones'

);

let visible = true;

btnToggle.addEventListener('click', () => {

    visible = !visible;

    if(visible){

        contenedor.style.display = 'block';

        btnToggle.innerText = 'Ocultar';

    }else{

        contenedor.style.display = 'none';

        btnToggle.innerText = 'Mostrar';

    }

});

</script>
</body>
</html>