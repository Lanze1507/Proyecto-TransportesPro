{{--
    Vista: resources/views/pilotos/subir_evidencias.blade.php
    Ruta:  GET /piloto/viaje/{viaje_id}/evidencias
    Usa el mismo diseño Bootstrap + estilos custom del dashboard del piloto.
--}}
<!doctype html>
<html class="no-js" lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Subir Evidencias | TransportesPro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<style>
body { background: #f4f7fb; }
.dash-wrap { padding: 50px 0 80px; }

/* ── Topbar (igual al dashboard) ── */
.topbar {
    background: #0b1c39;
    padding: 10px 0;
    position: sticky; top: 0; z-index: 999;
    box-shadow: 0 2px 16px rgba(0,0,0,.25);
}
.topbar .brand { font-size:18px; font-weight:800; color:#fff; text-decoration:none; }
.topbar .brand span { color:#ff5e14; }
.topbar .nav-links a {
    color:rgba(255,255,255,.75); font-size:13px; font-weight:600;
    text-decoration:none; margin-left:24px; transition:color .15s;
}
.topbar .nav-links a:hover { color:#ff5e14; }
.role-badge {
    background:rgba(255,94,20,.15); border:1px solid rgba(255,94,20,.3);
    color:#ff5e14; font-size:12px; font-weight:700;
    padding:4px 12px; border-radius:999px; margin-left:12px;
}
.btn-logout {
    background:none; border:1.5px solid rgba(255,255,255,.2);
    color:rgba(255,255,255,.7); font-size:12px; font-weight:600;
    padding:5px 14px; border-radius:8px; cursor:pointer; margin-left:14px;
    transition:all .15s;
}
.btn-logout:hover { border-color:#ff5e14; color:#ff5e14; }

/* ── Panel card ── */
.panel-card {
    background:#fff; border-radius:18px;
    box-shadow:0 6px 28px rgba(0,0,0,.06);
    overflow:hidden; margin-bottom:24px;
}
.panel-head {
    background:#0b1c39; color:#fff;
    padding:15px 22px;
    display:flex; align-items:center; justify-content:space-between;
}
.panel-head h5 { margin:0; font-size:15px; font-weight:700; }
.panel-body { padding:24px; }

/* ── Info del viaje ── */
.viaje-info-card {
    background: linear-gradient(135deg, #0b1c39 0%, #1a3a6b 100%);
    border-radius: 16px;
    padding: 24px 28px;
    color: #fff;
    margin-bottom: 28px;
    box-shadow: 0 8px 32px rgba(11,28,57,.25);
    position: relative;
    overflow: hidden;
}
.viaje-info-card::before {
    content:'📦';
    position:absolute; right:24px; top:50%;
    transform:translateY(-50%);
    font-size:70px; opacity:.1;
}
.viaje-info-card .vi-label {
    font-size:11px; font-weight:700; letter-spacing:2px;
    color:#ff5e14; text-transform:uppercase; margin-bottom:8px;
}
.viaje-info-card h3 { font-size:20px; font-weight:800; margin:0 0 4px; }
.viaje-info-card .ruta {
    display:flex; align-items:center; gap:10px;
    margin:14px 0; font-size:14px; font-weight:600;
}
.viaje-info-card .ruta .arrow { color:#ff5e14; font-size:16px; }
.vi-meta { display:flex; gap:24px; flex-wrap:wrap; margin-top:12px; }
.vi-meta .item { font-size:12px; }
.vi-meta .item span { color:rgba(255,255,255,.5); display:block; font-size:11px; }

/* ── Zona de drop de fotos ── */
.drop-zone {
    border: 2.5px dashed #d1d5db;
    border-radius: 16px;
    padding: 40px 20px;
    text-align: center;
    cursor: pointer;
    transition: all .2s;
    background: #f9fafb;
    position: relative;
}
.drop-zone:hover,
.drop-zone.dragover {
    border-color: #ff5e14;
    background: #fff5f0;
}
.drop-zone .dz-icon { font-size: 48px; margin-bottom: 12px; display:block; }
.drop-zone h6 { font-size:15px; font-weight:700; color:#0b1c39; margin:0 0 4px; }
.drop-zone p  { font-size:13px; color:#9ca3af; margin:0; }
.drop-zone input[type="file"] {
    position:absolute; inset:0; opacity:0; cursor:pointer; width:100%; height:100%;
}

/* ── Preview de fotos ── */
#preview-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 12px;
    margin-top: 20px;
}
.preview-item {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    aspect-ratio: 1;
    background: #f3f4f6;
    box-shadow: 0 2px 10px rgba(0,0,0,.08);
}
.preview-item img {
    width:100%; height:100%; object-fit:cover;
}
.preview-item .remove-btn {
    position: absolute;
    top: 5px; right: 5px;
    background: rgba(0,0,0,.6);
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 24px; height: 24px;
    font-size: 13px;
    cursor: pointer;
    display: flex; align-items:center; justify-content:center;
    transition: background .15s;
}
.preview-item .remove-btn:hover { background: #ef4444; }

/* ── Conteo ── */
.foto-count {
    font-size: 13px;
    font-weight: 700;
    color: #ff5e14;
    margin-top: 10px;
    display: none;
}

/* ── Campo descripción ── */
.form-label-custom {
    font-size: 13px;
    font-weight: 700;
    color: #374151;
    margin-bottom: 6px;
    display: block;
}
.form-control-custom {
    border: 1.5px solid #e5e7eb;
    border-radius: 10px;
    padding: 12px 14px;
    font-size: 14px;
    width: 100%;
    resize: vertical;
    transition: border-color .2s;
    outline: none;
    font-family: inherit;
}
.form-control-custom:focus { border-color: #ff5e14; }

/* ── Botón principal ── */
.btn-submit {
    background: linear-gradient(135deg, #ff5e14, #ff7a18);
    color: #fff;
    border: none;
    border-radius: 12px;
    padding: 14px 32px;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    width: 100%;
    margin-top: 8px;
    transition: opacity .2s, transform .15s;
    display: flex; align-items:center; justify-content:center; gap:8px;
}
.btn-submit:hover:not(:disabled) { opacity:.9; transform:translateY(-1px); }
.btn-submit:disabled { opacity:.55; cursor:not-allowed; transform:none; }

/* ── Btn volver ── */
.btn-back {
    display: inline-flex; align-items:center; gap:6px;
    background: #f3f4f6; color: #374151;
    border: none; border-radius: 10px;
    padding: 9px 18px; font-size:13px; font-weight:600;
    text-decoration: none; margin-bottom: 24px;
    transition: background .15s;
}
.btn-back:hover { background:#e5e7eb; color:#0b1c39; }

/* ── Alert ── */
.alert-ok {
    background:#fff; border:none; border-left:5px solid #10b981;
    border-radius:14px; padding:14px 20px; font-size:14px;
    font-weight:600; color:#065f46;
    box-shadow:0 6px 24px rgba(0,0,0,.06); margin-bottom:24px;
}
.alert-err {
    background:#fff; border:none; border-left:5px solid #ef4444;
    border-radius:14px; padding:14px 20px; font-size:14px;
    font-weight:600; color:#991b1b;
    box-shadow:0 6px 24px rgba(0,0,0,.06); margin-bottom:24px;
}

/* ── Spinner ── */
.spinner {
    width:18px; height:18px;
    border:2.5px solid rgba(255,255,255,.4);
    border-top-color:#fff;
    border-radius:50%;
    animation:spin .7s linear infinite;
    display:none;
}
@keyframes spin { to { transform:rotate(360deg); } }
</style>
</head>
<body>

{{-- ══ TOP BAR ══ --}}
<div class="topbar">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('piloto.dashboard') }}" class="brand">Trans<span>Pro</span></a>
            <div class="nav-links d-none d-lg-flex">
                <a href="{{ route('piloto.dashboard') }}">Dashboard</a>
            </div>
            <div class="d-flex align-items-center">
                <span style="color:rgba(255,255,255,.6);font-size:13px;">
                    👤 {{ auth()->user()->name }}
                </span>
                <span class="role-badge">PILOTO</span>
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button class="btn-logout">Salir</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ══ CONTENIDO ══ --}}
<main>
<div class="container dash-wrap">

    {{-- Alertas --}}
    @if(session('success'))
        <div class="alert-ok">✅ {{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert-err">
            ⚠️
            @foreach($errors->all() as $e)
                {{ $e }}<br>
            @endforeach
        </div>
    @endif

    {{-- Botón volver --}}
    <a href="{{ route('piloto.dashboard') }}" class="btn-back">
        ← Volver al dashboard
    </a>

    {{-- Info del viaje --}}
    <div class="viaje-info-card">
        <p class="vi-label">● Subir evidencias de entrega</p>
        <h3>Viaje #{{ $viaje->id }}</h3>
        <div class="ruta">
            <span>📍 {{ Str::limit($viaje->origen, 35) }}</span>
            <span class="arrow">→</span>
            <span>🏁 {{ Str::limit($viaje->destino, 35) }}</span>
        </div>
        <div class="vi-meta">
            <div class="item">
                <span>Cliente</span>
                {{ $viaje->cliente->nombre ?? '—' }}
            </div>
            <div class="item">
                <span>Camión</span>
                {{ $viaje->camion->placa ?? '—' }}
            </div>
            <div class="item">
                <span>Estado</span>
                {{ ucfirst(str_replace('_', ' ', $viaje->estado)) }}
            </div>
            @if($viaje->codigo_guia)
            <div class="item">
                <span>Código guía</span>
                {{ $viaje->codigo_guia }}
            </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="panel-card">
                <div class="panel-head">
                    <h5>📷 Fotos de evidencia</h5>
                    <span style="font-size:12px;color:rgba(255,255,255,.6);">Mínimo 1 foto · Máx 5 MB por foto</span>
                </div>
                <div class="panel-body">

                    
<form
    id="form-evidencias"
    action="{{ route('piloto.evidencias.store', $viaje->id) }}"
    method="POST"
    enctype="multipart/form-data"
>

                        @csrf

                        {{-- Drop zone --}}
                        <div class="drop-zone" id="drop-zone">
                            <input
                                type="file"
                                name="fotos[]"
                                id="input-fotos"
                                accept="image/*"
                                multiple
                            >
                            <span class="dz-icon">📸</span>
                            <h6>Arrastra las fotos aquí o haz clic para seleccionar</h6>
                            <p>PNG, JPG, JPEG o WEBP · Máximo 5 MB por imagen</p>
                        </div>

                        {{-- Conteo de fotos seleccionadas --}}
                        <p class="foto-count" id="foto-count"></p>

                        {{-- Preview grid --}}
                        <div id="preview-grid"></div>

                        {{-- Descripción --}}
                        <div style="margin-top:24px;">
                            <label class="form-label-custom" for="descripcion">
                                Descripción / observaciones
                                <span style="font-weight:400;color:#9ca3af;">(opcional)</span>
                            </label>
                            <textarea
                                id="descripcion"
                                name="descripcion"
                                class="form-control-custom"
                                rows="3"
                                placeholder="Ej: Entrega realizada en bodega principal, recibió el encargado Juan..."
                            >{{ old('descripcion') }}</textarea>
                        </div>
{{-- Firma digital --}}
<div style="margin-top:24px;">

    <label class="form-label-custom">

        Firma del cliente

    </label>

    <div
        style="
            border:2px dashed #d1d5db;
            border-radius:14px;
            background:#fff;
            overflow:hidden;
        "
    >

        <canvas
            id="signature-pad"
            width="700"
            height="220"
            style="
                width:100%;
                background:#fff;
                cursor:crosshair;
            "
        ></canvas>

    </div>

    <input
        type="hidden"
        name="firma"
        id="firma"
    >

    <div
        style="
            display:flex;
            justify-content:flex-end;
            margin-top:10px;
        "
    >

        <button
            type="button"
            id="clear-signature"
            style="
                border:none;
                background:#fee2e2;
                color:#991b1b;
                padding:8px 16px;
                border-radius:10px;
                font-size:13px;
                font-weight:700;
                cursor:pointer;
            "
        >

            🗑 Limpiar firma

        </button>

    </div>

</div>

                        {{-- Botón enviar --}}
                        <button
                            type="submit"
                            class="btn-submit"
                            id="btn-submit"
                            disabled
                        >
                            <div class="spinner" id="spinner"></div>
                            <span id="btn-text">📤 Subir evidencias y completar viaje</span>
                        </button>

                        <p style="text-align:center;font-size:12px;color:#9ca3af;margin-top:10px;">
                            Al subir las fotos el viaje quedará marcado como <strong>completado</strong>
                        </p>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
</main>

<footer>
    <div style="padding:20px 0;background:#0b1c39;">
        <div class="container">
            <p style="margin:0;text-align:center;color:rgba(255,255,255,.4);font-size:13px;">
                Copyright &copy; {{ date('Y') }} TransportesPro · Panel de Piloto
            </p>
        </div>
    </div>
</footer>

<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
```html
<script>
document.addEventListener('DOMContentLoaded', function () {

    const inputFotos  = document.getElementById('input-fotos');

    const previewGrid = document.getElementById('preview-grid');

    const fotoCount   = document.getElementById('foto-count');

    const btnSubmit   = document.getElementById('btn-submit');

    const spinner     = document.getElementById('spinner');

    const btnText     = document.getElementById('btn-text');

    /*
    |--------------------------------------------------------------------------
    | PREVIEW SIMPLE
    |--------------------------------------------------------------------------
    */

    inputFotos.addEventListener('change', function () {

        previewGrid.innerHTML = '';

        const files = Array.from(this.files);

        /*
        |--------------------------------------------------------------------------
        | VALIDAR
        |--------------------------------------------------------------------------
        */

        let validFiles = [];

        files.forEach(file => {

            if (!file.type.startsWith('image/')) {

                alert('⚠️ Solo imágenes permitidas.');

                return;

            }

            if (file.size > 5 * 1024 * 1024) {

                alert('⚠️ Máximo 5MB por imagen.');

                return;

            }

            validFiles.push(file);

        });

        /*
        |--------------------------------------------------------------------------
        | CONTADOR
        |--------------------------------------------------------------------------
        */

        if(validFiles.length > 0){

            fotoCount.style.display = 'block';

            fotoCount.textContent =
                validFiles.length + ' foto(s) seleccionada(s)';

            btnSubmit.disabled = false;

        }else{

            fotoCount.style.display = 'none';

            btnSubmit.disabled = true;

        }

        /*
        |--------------------------------------------------------------------------
        | PREVIEWS
        |--------------------------------------------------------------------------
        */

        validFiles.forEach((file, index) => {

            const reader = new FileReader();

            reader.onload = function(e){

                const item = document.createElement('div');

                item.className = 'preview-item';

                item.innerHTML = `
                    <img src="${e.target.result}" alt="foto ${index}">
                `;

                previewGrid.appendChild(item);

            };

            reader.readAsDataURL(file);

        });

    });

    /*
    |--------------------------------------------------------------------------
    | SUBMIT NORMAL
    |--------------------------------------------------------------------------
    */

    document.getElementById('form-evidencias')

    .addEventListener('submit', function(){

        /*
        |--------------------------------------------------------------------------
        | VALIDAR
        |--------------------------------------------------------------------------
        */

        if(inputFotos.files.length === 0){

            alert('⚠️ Debes subir al menos una foto.');

            event.preventDefault();

            return;

        }

        /*
        |--------------------------------------------------------------------------
        | SPINNER
        |--------------------------------------------------------------------------
        */

        spinner.style.display = 'block';

        btnText.textContent = 'Subiendo...';

        btnSubmit.disabled = true;

    });

});
</script>
```

<script>

const canvas = document.getElementById('signature-pad');

const ctx = canvas.getContext('2d');

let drawing = false;

function startPosition(e){

    drawing = true;

    draw(e);

}

function endPosition(){

    drawing = false;

    ctx.beginPath();

}

function draw(e){

    if(!drawing) return;

    ctx.lineWidth = 2.5;

    ctx.lineCap = 'round';

    ctx.strokeStyle = '#0b1c39';

    const rect = canvas.getBoundingClientRect();

    const x = (e.clientX || e.touches[0].clientX) - rect.left;

    const y = (e.clientY || e.touches[0].clientY) - rect.top;

    ctx.lineTo(x, y);

    ctx.stroke();

    ctx.beginPath();

    ctx.moveTo(x, y);

}

/*
|--------------------------------------------------------------------------
| MOUSE
|--------------------------------------------------------------------------
*/

canvas.addEventListener('mousedown', startPosition);

canvas.addEventListener('mouseup', endPosition);

canvas.addEventListener('mousemove', draw);

/*
|--------------------------------------------------------------------------
| TOUCH
|--------------------------------------------------------------------------
*/

canvas.addEventListener('touchstart', startPosition);

canvas.addEventListener('touchend', endPosition);

canvas.addEventListener('touchmove', draw);

/*
|--------------------------------------------------------------------------
| LIMPIAR
|--------------------------------------------------------------------------
*/

document.getElementById('clear-signature')

.addEventListener('click', () => {

    ctx.clearRect(

        0,

        0,

        canvas.width,

        canvas.height

    );

});

/*
|--------------------------------------------------------------------------
| GUARDAR FIRMA
|--------------------------------------------------------------------------
*/

document.getElementById('form-evidencias')

.addEventListener('submit', function(){

    const firma = canvas.toDataURL();

    document.getElementById('firma').value = firma;

});

</script>

</body>
</html>