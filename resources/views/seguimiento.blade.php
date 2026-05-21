<!doctype html>

<html lang="es">

<head>

<meta charset="utf-8">

<title>

Seguimiento {{ $viaje->codigo_guia }}

</title>

<link rel="stylesheet"
href="{{ asset('assets/css/bootstrap.min.css') }}">

<link rel="stylesheet"
href="{{ asset('assets/css/style.css') }}">

<style>

body{

    background:#f8fafc;
}

.tracking-container{

    min-height:100vh;

    padding:60px 0;
}

.tracking-card{

    background:white;

    border-radius:28px;

    padding:45px;

    box-shadow:
        0 10px 35px rgba(0,0,0,.06);
}

.guia-label{

    color:#64748b;

    font-size:14px;

    margin-bottom:8px;
}

.guia-code{

    font-size:38px;

    font-weight:800;

    color:#0f172a;
}

.estado{

    display:inline-block;

    margin-top:20px;

    padding:10px 18px;

    border-radius:999px;

    background:#dbeafe;

    color:#1d4ed8;

    font-weight:700;

    font-size:13px;
}

.info-box{

    background:#f8fafc;

    border-radius:20px;

    padding:24px;

    margin-top:35px;
}

.timeline{

    position:relative;

    margin-top:50px;

    padding-left:45px;
}

.timeline::before{

    content:'';

    position:absolute;

    left:11px;

    top:0;

    width:4px;

    height:100%;

    background:#e2e8f0;

    border-radius:999px;
}

.timeline-item{

    position:relative;

    margin-bottom:35px;
}

.timeline-dot{

    position:absolute;

    left:-40px;

    top:2px;

    width:24px;

    height:24px;

    border-radius:50%;

    background:#ff5e14;

    border:4px solid white;

    box-shadow:
        0 0 0 3px rgba(255,94,20,.18);
}

.timeline-content{

    background:#f8fafc;

    border-radius:18px;

    padding:18px 22px;
}

.timeline-content h6{

    margin:0;

    font-weight:700;

    color:#0f172a;
}

.timeline-content small{

    color:#64748b;
}

.firma{

    margin-top:35px;
}

.firma img{

    width:240px;

    background:white;

    border-radius:16px;

    border:1px solid #e2e8f0;

    padding:10px;
}

.tracking-btn{

    display:inline-flex;

    align-items:center;

    gap:10px;

    padding:14px 24px;

    border-radius:16px;

    text-decoration:none;

    font-weight:700;

    font-size:15px;

    background:white;

    color:#0f172a;

    border:1px solid #e2e8f0;

    transition:.25s ease;

    box-shadow:
        0 6px 18px rgba(0,0,0,.05);
}

.tracking-btn:hover{

    transform:translateY(-3px);

    box-shadow:
        0 14px 28px rgba(0,0,0,.08);

    text-decoration:none;

    color:#0f172a;
}

.home-btn{

    background:#ff5e14;

    color:white;

    border:none;
}

.home-btn:hover{

    color:white;
}

</style>

</head>

<body>
    

<div class="container tracking-container">

    <div class="tracking-card">
        
        <div
    class="mb-4"
    style="
        display:flex;
        gap:14px;
        flex-wrap:wrap;
    "
>

    @auth

<a

    href="/dashboard"

    class="tracking-btn"

>

    <span>

        ←

    </span>

    Volver al panel

</a>

<a

    href="/reporte/viaje/{{ $viaje->id }}"

    class="tracking-btn"

>

    📄 Descargar Guia

</a>

@endauth

    <a

        href="/"

        class="tracking-btn home-btn"

    >

        <span>

            🏠

        </span>

        Volver al inicio

    </a>

</div>


        <div class="guia-label">

            Código de seguimiento

        </div>

        <div class="guia-code">

            {{ $viaje->codigo_guia }}

        </div>

        <span class="estado">

            {{ strtoupper($viaje->estado) }}

        </span>

        <div class="info-box">

            <div class="row">

                <div class="col-md-4">

                    <strong>
                        Origen
                    </strong>

                    <p>
                        {{ $viaje->origen }}
                    </p>

                </div>

                <div class="col-md-4">

                    <strong>
                        Destino
                    </strong>

                    <p>
                        {{ $viaje->destino }}
                    </p>

                </div>

                <div class="col-md-4">

                    <strong>
                        Cliente
                    </strong>

                    <p>
                        {{ $viaje->cliente->nombre ?? 'N/A' }}
                    </p>

                </div>

            </div>

        </div>

        <div class="timeline">

            @foreach($viaje->historial as $item)

                <div class="timeline-item">

                    <div class="timeline-dot"></div>

                    <div class="timeline-content">

                        <h6>

                            {{ $item->descripcion }}

                        </h6>

                        <small>

                            {{ $item->created_at }}

                        </small>

                    </div>

                </div>

            @endforeach

        </div>

        @if($viaje->firma_cliente)

            <div class="firma">

                <h5 class="mb-3">

                    Firma de recepción

                </h5>

                <img
                    src="{{ asset('storage/'.$viaje->firma_cliente) }}"
                >

            </div>

        @endif

    </div>

</div>

</body>

</html>