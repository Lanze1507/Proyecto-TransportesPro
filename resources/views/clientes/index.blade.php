<!doctype html>

<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <title>Clientes - TransportesPro</title>


<!-- CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<style>

body{

    background:#f4f7fb;
}

/* =========================
HEADER TITLE
========================= */

.page-title{

    font-size:42px;

    font-weight:800;

    color:#0b1c39;

    margin-bottom:8px;
}

.page-subtitle{

    color:#6b7280;

    font-size:15px;

    margin-bottom:40px;
}

/* =========================
SEARCH
========================= */

.buscador-pro{

    border-radius:16px;

    border:none;

    background:#fff;

    padding:16px 20px;

    transition:.3s ease;

    width:100%;

    box-shadow:
        0 10px 30px rgba(0,0,0,.05);

    font-size:14px;
}

.buscador-pro:focus{

    outline:none;

    box-shadow:
        0 0 0 4px rgba(255,94,20,.12);

    transform:translateY(-2px);
}

/* =========================
BUTTONS
========================= */

.action-btn{

    border:none;

    border-radius:14px;

    padding:13px 18px;

    font-size:14px;

    font-weight:700;

    transition:.25s ease;

    text-decoration:none !important;

    display:inline-flex;

    align-items:center;

    gap:8px;
}

.action-btn:hover{

    transform:translateY(-3px);

    color:#fff;
}

.btn-orange{

    background:#ff5e14;

    color:#fff;

    box-shadow:
        0 10px 25px rgba(255,94,20,.25);
}

.btn-dark-pro{

    background:#0b1c39;

    color:#fff;
}

.btn-green{

    background:#10b981;

    color:#fff;
}

/* =========================
TABLE CARD
========================= */

.table-card{

    background:#fff;

    border-radius:24px;

    overflow:hidden;

    box-shadow:
        0 20px 50px rgba(0,0,0,.06);

    margin-top:25px;
}

.table-header{

    padding:28px 30px;

    border-bottom:1px solid #eef2f7;

    display:flex;

    justify-content:space-between;

    align-items:center;

    flex-wrap:wrap;

    gap:20px;
}

.table-header h4{

    margin:0;

    font-size:24px;

    font-weight:800;

    color:#0b1c39;
}

/* =========================
TABLE
========================= */

.table{

    margin-bottom:0;
}

.table thead th{

    background:#f8fafc;

    border:none;

    padding:18px;

    font-size:12px;

    font-weight:800;

    text-transform:uppercase;

    color:#6b7280;

    letter-spacing:.6px;
}

.table tbody td{

    padding:22px 18px;

    vertical-align:middle;

    border-top:1px solid #f1f5f9;

    font-size:14px;

    color:#374151;
}

.table tbody tr{

    transition:.25s ease;
}

.table tbody tr:hover{

    background:#fafcff;
}

/* =========================
CLIENT BADGE
========================= */

.client-avatar{

    width:42px;

    height:42px;

    border-radius:50%;

    background:#ffefe8;

    color:#ff5e14;

    display:flex;

    align-items:center;

    justify-content:center;

    font-weight:800;

    font-size:16px;
}

/* =========================
TABLE BUTTONS
========================= */

.btn-table{

    border:none;

    border-radius:12px;

    padding:10px 14px;

    font-size:12px;

    font-weight:700;

    transition:.25s ease;
}

.btn-table:hover{

    transform:translateY(-2px);
}

.btn-edit{

    background:#fff4df;

    color:#c27c00;
}

.btn-delete{

    background:#fee2e2;

    color:#dc2626;
}

</style>

</head>

<body>

<!-- HEADER (igual al tuyo pero con rutas Laravel) -->

<header>
    <div class="header-area">
        <div class="main-header">
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row align-items-center">

                        <!-- LOGO -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="/">
                                    <img src="{{ asset('assets/img/logo/logoNombre.png') }}" alt="">
                                </a>
                            </div>
                        </div>

                        <!-- MENU CORRECTO -->
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">

                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="/">Inicio</a></li>
                                            <li><a href="/clientes">Clientes</a></li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>

                        <!-- MOBILE -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
</header>

<!-- CONTENIDO CAMBIADO A CLIENTES -->

<main>
<div class="container section-padding30">

<div class="mb-5">

    <h1 class="page-title">

        Clientes

    </h1>

    <p class="page-subtitle">

        Gestión completa de clientes registrados en TransportesPro.

    </p>

</div>
<div class="table-card">

    <div class="table-header">

        <div>

            <h4>

                👥 Lista de clientes

            </h4>

        </div>

        <div
            style="
                display:flex;
                gap:12px;
                flex-wrap:wrap;
                align-items:center;
            "
        >

            <div style="min-width:320px;">

                <input
                    type="text"
                    id="buscadorClientes"
                    class="buscador-pro"
                    placeholder="🔍 Buscar cliente..."
                >

            </div>

            <a
                href="/clientes/create"
                class="action-btn btn-green"
            >

                ➕ Nuevo Cliente

            </a>

            <a
                href="/admin/viajes"
                class="action-btn btn-dark-pro"
            >

                ⬅ Volver

            </a>

        </div>

    </div>

<table class="table" id="tablaClientes">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>

    <div
        style="
            display:flex;
            align-items:center;
            gap:14px;
        "
    >

        <div class="client-avatar">

            {{ strtoupper(substr($cliente->nombre,0,1)) }}

        </div>

        <div>

            <div
                style="
                    font-weight:700;
                    color:#0b1c39;
                "
            >

                {{ $cliente->nombre }}

            </div>

            <small style="color:#9ca3af;">

                Cliente registrado

            </small>

        </div>

    </div>

</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->telefono }}</td>
            <td>
                <a href="/clientes/{{ $cliente->id }}/edit" class="btn btn-warning btn-sm">Editar</a>

                <form action="/clientes/{{ $cliente->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div
    style="
        margin-top:30px;
        display:flex;
        justify-content:center;
    "
>

    {{ $clientes->links() }}

</div>
</div>
</main>



<script src="{{ asset('assets/js/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>

document
.getElementById('buscadorClientes')

.addEventListener('input', function(){

    let filtro =
        this.value.toLowerCase();

    let filas =
        document.querySelectorAll(
            '#tablaClientes tbody tr'
        );

    filas.forEach(fila => {

        let texto =
            fila.innerText.toLowerCase();

        fila.style.display =
            texto.includes(filtro)
                ? ''
                : 'none';

    });

});

</script>

</body>
</html>
