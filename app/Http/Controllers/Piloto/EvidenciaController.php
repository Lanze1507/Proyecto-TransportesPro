<?php

namespace App\Http\Controllers\Piloto;

use App\Http\Controllers\Controller;
use App\Models\Entrega;
use App\Models\Evidencia;
use App\Models\Viaje;
use Illuminate\Http\Request;

class EvidenciaController extends Controller
{
    // Subir fotos de evidencia al completar un viaje
    public function create($viaje_id)
    {
        $viaje = \App\Models\Viaje::with(['cliente', 'camion'])->findOrFail($viaje_id);

        // Solo el piloto asignado puede subir evidencias
        $piloto = \App\Models\Piloto::where('user_id', auth()->id())->firstOrFail();

        abort_if($viaje->piloto_id !== $piloto->id, 403);

        return view('pilotos.subir_evidencias', compact('viaje'));
    }
    public function store(Request $request, $viaje_id)
    {
        $request->validate([
            'fotos'         => 'required|array|min:1',
            'fotos.*'       => 'image|max:5120', // máx 5MB por foto
            'descripcion'   => 'nullable|string',
        ]);

        // Buscar o crear la entrega asociada al viaje
        $entrega = Entrega::firstOrCreate(
            ['viaje_id' => $viaje_id],
            ['estado'   => 'entregado', 'fecha_entrega' => now()]
        );

        // Guardar cada foto
        foreach ($request->file('fotos') as $foto) {
            $ruta = $foto->store('evidencias', 'public');

            Evidencia::create([
                'entrega_id'  => $entrega->id,
                'foto_url'    => $ruta,
                'descripcion' => $request->descripcion,
            ]);
        }

        // Marcar el viaje como completado
        /*
|--------------------------------------------------------------------------
| COMPLETAR VIAJE
|--------------------------------------------------------------------------
*/

$viaje = Viaje::findOrFail($viaje_id);

$viaje->update([

    'estado' => 'completado'

]);

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

        return back()->with('success', 'Evidencias guardadas correctamente.');
    }
}