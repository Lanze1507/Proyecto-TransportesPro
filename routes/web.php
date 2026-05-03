<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Viaje;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ViajeController as AdminViajeController;
use App\Http\Controllers\Operador\ViajeController as OperadorViajeController;
// Aliases claros — elimina el import duplicado de ViajeController

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
| GEOCODE
|--------------------------------------------------------------------------
*/
//  Rate limiting — máximo 30 peticiones por minuto por IP
//  Validación de input antes de usar en cURL
Route::middleware('throttle:30,1')->get('/geocode', function (Request $request) {

    $request->validate([
        'q' => ['required', 'string', 'min:2', 'max:200'],
    ]);

    $query = urlencode($request->q);
    $url   = "https://nominatim.openstreetmap.org/search?format=json&q={$query}";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 8);           //  Evita que cuelgue indefinidamente
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'User-Agent: TransProApp',
    ]);

    //  SSL solo desactivado en entornos locales
    if (app()->environment('local')) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    }

    $response = curl_exec($ch);

    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        return response()->json(['error' => 'Geocode no disponible'], 503);
        //  No exponer el error interno de cURL al cliente
    }

    curl_close($ch);

    return response($response)->header('Content-Type', 'application/json');
});

/*
|--------------------------------------------------------------------------
| CLIENTES (SOLO ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    // 'verified' obliga a emails confirmados en todas las rutas protegidas

    Route::get('/clientes',            [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create',     [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes',           [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{id}/edit',  [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{id}',       [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{id}',    [ClienteController::class, 'destroy'])->name('clientes.destroy');
    // Nombres de rutas añadidos — necesarios para redirecciones y policy gates
});

/*
|--------------------------------------------------------------------------
| ADMIN — VIAJES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('viajes', AdminViajeController::class);
        //  Usa el alias limpio definido en los imports
    });

/*
|--------------------------------------------------------------------------
| PERFIL (BREEZE)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| OPERADOR — Gestión de viajes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified', 'operador'])
    ->prefix('operador')
    ->name('operador.viajes.')
    ->group(function () {
        Route::get('viajes',                 [OperadorViajeController::class, 'index'])   ->name('index');
        Route::get('viajes/{id}',            [OperadorViajeController::class, 'show'])    ->name('show');
        Route::patch('viajes/{id}/aprobar',  [OperadorViajeController::class, 'aprobar']) ->name('aprobar');
        Route::patch('viajes/{id}/rechazar', [OperadorViajeController::class, 'rechazar'])->name('rechazar');
        Route::post('viajes/{id}/asignar',   [OperadorViajeController::class, 'asignar']) ->name('asignar');
        Route::patch('viajes/{id}/cancelar', [OperadorViajeController::class, 'cancelar'])->name('cancelar');
    });

/*
|--------------------------------------------------------------------------
| AUTH (LOGIN / REGISTER)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| DASHBOARD — CLIENTE
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //  Mueve la lógica a un controlador y verifica ownership
    Route::post('/viaje/completar/{viaje}', function (Viaje $viaje) {
        // Verifica que el viaje pertenece al usuario autenticado
        abort_if($viaje->cliente_id !== auth()->id(), 403);

        $viaje->update(['estado' => 'completado']);

        return response()->json(['success' => true]);
    })->name('viaje.completar');
    // Idealmente mover a ViajeController@completar con una Policy de Laravel
});