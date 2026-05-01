<!doctype html>

<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <title>Clientes - TransportesPro</title>


<!-- CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<style>
    .animated-button {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .animated-button:hover {
        transform: translateX(-3px) scale(1.02);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.16);
    }
</style>

</head>

<body>

<!-- HEADER (igual al tuyo pero con rutas Laravel) -->

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
                                    <img src="{{ asset('assets/img/logo/logoNombre.png') }}" alt="">
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
</header>

<!-- CONTENIDO CAMBIADO A CLIENTES -->

<main>
<div class="container section-padding30">

<h2 class="mb-4">Listado de Clientes</h2>

<div style="margin-bottom: 20px;">
    <a href="/admin/viajes" class="btn btn-danger animated-button">
        ⬅ Volver al panel de viajes
    </a>
</div>

<a href="/clientes/create" class="btn btn-success mb-3 animated-button">Nuevo Cliente</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>
                <a href="/clientes/{{ $cliente->id }}/edit" class="btn btn-warning btn-sm">Editar</a>

                <form action="/clientes/{{ $cliente->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
</main>



<script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>
