<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<meta http-equiv="x-ua-compatible" content="ie=edge">

<title>Editar Viaje - TransportesPro</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

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
        linear-gradient(rgba(7,15,30,.80), rgba(7,15,30,.85)),
        url('{{ asset("assets/img/gallery/footer_bg.jpg") }}')
        no-repeat center center;

    background-size:cover;

    padding:40px 20px;
}

/* =========================
CARD
========================= */

.card-viaje{

    width:100%;

    max-width:1450px;

    margin:auto;

    border:none;

    border-radius:30px;

    overflow:hidden;

    background:rgba(255,255,255,.97);

    box-shadow:
        0 25px 70px rgba(0,0,0,.30);

    animation:fadeUp .5s ease;
}

/* =========================
HEADER
========================= */

.card-header-custom{

    background:
        linear-gradient(135deg,#07152c,#0b1c39);

    padding:40px;

    position:relative;

    overflow:hidden;
}

.card-header-custom::before{

    content:'';

    position:absolute;

    width:220px;

    height:220px;

    border-radius:50%;

    background:rgba(255,255,255,.05);

    right:-80px;

    top:-80px;
}

.card-header-custom h2{

    margin:0;

    color:#fff;

    font-size:34px;

    font-weight:800;
}

.card-header-custom p{

    margin-top:10px;

    color:rgba(255,255,255,.75);

    font-size:15px;
}

.icon-badge{

    width:72px;

    height:72px;

    border-radius:22px;

    background:rgba(255,255,255,.08);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:34px;

    color:#0b1c22;

    margin-bottom:20px;

    box-shadow:
        0 15px 30px rgba(0,0,0,.15);
}

/* =========================
BODY
========================= */

.card-body-custom{

    padding:45px;
}

/* =========================
TOP ACTIONS
========================= */

.top-actions{

    margin-bottom:35px;
}

.btn-back{

    background:#eef2f7;

    color:#0b1c39;

    border:none;

    padding:13px 22px;

    border-radius:14px;

    font-weight:700;

    transition:.25s ease;
}

.btn-back:hover{

    background:#dbe2ea;

    transform:translateY(-2px);

    color:#0b1c39;
}

/* =========================
SECTION TITLE
========================= */

.section-title{

    display:flex;

    align-items:center;

    gap:14px;

    margin-bottom:28px;
    color:#0b1c39;
    
}

.section-icon{

    width:46px;

    height:46px;

    border-radius:16px;

    background:
        linear-gradient(42deg, #ff6318, #ffba00);

    display:flex;

    align-items:center;

    justify-content:center;

    

    font-size:20px;

    box-shadow:
        0 10px 25px rgba(255,94,20,.22);
}

.section-title h5{

    margin:0;

    font-size:22px;

    font-weight:800;

    color:#0b1c39;
}

/* =========================
INPUT WRAP
========================= */

.input-wrap{

    background:#fff;

    border-radius:22px;

    padding:22px;

    border:1px solid #eef2f7;

    transition:.25s ease;

    height:100%;
}

.input-wrap:hover{

    transform:translateY(-3px);

    box-shadow:
        0 12px 35px rgba(0,0,0,.05);
}

/* =========================
LABELS
========================= */

.form-label{

    font-weight:700;

    color:#0b1c39;

    margin-bottom:10px;

    font-size:14px;
}

/* =========================
INPUTS
========================= */

.form-control{

    border-radius:16px;

    border:1.5px solid #dbe2ea;

    padding:15px 18px;

    height:auto;

    font-size:14px;

    transition:.25s ease;

    background:#f8fafc;
}

.form-control:focus{

    border-color:#ff5e14;

    background:#fff;

    box-shadow:
        0 0 0 4px rgba(255,94,20,.10);
}

/* =========================
SEARCH DROPDOWN
========================= */

.custom-search{

    position:relative;

    width:100%;
}

.search-results{

    position:relative;

    width:100%;

    background:#fff;

    border-radius:18px;

    margin-top:12px;

    max-height:220px;

    overflow-y:auto;

    box-shadow:
        0 10px 25px rgba(0,0,0,.08);

    display:none;

    border:1px solid #eef2f7;
}

.search-item{

    padding:14px 18px;

    cursor:pointer;

    transition:.2s;

    border-bottom:1px solid #f3f4f6;
}

.search-item:last-child{

    border-bottom:none;
}

.search-item:hover{

    background:#ff5e14;

    color:#fff;
}

/* =========================
AUTOCOMPLETE
========================= */

.list-group{

    position:relative;

    width:100%;

    max-height:220px;

    overflow-y:auto;

    border:none;

    border-radius:16px;

    margin-top:12px;

    box-shadow:
        0 10px 25px rgba(0,0,0,.08);

    border:1px solid #eef2f7;

    background:#fff;
}

.list-group-item{

    border:none;

    padding:14px 18px;

    transition:.2s;

    cursor:pointer;
}

.list-group-item:hover{

    background:#ff5e14;

    color:#fff;
}

/* =========================
BUTTONS
========================= */

.btn-pro{

    background:
        linear-gradient(135deg,#ff5e14,#ff7a18);

    border:none;

    color:#fff;

    padding:20px;

    border-radius:18px;

    font-weight:800;

    font-size:17px;

    transition:.25s ease;

    min-height:68px;

    display:flex;

    align-items:center;

    justify-content:center;

    gap:10px;

    letter-spacing:.5px;

    box-shadow:
        0 15px 35px rgba(255,94,20,.25);
}

.btn-pro:hover{

    transform:translateY(-3px);

    box-shadow:
        0 20px 45px rgba(255,94,20,.35);

    color:#fff;
}

/* =========================
ANIMATION
========================= */

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

/* =========================
RESPONSIVE
========================= */

@media(max-width:768px){

    .card-header-custom{

        padding:28px;
    }

    .card-body-custom{

        padding:25px;
    }

    .card-header-custom h2{

        font-size:26px;
    }

}

</style>

</head>

<body>

<div class="card-viaje">

    <!-- HEADER -->
    <div class="card-header-custom">

        <div class="icon-badge">

            📦

        </div>

        <h2>

            Editar Viaje

        </h2>

        <p>

            Actualiza información del viaje, estado y rutas asignadas.

        </p>

    </div>

    <!-- BODY -->
    <div class="card-body-custom">

        <div class="top-actions">

            <a href="/admin/viajes" class="btn btn-back">

                ⬅ Volver al panel

            </a>

        </div>

        <form method="POST" action="/admin/viajes/{{ $viaje->id }}">

            @method('PUT')
            @csrf

            <div class="section-title">

                <div class="section-icon">

                    📝

                </div>

                <h5>

                    Información del viaje

                </h5>

            </div>

            <div class="row">

                <!-- CLIENTE -->
                <div class="col-12 mb-4">

                    <div class="input-wrap">

                        <label class="form-label">

                            Cliente

                        </label>

                        <div class="custom-search">

                            <input
                                type="text"
                                id="buscarCliente"
                                class="form-control"
                                autocomplete="off"
                                value="{{ $viaje->cliente->nombre ?? '' }}"
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
                                value="{{ $viaje->cliente_id }}"
                                required
                            >

                        </div>

                    </div>

                </div>

                <!-- ORIGEN -->
                <div class="col-lg-6 mb-4">

                    <div class="input-wrap">

                        <label class="form-label">

                            Origen

                        </label>

                        <input
                            type="text"
                            name="origen"
                            id="origen"
                            class="form-control"
                            value="{{ $viaje->origen }}"
                            required
                        >

                        <div id="origen-list" class="list-group"></div>

                    </div>

                </div>

                <!-- DESTINO -->
                <div class="col-lg-6 mb-4">

                    <div class="input-wrap">

                        <label class="form-label">

                            Destino

                        </label>

                        <input
                            type="text"
                            name="destino"
                            id="destino"
                            class="form-control"
                            value="{{ $viaje->destino }}"
                            required
                        >

                        <div id="destino-list" class="list-group"></div>

                    </div>

                </div>

<!-- PILOTO -->
<div class="col-lg-6 mb-4">

    <div class="input-wrap">

        <label class="form-label">

            Piloto

        </label>

        <div class="custom-search">

            <input
                type="text"
                id="buscarPiloto"
                class="form-control"
                autocomplete="off"
                value="{{ $viaje->piloto->nombre ?? '' }}"
            >

            <div id="listaPilotos" class="search-results">

                @foreach($pilotos as $p)

                <div
                    class="search-item"
                    data-id="{{ $p->id }}"
                    data-estado="{{ $p->estado }}"
                    data-text="{{ strtolower($p->nombre) }}"
                >

                    @if($p->estado == 'activo')

                        🟢

                    @elseif($p->estado == 'ocupado')

                        🟠

                    @else

                        🔴

                    @endif

                    {{ $p->nombre }}

                    — {{ ucfirst($p->estado) }}

                </div>

                @endforeach

            </div>

            <input
                type="hidden"
                name="piloto_id"
                id="piloto_id"
                value="{{ $viaje->piloto_id }}"
            >

        </div>

    </div>

</div>

<!-- CAMIÓN -->
<div class="col-lg-6 mb-4">

    <div class="input-wrap">

        <label class="form-label">

            Camión

        </label>

        <div class="custom-search">

            <input
                type="text"
                id="buscarCamion"
                class="form-control"
                autocomplete="off"
                value="{{ $viaje->camion->placa ?? '' }}"
            >

            <div id="listaCamiones" class="search-results">

                @foreach($camiones as $c)

                <div
                    class="search-item"
                    data-id="{{ $c->id }}"
                    data-estado="{{ $c->estado }}"
                    data-text="{{ strtolower($c->placa . ' ' . $c->modelo) }}"
                >

                    @if($c->estado == 'disponible')

                        🟢

                    @elseif($c->estado == 'ocupado')

                        🟠

                    @else

                        🔴

                    @endif

                    🚛 {{ $c->placa }}

                    — {{ ucfirst($c->estado) }}

                </div>

                @endforeach

            </div>

            <input
                type="hidden"
                name="camion_id"
                id="camion_id"
                value="{{ $viaje->camion_id }}"
            >

        </div>

    </div>

</div>

                <!-- ESTADO -->
                <div class="col-lg-6 mb-4">

                    <div class="input-wrap">

                        <label class="form-label">

                            Estado

                        </label>

                        <select name="estado" class="form-control">

                            <option
                                value="pendiente"
                                {{ $viaje->estado == 'pendiente' ? 'selected' : '' }}
                            >

                                Pendiente

                            </option>

                            <option
                                value="en_ruta"
                                {{ $viaje->estado == 'en_ruta' ? 'selected' : '' }}
                            >

                                En ruta

                            </option>

                            <option
                                value="completado"
                                {{ $viaje->estado == 'completado' ? 'selected' : '' }}
                            >

                                Completado

                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <!-- COORDS -->
            <input type="hidden" name="lat_origen" id="lat_origen">
            <input type="hidden" name="lng_origen" id="lng_origen">

            <input type="hidden" name="lat_destino" id="lat_destino">
            <input type="hidden" name="lng_destino" id="lng_destino">

            <!-- BUTTON -->
            <button class="btn btn-pro w-100 mt-4">

                💾 Guardar Cambios

            </button>

        </form>

    </div>

</div>

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

</script>

</body>

</html>