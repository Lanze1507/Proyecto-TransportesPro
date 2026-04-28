<!doctype html>

<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <title>Editar Cliente - TransportesPro</title>

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>

<!-- HEADER (igual que index) -->

<header>
    <div class="header-area">
        <div class="main-header">
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">

                        <!-- LOGO -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>

                        <!-- MENU CORRECTO -->
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">

                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="/">Inicio</a></li>
                                            <li><a href="/clientes">Clientes</a></li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>

                        <!-- MOBILE -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- CONTENIDO -->

<main>
<div class="container section-padding30 mt-5">

<h2 class="mb-4">Editar Cliente</h2>

<form method="POST" action="/clientes/{{ $cliente->id }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" value="{{ $cliente->nombre }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $cliente->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Teléfono</label>
        <input type="text" name="telefono" value="{{ $cliente->telefono }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Dirección</label>
        <input type="text" name="direccion" value="{{ $cliente->direccion }}" class="form-control">
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="/clientes" class="btn btn-secondary">Volver</a>

</form>

</div>
</main>

<!-- FOOTER SIMPLE -->

<footer class="text-center mt-5">
    <p>© {{ date('Y') }} TransportesPro</p>
</footer>

<script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
