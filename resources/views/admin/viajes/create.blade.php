<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Nuevo Viaje - TransportesPro</title>

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

body{
    margin:0;
    min-height:100vh;

    background:
        linear-gradient(rgba(7,15,30,.75), rgba(7,15,30,.78)),
        url('{{ asset("assets/img/gallery/footer_bg.jpg") }}')
        no-repeat center center;

    background-size:cover;

    display:flex;
    align-items:center;
    justify-content:center;

    padding:40px 20px;
}

/* CARD */

.card-viaje{
    width:100%;
    max-width:1400px;

    border:none;
    border-radius:22px;

    overflow:hidden;

    background:rgba(255,255,255,.96);

    box-shadow:
        0 25px 60px rgba(0,0,0,.28);

    animation:fadeUp .5s ease;
}

/* HEADER */

.card-header-custom{
    background:
        linear-gradient(135deg,#07152c,#0b1c39);

    padding:28px 35px;

    color:white;

    position:relative;
}

.card-header-custom::before{
    content:'';

    position:absolute;

    width:180px;
    height:180px;

    background:rgba(255,255,255,.05);

    border-radius:50%;

    right:-60px;
    top:-60px;
}

.card-header-custom h2{
    margin:0;
    font-size:30px;
    font-weight:800;
    color:white;
}

.card-header-custom p{
    margin:6px 0 0;
    opacity:.8;
    font-size:14px;
    color:white;
}

/* BODY */

.card-body-custom{
    padding:35px;
}

/* LABELS */

.form-label{
    font-weight:700;
    color:#0b1c39;
    margin-bottom:8px;
}

/* INPUTS */

.form-control{
    border-radius:14px;
    border:1.5px solid #dbe2ea;

    padding:14px 16px;

    height:auto;

    font-size:15px;

    transition:.25s ease;
}

.form-control:focus{
    border-color:#ff5e14;
    box-shadow:0 0 0 4px rgba(255,94,20,.10);
}

/* SEARCH DROPDOWN */

.custom-search{
    position:relative;
}

.search-results{

    position:absolute;

    width:100%;

    background:white;

    border-radius:14px;

    margin-top:6px;

    max-height:240px;

    overflow-y:auto;

    box-shadow:0 12px 30px rgba(0,0,0,.12);

    z-index:9999;

    display:none;
}

.search-item{

    padding:14px 18px;

    cursor:pointer;

    transition:.2s;
}

.search-item:hover{

    background:#ff5e14;
    color:white;
}

/* AUTOCOMPLETE */

.list-group{
    position:absolute;
    z-index:9999;

    width:100%;

    max-height:220px;
    overflow-y:auto;

    border:none;

    border-radius:14px;

    margin-top:5px;

    box-shadow:0 12px 30px rgba(0,0,0,.12);
}

.list-group-item{
    border:none;
    padding:12px 14px;
    transition:.2s;
    cursor:pointer;
}

.list-group-item:hover{
    background:#ff5e14;
    color:#fff;
}

/* BOTONES */

.btn-pro{
    background:linear-gradient(135deg,#ff5e14,#ff7a18);
    border:none;

    color:white;

    padding:20px;

    border-radius:16px;

    font-weight:800;
    font-size:18px;

    letter-spacing:.7px;

    transition:.25s ease;

    min-height:68px;
}

.btn-pro:hover{
    transform:translateY(-3px);
    box-shadow:0 15px 32px rgba(255,94,20,.35);
    color:white;
}

.btn-back{
    background:#eef2f7;
    color:#0b1c39;

    border:none;

    padding:12px 20px;

    border-radius:12px;

    font-weight:600;

    transition:.2s ease;
}

.btn-back:hover{
    background:#dbe2ea;
    color:#0b1c39;
}

/* TOP ACTIONS */

.top-actions{
    margin-bottom:30px;
}

/* ICON CARD */

.icon-badge{
    width:62px;
    height:62px;

    background:rgba(255,255,255,.08);

    border-radius:18px;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:28px;

    margin-bottom:18px;
}

/* ANIMACIÓN */

@keyframes fadeUp{
    from{
        opacity:0;
        transform:translateY(25px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

/* RESPONSIVE */

@media(max-width:768px){

    .card-header-custom{
        padding:24px;
    }

    .card-body-custom{
        padding:24px;
    }

    .card-header-custom h2{
        font-size:24px;
    }

}

</style>
</head>

<body>

<div class="card-viaje">

    {{-- HEADER --}}
    <div class="card-header-custom">

        <div class="icon-badge">
            🚛
        </div>

        <h2>Crear Nuevo Viaje</h2>

        <p>
            Registra un nuevo envío y asigna rutas, piloto y estado inicial.
        </p>

    </div>

    {{-- BODY --}}
    <div class="card-body-custom">

        <div class="top-actions">

            <a href="/admin/viajes" class="btn btn-back">
                ⬅ Volver al panel
            </a>

        </div>

        <form method="POST" action="/admin/viajes">

            @csrf

            <div class="row">

                {{-- CLIENTE --}}
                <div class="col-12 mb-4">

                    <label class="form-label">
                        Cliente
                    </label>

                    <div class="custom-search">

                        <input
                            type="text"
                            id="buscarCliente"
                            class="form-control"
                            placeholder="🔍 Buscar cliente..."
                            autocomplete="off"
                        >

                        <div id="listaClientes" class="search-results">

                            @foreach($clientes as $c)

                                <div
                                    class="search-item"
                                    data-id="{{ $c->id }}"
                                    data-text="{{ strtolower($c->nombre) }}"
                                >
                                    {{ $c->nombre }}
                                </div>

                            @endforeach

                        </div>

                        <input
                            type="hidden"
                            name="cliente_id"
                            id="cliente_id"
                            required
                        >

                    </div>

                </div>

                {{-- PILOTO --}}
                <div class="col-12 mb-4">

                    <label class="form-label">
                        Piloto
                    </label>

                    <div class="custom-search">

                        <input
                            type="text"
                            id="buscarPiloto"
                            class="form-control"
                            placeholder="🔍 Buscar piloto..."
                            autocomplete="off"
                        >

                        <div id="listaPilotos" class="search-results">

                            @foreach($pilotos as $p)

                                <div
                                    class="search-item"
                                    data-id="{{ $p->id }}"
                                    data-text="{{ strtolower($p->nombre) }}"
                                >
                                    {{ $p->nombre }}
                                </div>

                            @endforeach

                        </div>

                        <input
                            type="hidden"
                            name="piloto_id"
                            id="piloto_id"
                        >

                    </div>

                </div>

                    {{-- CAMIÓN --}}
<div class="col-12 mb-4">

    <label class="form-label">
        Camión
    </label>

    <div class="custom-search">

        <input
            type="text"
            id="buscarCamion"
            class="form-control"
            placeholder="🔍 Buscar camión..."
            autocomplete="off"
        >

        <div id="listaCamiones" class="search-results">

            @foreach($camiones as $c)

                <div
                    class="search-item"
                    data-id="{{ $c->id }}"
                    data-text="{{ strtolower($c->placa . ' ' . $c->modelo . ' ' . $c->capacidad) }}"
                >

                    {{ $c->placa }}
                    -
                    {{ $c->modelo }}
                    -
                    {{ $c->capacidad }}

                </div>

            @endforeach

        </div>

        <input
            type="hidden"
            name="camion_id"
            id="camion_id"
        >

    </div>

</div>

                {{-- ORIGEN --}}
                <div class="col-lg-6 mb-4 position-relative">

                    <label class="form-label">
                        Origen
                    </label>

                    <input
                        type="text"
                        name="origen"
                        id="origen"
                        class="form-control"
                        placeholder="Ej: Ciudad de Guatemala"
                        required
                    >

                    <div id="origen-list" class="list-group"></div>

                </div>

                {{-- DESTINO --}}
                <div class="col-lg-6 mb-4 position-relative">

                    <label class="form-label">
                        Destino
                    </label>

                    <input
                        type="text"
                        name="destino"
                        id="destino"
                        class="form-control"
                        placeholder="Ej: Puerto Barrios"
                        required
                    >

                    <div id="destino-list" class="list-group"></div>

                </div>

                {{-- ESTADO --}}
                <div class="col-lg-6 mb-4">

                    <label class="form-label">
                        Estado
                    </label>

                    <select name="estado" class="form-control">

                        <option value="pendiente">
                            Pendiente
                        </option>

                        <option value="en_ruta">
                            En ruta
                        </option>

                        <option value="completado">
                            Completado
                        </option>

                    </select>

                </div>

            </div>

            {{-- COORDENADAS --}}
            <input type="hidden" name="lat_origen" id="lat_origen">
            <input type="hidden" name="lng_origen" id="lng_origen">

            <input type="hidden" name="lat_destino" id="lat_destino">
            <input type="hidden" name="lng_destino" id="lng_destino">

            {{-- BOTÓN --}}
            <button class="btn btn-pro w-100 mt-4">

                Guardar Viaje

            </button>

        </form>

    </div>

</div>

<script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<script>

let timeout = null;

async function buscarLugar(query){

    if(query.length < 3) return [];

    let res = await fetch(`/geocode?q=${encodeURIComponent(query)}`);

    let text = await res.text();

    if(!text) return [];

    try{
        return JSON.parse(text);
    }catch{
        return [];
    }

}

function setupAutocomplete(inputId, listId, latId, lngId){

    const input = document.getElementById(inputId);
    const list  = document.getElementById(listId);

    input.addEventListener('input', () => {

        clearTimeout(timeout);

        timeout = setTimeout(async () => {

            let resultados = await buscarLugar(input.value);

            list.innerHTML = '';

            resultados.slice(0,5).forEach(lugar => {

                let item = document.createElement('div');

                item.className =
                    'list-group-item list-group-item-action';

                item.textContent = lugar.display_name;

                item.addEventListener('click', function(){

                    input.value = lugar.display_name;

                    document.getElementById(latId).value = lugar.lat;
                    document.getElementById(lngId).value = lugar.lon;

                    list.innerHTML = '';

                });

                list.appendChild(item);

            });

        }, 500);

    });

}

window.onload = function(){

    setupAutocomplete(
        'origen',
        'origen-list',
        'lat_origen',
        'lng_origen'
    );

    setupAutocomplete(
        'destino',
        'destino-list',
        'lat_destino',
        'lng_destino'
    );

};

// SEARCH DROPDOWN
function setupSearch(inputId, listId, hiddenId){

    const input  = document.getElementById(inputId);
    const list   = document.getElementById(listId);
    const hidden = document.getElementById(hiddenId);

    const items  = list.querySelectorAll('.search-item');

    input.addEventListener('focus', () => {

        list.style.display = 'block';

    });

    input.addEventListener('input', () => {

        let q = input.value.toLowerCase();

        items.forEach(item => {

            let text = item.dataset.text;

            item.style.display =
                text.includes(q)
                    ? 'block'
                    : 'none';

        });

    });

    items.forEach(item => {

        item.addEventListener('click', () => {

            input.value = item.innerText;

            hidden.value = item.dataset.id;

            list.style.display = 'none';

        });

    });

    document.addEventListener('click', (e) => {

        if(!list.contains(e.target) && e.target !== input){

            list.style.display = 'none';

        }

    });

}

// INICIAR
setupSearch(
    'buscarCliente',
    'listaClientes',
    'cliente_id'
);

setupSearch(
    'buscarPiloto',
    'listaPilotos',
    'piloto_id'
);

setupSearch(
    'buscarCamion',
    'listaCamiones',
    'camion_id'
);

// CAMIONES
document.getElementById('buscarCamion')
.addEventListener('input', function(){

    let filtro = this.value.toLowerCase();

    let select = document.getElementById('camionSelect');

    let opciones = select.querySelectorAll('option');

    opciones.forEach(op => {

        let texto = op.textContent.toLowerCase();

        op.hidden = !texto.includes(filtro);

    });

});

// EVITAR ENTER
document.getElementById('buscarCamion')
.addEventListener('keydown', function(e){

    if(e.key === 'Enter'){
        e.preventDefault();
    }

});

</script>

</body>
</html>