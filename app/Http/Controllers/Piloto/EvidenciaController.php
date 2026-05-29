<?php

namespace App\Http\Controllers\Piloto;

use App\Http\Controllers\Controller;

use App\Models\Entrega;
use App\Models\Evidencia;
use App\Models\Viaje;
use App\Models\ViajeHistorial;

use Illuminate\Http\Request;

class EvidenciaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FORMULARIO DE ENTREGA
    |--------------------------------------------------------------------------
    */

    public function create($viaje_id)
    {
        $viaje = Viaje::with([

            'cliente',
            'camion',
            'piloto'

        ])->findOrFail($viaje_id);

        /*
        |--------------------------------------------------------------------------
        | PILOTO AUTENTICADO
        |--------------------------------------------------------------------------
        */

        $piloto = \App\Models\Piloto::where(

            'user_id',
            auth()->id()

        )->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | SEGURIDAD
        |--------------------------------------------------------------------------
        */

        abort_if(

            $viaje->piloto_id !== $piloto->id,

            403

        );

        /*
        |--------------------------------------------------------------------------
        | SOLO VIAJES ACTIVOS — en_ruta o en_transito
        |--------------------------------------------------------------------------
        */

        abort_if(

            !in_array($viaje->estado, [
                'en_ruta',
                'en_transito',
            ]),

            403

        );

        return view(

            'pilotos.subir_evidencias',

            compact('viaje')

        );
    }

    /*
    |--------------------------------------------------------------------------
    | INICIAR TRASLADO — piloto cambia estado de en_ruta a en_transito
    |--------------------------------------------------------------------------
    */

    public function iniciarTraslado($viaje_id)
    {
        $piloto = \App\Models\Piloto::where('user_id', auth()->id())->firstOrFail();

        $viaje = Viaje::findOrFail($viaje_id);

        // Solo el piloto asignado puede hacer esto
        abort_if($viaje->piloto_id !== $piloto->id, 403);

        // Solo si está en_ruta
        abort_if($viaje->estado !== 'en_ruta', 403);

        $viaje->update(['estado' => 'en_transito']);

        ViajeHistorial::create([
            'viaje_id'    => $viaje->id,
            'estado'      => 'en_transito',
            'descripcion' => '🚛 Piloto inició el traslado activo',
        ]);

        return back()->with('success', 'Estado actualizado a En tránsito.');
    }

    /*
    |--------------------------------------------------------------------------
    | COMPLETAR ENTREGA
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, $viaje_id)
    {
        $request->validate([

            'fotos'       => 'required|array|min:1',

            'fotos.*'     => 'image|max:5120',

            'descripcion' => 'nullable|string|max:1000',

            'firma'       => 'nullable|string',

        ]);

        /*
        |--------------------------------------------------------------------------
        | VIAJE
        |--------------------------------------------------------------------------
        */

        $viaje = Viaje::with([

            'piloto',
            'camion',
            'cliente'

        ])->findOrFail($viaje_id);

        /*
        |--------------------------------------------------------------------------
        | EVITAR DOBLE ENTREGA
        |--------------------------------------------------------------------------
        */

        if($viaje->estado == 'completado'){

            return back()->with(

                'error',

                'Este viaje ya fue completado.'

            );

        }

        /*
        |--------------------------------------------------------------------------
        | CREAR ENTREGA
        |--------------------------------------------------------------------------
        */

      
/*
|--------------------------------------------------------------------------
| GUARDAR FIRMA COMO IMAGEN
|--------------------------------------------------------------------------
*/

$firmaPath = null;

if($request->firma){

    $firma = $request->firma;

    $firma = str_replace(

        'data:image/png;base64,',

        '',

        $firma

    );

    $firma = str_replace(

        ' ',

        '+',

        $firma

    );

    $data = base64_decode($firma);

    $nombreFirma =

        'firma_' .

        time() .

        '.png';

    \Storage::disk('public')->put(

        'firmas/' . $nombreFirma,

        $data

    );

    $firmaPath =

        'firmas/' . $nombreFirma;

}

$entrega = Entrega::updateOrCreate(

    [
        'viaje_id' => $viaje_id
    ],

    [
        'estado' => 'entregado',

        'firma_digital' => $firmaPath,

        'fecha_entrega' => now(),
    ]

);



        /*
        |--------------------------------------------------------------------------
        | GUARDAR EVIDENCIAS
        |--------------------------------------------------------------------------
        */

   
if($request->hasFile('fotos')){

    foreach($request->file('fotos') as $foto){

        /*
        |--------------------------------------------------------------------------
        | VALIDAR
        |--------------------------------------------------------------------------
        */

        if(!$foto){

            continue;

        }

        /*
        |--------------------------------------------------------------------------
        | NOMBRE
        |--------------------------------------------------------------------------
        */

        $nombre = time().'_'.$foto->getClientOriginalName();

        /*
        |--------------------------------------------------------------------------
        | LEER ARCHIVO TEMPORAL
        |--------------------------------------------------------------------------
        */

        $contenido = file_get_contents(

            $foto->getPathname()

        );

        /*
        |--------------------------------------------------------------------------
        | DESTINO
        |--------------------------------------------------------------------------
        */

        $destino = storage_path('app/public/evidencias/' . $nombre);

        /*
        |--------------------------------------------------------------------------
        | GUARDAR MANUALMENTE
        |--------------------------------------------------------------------------
        */

        file_put_contents(

            $destino,

            $contenido

        );

        /*
        |--------------------------------------------------------------------------
        | DB
        |--------------------------------------------------------------------------
        */

        Evidencia::create([

            'entrega_id' => $entrega->id,

            'foto_url' => 'evidencias/'.$nombre,

            'descripcion' => $request->descripcion,

        ]);

    }

}




        /*
        |--------------------------------------------------------------------------
        | COMPLETAR VIAJE
        |--------------------------------------------------------------------------
        */

        $viaje->update([

            'estado' => 'completado',

            'fecha_entrega' => now(),

            'firma_cliente' => $firmaPath,

            'recibido' => true,

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

        /*
        |--------------------------------------------------------------------------
        | HISTORIAL
        |--------------------------------------------------------------------------
        */

        ViajeHistorial::create([

            'viaje_id' => $viaje->id,

            'estado' => 'completado',

            'descripcion' =>
                '📦 Entrega completada con evidencias'

        ]);

        return redirect()

            ->route('piloto.dashboard')

            ->with(

                'success',

                'Entrega completada correctamente.'

            );
    }
}