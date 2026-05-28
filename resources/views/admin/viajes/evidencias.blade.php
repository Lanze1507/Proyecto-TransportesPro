































































































































































































































































































































































































































































<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Evidencias del Viaje #{{ $viaje->id }} - TransportesPro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <style>
        body{ background:#f4f7fb; }
        .detail-wrap{ padding:40px 0 60px; }

        /* ── Botón volver ── */
        .btn-back{
            display:inline-flex; align-items:center; gap:8px;
            background:#0b1c39; color:#fff; padding:10px 18px;
            border-radius:12px; text-decoration:none; font-weight:700;
            transition:.2s; font-size:14px;
        }
        .btn-back:hover{ background:#13284d; color:#fff; text-decoration:none; }

        /* ── Cards (ref: show.blade.php) ── */
        .info-card{ background:#fff; border-radius:14px; box-shadow:0 4px 20px rgba(0,0,0,.08); overflow:hidden; margin-bottom:24px; }
        .card-head{ padding:14px 22px; font-size:15px; font-weight:700; display:flex; align-items:center; gap:8px; border-bottom:1px solid #f3f4f6; }
        .card-head.dark{ background:#0f0f0f; color:#fff; }
        .card-head.orange{ background:linear-gradient(135deg,#ff5e14,#ff7a18); color:#fff; }
        .card-head.blue{ background:linear-gradient(135deg,#3b82f6,#1d4ed8); color:#fff; }
        .card-body-inner{ padding:20px 22px; }

        /* ── Filas de información ── */
        .info-row{ display:flex; justify-content:space-between; align-items:flex-start; padding:10px 0; border-bottom:1px solid #f9fafb; font-size:14px; }
        .info-row:last-child{ border-bottom:none; }
        .info-row .lbl{ color:#6b7280; font-weight:500; min-width:160px; }
        .info-row .val{ font-weight:600; color:#111827; text-align:right; }

        /* ── Estado badge (set extendido) ── */
        .badge-estado{ padding:6px 16px; border-radius:999px; font-size:13px; font-weight:700; }
        .estado-pendiente{ background:#fef3c7; color:#92400e; }
        .estado-aprobado{ background:#dbeafe; color:#1e40af; }
        .estado-en_ruta{ background:#ede9fe; color:#5b21b6; }
        .estado-entregado{ background:#d1fae5; color:#065f46; }
        .estado-completado{ background:#d1fae5; color:#065f46; }
        .estado-rechazado{ background:#fee2e2; color:#991b1b; }
        .estado-cancelado{ background:#f3f4f6; color:#374151; }

        /* ── Galería de fotos ── */
        .gallery{ display:grid; grid-template-columns:repeat(auto-fill,minmax(240px,1fr)); gap:18px; }
        .photo-card{ background:#fff; border-radius:14px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,.08); transition:.25s ease; }
        .photo-card:hover{ transform:translateY(-4px); }
        .photo-card img{ width:100%; height:220px; object-fit:cover; display:block; }
        .photo-body{ padding:14px 16px; }
        .photo-body p{ margin:0; color:#374151; font-size:13px; }

        /* ── Firma ── */
        .firma-img{ width:100%; max-width:520px; border:2px dashed #d1d5db; border-radius:14px; background:#fff; padding:8px; }

        /* ── Encabezado de página ── */
        .page-title{ font-weight:800; margin:4px 0 0; }
        .breadcrumb-mini{ font-size:13px; color:#9ca3af; margin:0; }
        .breadcrumb-mini a{ color:#ff5e14; text-decoration:none; }
        .breadcrumb-mini a:hover{ text-decoration:underline; }
    </style>
</head>
<body>

<div class="container detail-wrap">

    <div class="d-flex align-items-center justify-content-between mb-3">
        <div>
            <p class="breadcrumb-mini">
                <a href="/admin/viajes">Panel Admin</a> › Viaje #{{ $viaje->id }}
            </p>
            <h2 class="page-title">
                Evidencias del Viaje
                <span class="badge-estado estado-{{ $viaje->estado }}" style="vertical-align:middle;">
                    {{ ucfirst(str_replace('_',' ',$viaje->estado)) }}
                </span>
            </h2>
        </div>
        <a href="/admin/viajes" class="btn-back">⬅ Volver</a>
    </div>

    <!-- Información del viaje -->
    <div class="info-card">
        <div class="card-head dark">📋 Información del viaje</div>
        <div class="card-body-inner">
            <div class="info-row">
                <span class="lbl">Cliente</span>
                <span class="val">{{ $viaje->cliente->nombre ?? '—' }}</span>
            </div>
            <div class="info-row">
                <span class="lbl">Piloto</span>
                <span class="val">{{ $viaje->piloto->nombre ?? '—' }}</span>
            </div>
            <div class="info-row">
                <span class="lbl">Camión</span>
                <span class="val">{{ $viaje->camion->placa ?? '—' }}</span>
            </div>
            <div class="info-row">
                <span class="lbl">Estado</span>
                <span class="val">
                    <span class="badge-estado estado-{{ $viaje->estado }}">{{ ucfirst(str_replace('_',' ',$viaje->estado)) }}</span>
                </span>
            </div>
            <div class="info-row">
                <span class="lbl">Origen</span>
                <span class="val">{{ $viaje->origen }}</span>
            </div>
            <div class="info-row">
                <span class="lbl">Destino</span>
                <span class="val">{{ $viaje->destino }}</span>
            </div>
            <div class="info-row">
                <span class="lbl">Fecha de entrega</span>
                <span class="val">{{ $viaje->fecha_entrega ? \Carbon\Carbon::parse($viaje->fecha_entrega)->format('d/m/Y H:i') : '—' }}</span>
            </div>
        </div>
    </div>

    <!-- Firma del cliente -->
    <div class="info-card">
        <div class="card-head blue">✍ Firma del cliente</div>
        <div class="card-body-inner">
            @if($viaje->firma_cliente)
                <img src="{{ asset('storage/' . $viaje->firma_cliente) }}" alt="Firma del cliente" class="firma-img">
            @else
                <p style="color:#9ca3af; margin:0;">No hay firma registrada.</p>
            @endif
        </div>
    </div>

    <!-- Evidencias fotográficas -->
    <div class="info-card">
        <div class="card-head orange">📷 Evidencias fotográficas</div>
        <div class="card-body-inner">
            @if(isset($viaje->entrega) && $viaje->entrega && $viaje->entrega->evidencias && $viaje->entrega->evidencias->count())
                <div class="gallery">
                    @foreach($viaje->entrega->evidencias as $evidencia)
                        <div class="photo-card">
                            <img src="{{ asset('storage/' . $evidencia->foto_url) }}" alt="Evidencia de viaje #{{ $viaje->id }}">
                            <div class="photo-body">
                                <p>{{ $evidencia->descripcion ?: 'Sin descripción.' }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p style="color:#9ca3af; margin:0;">No hay evidencias registradas.</p>
            @endif
        </div>
    </div>

</div>

</body>
</html>