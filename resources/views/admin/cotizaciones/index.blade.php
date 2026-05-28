<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">

    <title>
        Cotizaciones
    </title>

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/bootstrap.min.css') }}"
    >

</head>

<body
    style="
        background:#f4f7fb;
        padding:40px;
    "
>

<div class="container">

    <div
        class="card shadow border-0"
        style="
            border-radius:20px;
        "
    >

        <div
            class="card-header"
            style="
                background:#0b1c39;
                color:white;
                border-radius:20px 20px 0 0;
                padding:20px;
            "
        >

            <h3 class="mb-0">
                📦 Cotizaciones recibidas
            </h3>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>Cliente</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Tipo carga</th>
                            <th>Peso</th>
                            <th>Precio estimado</th>
                            <th>Fecha</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($cotizaciones as $c)

                        <tr>

                            <td>
                                {{ $c->nombre }}
                            </td>

                            <td>
                                {{ $c->email }}
                            </td>

                            <td>
                                {{ $c->telefono }}
                            </td>

                            <td>
                                {{ $c->tipo_carga }}
                            </td>

                            <td>
                                {{ $c->peso }} kg
                            </td>

                            <td>

                                <strong
                                    style="
                                        color:#10b981;
                                    "
                                >
                                    Q{{ number_format($c->precio_estimado, 2) }}
                                </strong>

                            </td>

                            <td>
                                {{ $c->created_at->format('d/m/Y H:i') }}
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="7"
                                class="text-center text-muted"
                            >

                                No hay cotizaciones

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>