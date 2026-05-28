<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\Viaje;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\Admin\ViajeController;
use App\Http\Controllers\PilotoController;
use App\Http\Controllers\Admin\CamionController;
use App\Http\Controllers\Operador\ViajeController as OperadorViajeController;
use App\Http\Controllers\Piloto\DashboardController as PilotoDashboardController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\Operador\DashboardController as OperadorDashboardController;
use App\Http\Controllers\CotizacionController;


/*|--------------------------------------------------------------------------
| RUTAS DE NOTIFICACIONES
|--------------------------------------------------------------------------*/
Route::delete(

    '/admin/notificaciones/{id}',

    [App\Http\Controllers\Admin\ViajeController::class, 'eliminarNotificacion']

)->name('admin.notificaciones.delete');


/*|--------------------------------------------------------------------------
| RUTAS DE REPORTES
|--------------------------------------------------------------------------*/

Route::get(

    '/reporte/viaje/{id}',

    [ReporteController::class, 'viaje']

);


/*
|--------------------------------------------------------------------------
| RUTA PRINCIPAL (LANDING)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('welcome');

});

/*
|--------------------------------------------------------------------------
| TRACKING PÚBLICO
|--------------------------------------------------------------------------
*/

Route::get('/seguimiento/{codigo}', function ($codigo) {

    $viaje = Viaje::with([

        'cliente',
        'piloto',
        'camion',
        'historial'

    ])
    ->where(
        'codigo_guia',
        $codigo
    )
    ->firstOrFail();

    return view(
        'seguimiento',
        compact('viaje')
    );

});

/*--------------------------------------------------------------------------
| COTIZACION (PUBLICO)
|--------------------------------------------------------------------------*/
Route::post(

    '/cotizacion',

    [CotizacionController::class, 'store']

)->name('cotizacion.store');

/*
|--------------------------------------------------------------------------
| GEOCODE (SIN CORS)
|--------------------------------------------------------------------------
*/

Route::get('/geocode', function (Request $request) {

    if (!$request->q) {

        return response()->json([]);

    }

    $query = urlencode($request->q);

    $url =
        "https://nominatim.openstreetmap.org/search?format=json&q={$query}";

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, [

        "User-Agent: TransProApp"

    ]);

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);

    if ($response === false) {

        return response()->json([

            'error' => curl_error($ch)

        ], 500);

    }

    curl_close($ch);

    return response($response)
        ->header('Content-Type', 'application/json');

});

/*
|--------------------------------------------------------------------------
| CLIENTES (SOLO ADMIN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])->group(function () {

    Route::get(
        '/clientes',
        [ClienteController::class, 'index']
    )->name('clientes');

    Route::get(
        '/clientes/create',
        [ClienteController::class, 'create']
    );

    Route::post(
        '/clientes',
        [ClienteController::class, 'store']
    );

    Route::get(
        '/clientes/{id}/edit',
        [ClienteController::class, 'edit']
    );

    Route::put(
        '/clientes/{id}',
        [ClienteController::class, 'update']
    );

    Route::delete(
        '/clientes/{id}',
        [ClienteController::class, 'destroy']
    );

});

/*
|--------------------------------------------------------------------------
| ADMIN (VIAJES + PILOTOS + CAMIONES)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','admin'])
    ->prefix('admin')
    ->group(function () {

    /*
    |--------------------------------------------------------------------------
    | VIAJES
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'viajes',
        ViajeController::class
    );

    Route::get(
        '/viajes/{id}/evidencias',
        [App\Http\Controllers\Admin\ViajeController::class, 'evidencias']
    )->name('admin.viajes.evidencias');

    /*
    |--------------------------------------------------------------------------
    | PILOTOS
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'pilotos',
        PilotoController::class
    );

    /*
    |--------------------------------------------------------------------------
    | CAMIONES
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'camiones',
        CamionController::class
    );

});

Route::get(
    '/admin/cotizaciones',
    [App\Http\Controllers\CotizacionController::class, 'index']
)->name('cotizaciones.index');

/*
|--------------------------------------------------------------------------
| PERFIL (BREEZE)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| OPERADOR
|--------------------------------------------------------------------------
*/


Route::middleware(['auth', 'operador'])
    ->prefix('operador')
    ->group(function () {
        Route::get(

    '/dashboard',

    [OperadorDashboardController::class, 'index']

)->name('operador.dashboard');

    Route::get('/viajes',

        [OperadorViajeController::class, 'index']

    )->name('operador.viajes.index');

    Route::get(

        '/viajes/{id}',

        [OperadorViajeController::class, 'show']

    )->name('operador.viajes.show');

    Route::patch(

        '/viajes/{id}/aprobar',

        [OperadorViajeController::class, 'aprobar']

    )->name('operador.viajes.aprobar');

    Route::patch(

        '/viajes/{id}/rechazar',

        [OperadorViajeController::class, 'rechazar']

    )->name('operador.viajes.rechazar');

    Route::post(

        '/viajes/{id}/asignar',

        [OperadorViajeController::class, 'asignar']

    )->name('operador.viajes.asignar');

    Route::patch(

        '/viajes/{id}/cancelar',

        [OperadorViajeController::class, 'cancelar']

    )->name('operador.viajes.cancelar');

});

/*
|--------------------------------------------------------------------------
| PILOTO — Dashboard propio
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'piloto'])->prefix('piloto')->group(function () {

    Route::get('/dashboard', [PilotoDashboardController::class, 'index'])
        ->name('piloto.dashboard');

    Route::get(
    '/viaje/{viaje_id}/evidencias',
    [App\Http\Controllers\Piloto\EvidenciaController::class, 'create']
)->name('piloto.evidencias.create');

    Route::post(
    '/viaje/{viaje_id}/evidencias',
    [App\Http\Controllers\Piloto\EvidenciaController::class, 'store']
)->name('piloto.evidencias.store');

});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| DASHBOARD CLIENTE
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    );

    /*
    |--------------------------------------------------------------------------
    | COMPLETAR VIAJE
    |--------------------------------------------------------------------------
    */

    Route::post('/viaje/completar/{id}', function ($id) {

    $viaje = Viaje::findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | COMPLETAR VIAJE
    |--------------------------------------------------------------------------
    */

    $viaje->estado = 'completado';

    $viaje->save();

    /*
    |--------------------------------------------------------------------------
    | LIBERAR PILOTO
    |--------------------------------------------------------------------------
    */

    if($viaje->piloto){

        $viaje->piloto->update([

            'estado' => 'activo'

        ]);

    }

    /*
    |--------------------------------------------------------------------------
    | LIBERAR CAMIÓN
    |--------------------------------------------------------------------------
    */

    if($viaje->camion){

        $viaje->camion->update([

            'estado' => 'disponible'

        ]);

    }

    return response()->json([

        'success' => true

    ]);

});

    /*
    |--------------------------------------------------------------------------
    | FIRMA DIGITAL
    |--------------------------------------------------------------------------
    */

    Route::post('/viaje/firma/{id}', function (

        Request $request,

        $id

    ){

        $viaje = Viaje::findOrFail($id);

        $image = $request->firma;

        $image = str_replace(

            'data:image/png;base64,',

            '',

            $image

        );

        $image = str_replace(

            ' ',

            '+',

            $image

        );

        $nombre =

            'firmas/firma_' .

            time() .

            '.png';

        \Storage::disk('public')->put(

            $nombre,

            base64_decode($image)

        );

        $viaje->update([

            'firma_cliente' => $nombre,

            'fecha_entrega' => now(),

            'recibido' => true

        ]);

        return response()->json([

            'success' => true

        ]);

    });

});