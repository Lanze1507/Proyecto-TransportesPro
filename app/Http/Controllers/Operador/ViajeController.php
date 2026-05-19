<?php

namespace App\Http\Controllers\Operador;

use App\Http\Controllers\Controller;

use App\Models\Viaje;
use App\Models\Piloto;
use App\Models\Camion;
use App\Models\ViajeHistorial;

use Illuminate\Http\Request;

class ViajeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTADO
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $viajes = Viaje::with([

            'cliente',
            'piloto',
            'camion',
            'historial'

        ])->get();

        return view(
            'operador.viajes.index',
            compact('viajes')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DETALLE
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $viaje = Viaje::with([

            'cliente',
            'piloto',
            'camion',
            'historial'

        ])->findOrFail($id);

        $pilotos = Piloto::where(
            'estado',
            'activo'
        )->get();

        $camiones = Camion::where(
            'estado',
            'disponible'
        )->get();

        return view(
            'operador.viajes.show',
            compact(
                'viaje',
                'pilotos',
                'camiones'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | APROBAR
    |--------------------------------------------------------------------------
    */

    public function aprobar($id)
    {
        $viaje = Viaje::findOrFail($id);

        $viaje->update([

            'estado' => 'aprobado'

        ]);

        /*
        |--------------------------------------------------------------------------
        | HISTORIAL
        |--------------------------------------------------------------------------
        */

        ViajeHistorial::create([

            'viaje_id' => $viaje->id,

            'estado' => 'aprobado',

            'descripcion' =>
                '✅ Operador aprobó el viaje'

        ]);

        return back()->with(
            'success',
            'Viaje aprobado correctamente.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RECHAZAR
    |--------------------------------------------------------------------------
    */

    public function rechazar($id)
    {
        $viaje = Viaje::findOrFail($id);

        $viaje->update([

            'estado' => 'rechazado'

        ]);

        /*
        |--------------------------------------------------------------------------
        | HISTORIAL
        |--------------------------------------------------------------------------
        */

        ViajeHistorial::create([

            'viaje_id' => $viaje->id,

            'estado' => 'rechazado',

            'descripcion' =>
                '❌ Operador rechazó el viaje'

        ]);

        return back()->with(
            'success',
            'Viaje rechazado.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | ASIGNAR PILOTO + CAMIÓN
    |--------------------------------------------------------------------------
    */

    public function asignar(Request $request, $id)
    {
        $request->validate([

            'piloto_id' =>
                'required|exists:pilotos,id',

            'camion_id' =>
                'required|exists:camiones,id',

        ]);

        $viaje = Viaje::findOrFail($id);

        $viaje->update([

            'piloto_id' => $request->piloto_id,

            'camion_id' => $request->camion_id,

            'estado' => 'en_ruta',

        ]);

        /*
        |--------------------------------------------------------------------------
        | HISTORIAL
        |--------------------------------------------------------------------------
        */

        ViajeHistorial::create([

            'viaje_id' => $viaje->id,

            'estado' => 'en_ruta',

            'descripcion' =>
                '🚚 Viaje puesto en tránsito'

        ]);

        ViajeHistorial::create([

            'viaje_id' => $viaje->id,

            'estado' => 'en_ruta',

            'descripcion' =>
                '👨‍✈️ Piloto asignado: '
                . $viaje->piloto->nombre

        ]);

        ViajeHistorial::create([

            'viaje_id' => $viaje->id,

            'estado' => 'en_ruta',

            'descripcion' =>
                '🚛 Camión asignado: '
                . $viaje->camion->placa

        ]);

        return back()->with(
            'success',
            'Piloto y camión asignados.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CANCELAR
    |--------------------------------------------------------------------------
    */

    public function cancelar($id)
    {
        $viaje = Viaje::findOrFail($id);

        $viaje->update([

            'estado' => 'cancelado'

        ]);

        /*
        |--------------------------------------------------------------------------
        | HISTORIAL
        |--------------------------------------------------------------------------
        */

        ViajeHistorial::create([

            'viaje_id' => $viaje->id,

            'estado' => 'cancelado',

            'descripcion' =>
                '🛑 Viaje cancelado por operador'

        ]);

        return back()->with(
            'success',
            'Viaje cancelado.'
        );
    }
}