<!doctype html>

<html lang="es">

<head>

<meta charset="utf-8">

<style>

body{

    font-family: DejaVu Sans;

    color:#111827;

    margin:0;

    padding:24px;

    background:white;
}

.card{

    border:1px solid #e5e7eb;

    border-radius:18px;

    overflow:hidden;
}

.header{

    padding:28px;

    border-bottom:1px solid #e5e7eb;

    position:relative;
}

.brand{

    font-size:44px;

    font-weight:900;

    letter-spacing:-2px;
}

.brand span{

    color:#ff5e14;
}

.subtitle{

    color:#6b7280;

    margin-top:4px;

    font-size:13px;
}

.ribbon{

    position:absolute;

    top:28px;

    right:0;

    background:#ff5e14;

    color:white;

    padding:14px 34px;

    font-weight:700;

    font-size:15px;

    border-radius:12px 0 0 12px;
}

.top{

    padding:28px;

    border-bottom:1px solid #e5e7eb;
}

.guia-label{

    color:#6b7280;

    font-size:14px;

    font-weight:700;
}

.guia{

    font-size:54px;

    font-weight:900;

    margin-top:8px;

    letter-spacing:1px;
}

.barcode{

    margin-top:22px;
}

.status-box{

    border:1px solid #e5e7eb;

    border-radius:16px;

    padding:20px;
}

.status-title{

    color:#6b7280;

    font-size:14px;

    font-weight:700;
}

.status{

    color:#ff5e14;

    font-size:36px;

    font-weight:900;

    margin-top:10px;
}

.section{

    border-bottom:1px solid #e5e7eb;
}

.grid{

    width:100%;

    border-collapse:collapse;
}

.grid td{

    width:50%;

    vertical-align:top;

    padding:24px;

    border-right:1px solid #e5e7eb;
}

.grid td:last-child{

    border-right:none;
}

.title{

    color:#ff5e14;

    font-size:18px;

    font-weight:800;

    margin-bottom:16px;
}

.text{

    font-size:15px;

    line-height:1.8;
}

.mini-grid{

    width:100%;

    border-collapse:collapse;
}

.mini-grid td{

    width:25%;

    padding:22px;

    border-right:1px solid #e5e7eb;
}

.mini-grid td:last-child{

    border-right:none;
}

.label{

    color:#ff5e14;

    font-size:15px;

    font-weight:800;

    margin-bottom:12px;
}

.qr{

    text-align:center;
}

.firma{

    width:260px;

    margin-top:14px;

    border:1px solid #e5e7eb;

    border-radius:10px;

    padding:10px;
}

.footer{

    background:#fff7f3;

    padding:20px 26px;

    font-size:13px;

    color:#374151;
}

.note{

    color:#6b7280;

    line-height:1.7;
}

</style>

</head>

<body>

<div class="card">

    <div class="header">

        <div
    style="
        display:flex;
        align-items:center;
        gap:18px;
    "
>

    <img

        src="{{ public_path('assets/img/logo/loder.jpg') }}"

        style="
            width:70px;
        "

    >

    <div>

        <div class="brand">

            TRANSPORTES<span>PRO</span>

        </div>

        <div class="subtitle">

            Plataforma logística inteligente

        </div>

    </div>

</div>


        <div class="ribbon">

            GUÍA DE TRANSPORTE

        </div>

    </div>

    <table width="100%" class="top">

        <tr>

            <td width="70%">

                <div class="guia-label">

                    CÓDIGO DE GUÍA

                </div>

                <div class="guia">

                    {{ $viaje->codigo_guia }}

                </div>

                <div class="barcode">

                    {!! DNS1D::getBarcodeHTML(
                        $viaje->codigo_guia,
                        'C128',
                        2,
                        90
                    ) !!}
                </div>

            </td>

            <td width="30%">

                <div class="status-box">

                    <div class="status-title">

                        ESTADO ACTUAL

                    </div>

                    <div class="status">

                        {{ strtoupper($viaje->estado) }}

                    </div>

                    <br>

                    <div class="status-title">

                        FECHA

                    </div>

                    <div style="margin-top:8px;">

                        {{ now()->format('d/m/Y h:i A') }}

                    </div>

                </div>

            </td>

        </tr>

    </table>

    <div class="section">

        <table class="grid">

            <tr>

                <td>

                    <div class="title">

                        REMITENTE

                    </div>

                    <div class="text">

                        {{ $viaje->cliente->nombre ?? 'N/A' }}

                        <br><br>

                        {{ $viaje->origen }}

                    </div>

                </td>

                <td>

                    <div class="title">

                        DESTINATARIO

                    </div>

                    <div class="text">

                        {{ $viaje->cliente->nombre ?? 'N/A' }}

                        <br><br>

                        {{ $viaje->destino }}

                    </div>

                </td>

            </tr>

        </table>

    </div>

    <div class="section">

        <table class="mini-grid">

            <tr>

                <td>

                    <div class="label">

                        ORIGEN

                    </div>

                    {{ $viaje->origen }}

                </td>

                <td>

                    <div class="label">

                        DESTINO

                    </div>

                    {{ $viaje->destino }}

                </td>

                <td>

                    <div class="label">

                        PILOTO

                    </div>

                    {{ $viaje->piloto->nombre ?? 'N/A' }}

                </td>

                <td>

                    <div class="label">

                        CAMIÓN

                    </div>

                    {{ $viaje->camion->placa ?? 'N/A' }}

                </td>

            </tr>

        </table>

    </div>

    <div class="section">

        <table class="grid">

            <tr>

                <td>

                    <div class="title">

                        HISTORIAL

                    </div>

                    @foreach($viaje->historial as $item)

                        <div style="margin-bottom:12px;">

                            <strong>

                                {{ $item->descripcion }}

                            </strong>

                            <br>

                            <small>

                                {{ $item->created_at }}

                            </small>

                        </div>

                    @endforeach

                </td>

               <td class="qr">

    <div class="title">

        SEGUIMIENTO QR

    </div>

    @php

    $qrPath = public_path(

        'temp_qr_' .
        $viaje->id .
        '.svg'

    );

    file_put_contents(

        $qrPath,

        QrCode::format('svg')
            ->size(180)
            ->generate(

                url(
                    '/seguimiento/' .
                    $viaje->codigo_guia
                )

            )

    );

@endphp

<img

    src="{{ $qrPath }}"

    width="180"

>

    <br><br>

    <small>

        Escanea para rastrear el envío

    </small>

</td>

            </tr>

        </table>

    </div>

    @if($viaje->firma_cliente)

    <div class="section">

        <table class="grid">

            <tr>

                <td>

                    <div class="title">

                        FIRMA DE RECEPCIÓN

                    </div>

                    <img

                        class="firma"

                        src="{{ public_path('storage/'.$viaje->firma_cliente) }}"

                    >

                </td>

                <td>

                    <div class="title">

                        NOTA IMPORTANTE

                    </div>

                    <div class="note">

                        Al firmar esta guía, el receptor confirma
                        haber recibido el envío en buen estado.

                        <br><br>

                        TransPro no se responsabiliza por daños
                        posteriores a la entrega.

                    </div>

                </td>

            </tr>

        </table>

    </div>

    @endif

    <div class="footer">

        TransPro — Plataforma logística inteligente

    </div>

</div>

</body>

</html>