<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Nuevo Camión - TransportesPro</title>

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>

<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <a href="/"><img src="{{ asset('assets/img/logo/logoNombre.png') }}" height="40"></a>
                    <a href="/admin/camiones" class="btn header-btn">← Volver</a>
                </div>
            </div>
        </div>
    </div>
</header>

<main>

<div class="slider-area">
    <div class="single-slider d-flex align-items-center" style="min-height:200px;background:#0b1c39;">
        <div class="container text-center">
            <h1 class="text-white">Nuevo Camión</h1>
            <p class="text-white-50">Registrar vehículo en la flota</p>
        </div>
    </div>
</div>

<section class="section-padding30">
    <div class="container">

        <div class="card p-4" style="border-radius:12px; max-width:600px; margin:auto;">

            <form method="POST" action="{{ route('camiones.store') }}">
            @csrf

                <div class="mb-3">
                    <label>Placa</label>
                    <input type="text" name="placa" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Modelo</label>
                    <input type="text" name="modelo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Capacidad (kg)</label>
                    <input type="number" name="capacidad" class="form-control" required>
                </div>

                <button class="btn header-btn w-100">Guardar Camión</button>

            </form>

        </div>

    </div>
</section>

</main>

<footer class="text-center p-3">
    <small>© {{ date('Y') }} TransportesPro</small>
</footer>

</body>
</html>