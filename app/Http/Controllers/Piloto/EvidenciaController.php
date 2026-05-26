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
        Viaje::findOrFail($viaje_id)->update(['estado' => 'completado']);

        return back()->with('success', 'Evidencias guardadas correctamente.');
    }
}