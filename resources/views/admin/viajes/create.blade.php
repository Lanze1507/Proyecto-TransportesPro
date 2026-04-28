<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Nuevo Viaje</title>

<!-- CSS COMPLETO (igual que index) -->
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
body {
    margin: 0;
    min-height: 100vh;

    /* 🔥 FONDO CON IMAGEN */
    background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
        url('{{ asset("assets/img/gallery/footer_bg.jpg") }}') no-repeat center center;
    background-size: cover;

    display: flex;
    align-items: center;
    justify-content: center;
}

/* 🔥 CARD GRANDE */
.card {
    width: 100%;
    max-width: 1100px; /* MÁS GRANDE */
    border-radius: 16px;
    border: none;
    backdrop-filter: blur(12px);
    background: rgba(255,255,255,0.95);
    box-shadow: 0 20px 50px rgba(0,0,0,0.25);
}

/* HEADER */
.card-header {
    background: #000;
    color: white;
    font-size: 22px;
    font-weight: 600;
    padding: 18px;
    border-radius: 16px 16px 0 0;
}

/* BODY */
.card-body {
    padding: 30px;
}

/* INPUTS */
.form-control {
    border-radius: 10px;
    padding: 12px;
    font-size: 15px;
}

/* AUTOCOMPLETE */
.list-group {
    position: absolute;
    z-index: 999;
    width: 100%;
    max-height: 200px;
    overflow-y: auto;
    border-radius: 10px;
}

.list-group-item:hover {
    background: #000;
    color: white;
}

/* BOTÓN VOLVER */
.btn-secondary {
    border-radius: 10px;
    padding: 10px 18px;
}

/* 🔥 BOTÓN GUARDAR PRO */
.btn-success {
    background: linear-gradient(135deg, #ff5e14, #ff7a18);
    border: none;
    border-radius: 12px;
    padding: 16px;
    font-size: 17px;
    font-weight: bold;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

/* ANIMACIÓN */
.btn-success:hover {
    transform: scale(1.03);
    box-shadow: 0 10px 25px rgba(255,94,20,0.4);
}

/* ESPACIADO */
.top-actions {
    margin-bottom: 20px;
}
</style>
</head>

<body>

<div class="card">

    <div class="card-header">
        Crear Nuevo Viaje
    </div>

    <div class="card-body">

        <div class="top-actions">
            <a href="/admin/viajes" class="btn btn-secondary">
                ⬅ Volver
            </a>
        </div>

        <form method="POST" action="/admin/viajes">
        @csrf

        <div class="form-group mb-3">
            <label>Cliente</label>
            <select name="cliente_id" class="form-control">
                @foreach($clientes as $c)
                    <option value="{{ $c->id }}">{{ $c->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Origen</label>
            <input name="origen" id="origen" class="form-control" placeholder="Ej: New York, USA">
            <div id="origen-list" class="list-group"></div>
        </div>

        <div class="form-group mb-3">
            <label>Destino</label>
            <input name="destino" id="destino" class="form-control" placeholder="Ej: Puerto Barrios Guatemala">
            <div id="destino-list" class="list-group"></div>
        </div>

        <div class="form-group mb-3">
            <label>Estado</label>
            <select name="estado" class="form-control">
                <option value="pendiente">Pendiente</option>
                <option value="en_ruta">En ruta</option>
                <option value="completado">Completado</option>
            </select>
        </div>

        <!-- coordenadas -->
        <input type="hidden" name="lat_origen" id="lat_origen">
        <input type="hidden" name="lng_origen" id="lng_origen">
        <input type="hidden" name="lat_destino" id="lat_destino">
        <input type="hidden" name="lng_destino" id="lng_destino">

        <button class="btn btn-success w-100">
            Guardar Viaje
        </button>

        </form>

    </div>
</div>

<!-- JS TEMPLATE COMPLETO -->
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

<!-- AUTOCOMPLETE -->
<script>
let timeout = null;

async function buscarLugar(query) {
    if (query.length < 3) return [];

    let res = await fetch(`/geocode?q=${encodeURIComponent(query)}`);
    let text = await res.text();

    if (!text) return [];

    try {
        return JSON.parse(text);
    } catch {
        return [];
    }
}

function setupAutocomplete(inputId, listId, latId, lngId) {

    const input = document.getElementById(inputId);
    const list = document.getElementById(listId);

    input.addEventListener('input', () => {

        clearTimeout(timeout);

        timeout = setTimeout(async () => {

            let resultados = await buscarLugar(input.value);

            list.innerHTML = '';

            resultados.slice(0,5).forEach(lugar => {

                let item = document.createElement('div');
                item.className = 'list-group-item list-group-item-action';
                item.textContent = lugar.display_name;

                item.addEventListener('click', function () {

                    input.value = lugar.display_name;

                    document.getElementById(latId).value = lugar.lat;
                    document.getElementById(lngId).value = lugar.lon;

                    list.innerHTML = '';
                });

                list.appendChild(item);
            });

        }, 500);
    });

    document.addEventListener('click', (e) => {
        if (!input.contains(e.target)) {
            list.innerHTML = '';
        }
    });
}

window.onload = function () {
    setupAutocomplete('origen', 'origen-list', 'lat_origen', 'lng_origen');
    setupAutocomplete('destino', 'destino-list', 'lat_destino', 'lng_destino');
};
</script>

</body>
</html>