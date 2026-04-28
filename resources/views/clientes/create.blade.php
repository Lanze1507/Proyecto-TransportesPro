<!doctype html>

<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nuevo Cliente</title>
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

<div class="container mt-5">

<h2>Nuevo Cliente</h2>

<form method="POST" action="/clientes">
    @csrf

    <div class="mb-3">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre">
    </div>

    <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Email">
    </div>

    <div class="mb-3">
        <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
    </div>

    <div class="mb-3">
        <input type="text" name="direccion" class="form-control" placeholder="Dirección">
    </div>

    <button class="btn btn-success">Guardar</button>

    <a href="/clientes" class="btn btn-secondary">Volver</a>


</form>

</div>

</body>
</html>
