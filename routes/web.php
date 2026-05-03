<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Viaje;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ViajeController;
use App\Http\Controllers\PilotoController;

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
| GEOCODE (SIN CORS)
|--------------------------------------------------------------------------
*/
Route::get('/geocode', function (Request $request) {

    if (!$request->q) {
        return response()->json([]);
    }

    $query = urlencode($request->q);
    $url = "https://nominatim.openstreetmap.org/search?format=json&q={$query}";

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

    return response($response)->header('Content-Type', 'application/json');
});

/*
|--------------------------------------------------------------------------
| CLIENTES (SOLO ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','admin'])->group(function () {

    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes');
    Route::get('/clientes/create', [ClienteController::class, 'create']);
    Route::post('/clientes', [ClienteController::class, 'store']);
    Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit']);
    Route::put('/clientes/{id}', [ClienteController::class, 'update']);
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| ADMIN (VIAJES + PILOTOS)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {

    // VIAJES
    Route::resource('viajes', ViajeController::class);

    // PILOTOS (NUEVO)
    Route::resource('pilotos', PilotoController::class);

});

/*
|--------------------------------------------------------------------------
| PERFIL (BREEZE)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::post('/viaje/completar/{id}', function ($id) {
        $viaje = Viaje::findOrFail($id);
        $viaje->estado = 'completado';
        $viaje->save();

        return response()->json(['success' => true]);
    });

});