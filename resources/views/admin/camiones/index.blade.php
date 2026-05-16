<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Camiones - TransportesPro</title>

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<style>

/* 🔹 NAV LINKS */
.nav-link-custom {
    color: #ffffff;
    font-weight: 600;
    text-decoration: none;
    transition: 0.3s ease;
    position: relative;
}

.nav-link-custom::after {
    content: '';
    position: absolute;
    width: 0%;
    height: 2px;
    bottom: -4px;
    left: 0;
    background: #ff5e14;
    transition: 0.3s;
}

.nav-link-custom:hover {
    color: #ff5e14;
}

.nav-link-custom:hover::after {
    width: 100%;
}

/* 🔹 BUSCADOR */
.search-box {
    width: 250px;
    transition: 0.3s ease;
}

.search-box input {
    width: 100%;
    padding: 10px 15px;
    border-radius: 25px;
    border: 1px solid #ccc;
    outline: none;
    transition: 0.3s ease;
}

.search-box:hover {
    width: 320px;
}

.search-box input:focus {
    width: 320px;
    border-color: #ff5e14;
    box-shadow: 0 0 10px rgba(255,94,20,0.2);
}

</style>

</head>

<body>

<!-- HEADER -->
<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center p-3">

                    <!-- LOGO -->
                    <a href="/">
                        <img src="{{ asset('assets/img/logo/logoNombre.png') }}" height="40">
                    </a>

                    <!-- NAV -->
                    <div class="d-flex align-items-center" style="gap:20px;">
                        <a href="/" class="nav-link-custom">Inicio</a>
                        <a href="/clientes" class="nav-link-custom">Clientes</a>
                        <a href="/admin/pilotos" class="nav-link-custom">Pilotos</a>
                        <a href="/admin/viajes" class="nav-link-custom">Panel Admin</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</header>

<main>

<!-- HERO -->
<div class="slider-area">
    <div class="single-slider d-flex align-items-center" style="min-height:200px;background:#0b1c39;">
        <div class="container text-center">
            <h1 class="text-white">Gestión de Camiones</h1>
            <p class="text-white-50">Administra la flota de transporte</p>
        </div>
    </div>
</div>

<section class="section-padding30">
    <div class="container">

        <!-- BOTÓN + BUSCADOR -->
        <div class="mb-4">

            <!-- BOTÓN -->
            <div class="mb-3">
                <a href="/admin/camiones/create" class="btn header-btn">
                    + Nuevo Camión
                </a>
            </div>

            <!-- BUSCADOR -->
            <div class="search-box">
                <input type="text" id="buscador" placeholder="Buscar por placa, modelo o capacidad...">
            </div>

        </div>

        <!-- TABLA -->
        <div class="card p-4" style="border-radius:12px;">

            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Placa</th>
                        <th>Modelo</th>
                        <th>Capacidad</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody id="tablaCamiones">
                @forelse($camiones as $c)
                    <tr>
                        <td>{{ $c->placa }}</td>
                        <td>{{ $c->modelo }}</td>
                        <td>{{ $c->capacidad }} kg</td>
                        <td>
                            <a href="/admin/camiones/{{ $c->id }}/edit" class="btn btn-sm btn-warning">
                                Editar
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            No hay camiones registrados
                        </td>
                    </tr>
                @endforelse
                </tbody>

            </table>

        </div>

    </div>
</section>

</main>

<footer class="text-center p-3">
    <small>© {{ date('Y') }} TransportesPro</small>
</footer>

<!-- 🔥 BUSCADOR EN TIEMPO REAL -->
<script>
document.getElementById('buscador').addEventListener('keyup', function() {

    let filtro = this.value.toLowerCase();
    let filas = document.querySelectorAll('#tablaCamiones tr');

    filas.forEach(function(fila) {

        let texto = fila.innerText.toLowerCase();

        if(texto.includes(filtro)) {
            fila.style.display = '';
        } else {
            fila.style.display = 'none';
        }

    });

});
</script>

</body>
</html>