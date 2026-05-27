<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Viaje;
use App\Models\Cliente;
use App\Models\Piloto;
use App\Models\Camion;
use App\Models\ViajeHistorial;

use Illuminate\Http\Request;

class ViajeController extends Controller
{
    public function index()
    {
        $search = request('search');

        $viajes = Viaje::with([

            'cliente',
            'piloto',
            'camion'

        ])

        ->when($search, function ($query) use ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('origen', 'like', "%{$search}%")

                ->orWhere('destino', 'like', "%{$search}%")

                ->orWhere('estado', 'like', "%{$search}%")

                ->orWhereHas('cliente', function ($cliente) use ($search) {

                    $cliente->where(
                        'nombre',
                        'like',
                        "%{$search}%"
                    );

                });

            });

        })

        ->latest()

        ->paginate(10)

        ->withQueryString();

        $totalViajes = Viaje::count();

        $enRuta = Viaje::where(
            'estado',
            'en_ruta'
        )->count();

        $pendientes = Viaje::where(
            'estado',
            'pendiente'
        )->count();

        $completados = Viaje::where(
            'estado',
            'completado'
        )->count();

        return view(
            'admin.viajes.index',
            compact(
                'viajes',
                'totalViajes',
                'enRuta',
                'pendientes',
                'completados'
            )
        );
    }

    public function create()
    {
        $clientes = Cliente::all();

        $pilotos = Piloto::all();

        $camiones = Camion::all();

        return view(
            'admin.viajes.create',
            compact(
                'clientes',
                'pilotos',
                'camiones'
            )
        );
    }

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | GEOCODE ORIGEN
        |--------------------------------------------------------------------------
        */

        $origenCoords = $this->geocode(
            $request->origen
        );

        /*
        |--------------------------------------------------------------------------
        | GEOCODE DESTINO
        |--------------------------------------------------------------------------
        */

        $destinoCoords = $this->geocode(
            $request->destino
        );

        /*
        |--------------------------------------------------------------------------
        | GENERAR CÓDIGO DE GUÍA
        |--------------------------------------------------------------------------
        */

        $codigoGuia =

            'TRX-' .

            strtoupper(

                substr(

                    uniqid(),

                    -6

                )

            );

        /*
        |--------------------------------------------------------------------------
        | CREAR VIAJE
        |--------------------------------------------------------------------------
        */

        $viaje = Viaje::create([

            'codigo_guia' => $codigoGuia,

            'cliente_id' => $request->cliente_id,

            'piloto_id' => $request->piloto_id,

            'camion_id' => $request->camion_id,

            'origen' => $request->origen,

            'destino' => $request->destino,

            'estado' => $request->estado,

            'lat_origen' =>
                $origenCoords['lat'] ?? null,

            'lng_origen' =>
                $origenCoords['lng'] ?? null,

            'lat_destino' =>
                $destinoCoords['lat'] ?? null,

            'lng_destino' =>
                $destinoCoords['lng'] ?? null,

        ]);

        /*
        |--------------------------------------------------------------------------
        | ACTUALIZAR ESTADOS AUTOMÁTICAMENTE
        |--------------------------------------------------------------------------
        */

        if($viaje->estado == 'en_ruta'){

            if($viaje->piloto){

                $viaje->piloto->update([

                    'estado' => 'inactivo'

                ]);

            }

            if($viaje->camion){

                $viaje->camion->update([

                    'estado' => 'ocupado'

                ]);

            }

        }

        /*
        |--------------------------------------------------------------------------
        | HISTORIAL INICIAL
        |--------------------------------------------------------------------------
        */

        ViajeHistorial::create([

            'viaje_id' => $viaje->id,

            'estado' => $viaje->estado,

            'descripcion' =>
                '📦 Viaje creado en el sistema'

        ]);

        /*
        |--------------------------------------------------------------------------
        | PILOTO
        |--------------------------------------------------------------------------
        */

        if($viaje->piloto){

            ViajeHistorial::create([

                'viaje_id' => $viaje->id,

                'estado' => $viaje->estado,

                'descripcion' =>
                    '👨‍✈️ Piloto asignado: '
                    . $viaje->piloto->nombre

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | CAMIÓN
        |--------------------------------------------------------------------------
        */

        if($viaje->camion){

            ViajeHistorial::create([

                'viaje_id' => $viaje->id,

                'estado' => $viaje->estado,

                'descripcion' =>
                    '🚛 Camión asignado: '
                    . $viaje->camion->placa

            ]);

        }

        return redirect('/admin/viajes')
            ->with(
                'success',
                'Viaje creado correctamente'
            );
    }

    public function edit($id)
    {
        $viaje = Viaje::findOrFail($id);

        $clientes = Cliente::all();

        $pilotos = Piloto::all();

        $camiones = Camion::all();

        return view(
            'admin.viajes.edit',
            compact(
                'viaje',
                'clientes',
                'pilotos',
                'camiones'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $viaje = Viaje::findOrFail($id);

        $estadoAnterior = $viaje->estado;

        $pilotoAnterior = $viaje->piloto_id;

        $camionAnterior = $viaje->camion_id;

        $origenCoords = $this->geocode(
            $request->origen
        );

        $destinoCoords = $this->geocode(
            $request->destino
        );

        /*
|--------------------------------------------------------------------------
| LIBERAR RECURSOS ANTERIORES
|--------------------------------------------------------------------------
*/

if($pilotoAnterior && $pilotoAnterior != $request->piloto_id){

    Piloto::where('id', $pilotoAnterior)

        ->update([

            'estado' => 'activo'

        ]);

}

if($camionAnterior && $camionAnterior != $request->camion_id){

    Camion::where('id', $camionAnterior)

        ->update([

            'estado' => 'disponible'

        ]);

}

        $viaje->update([

            'cliente_id' => $request->cliente_id,

            'piloto_id' => $request->piloto_id,

            'camion_id' => $request->camion_id,

            'origen' => $request->origen,

            'destino' => $request->destino,

            'estado' => $request->estado,

            'lat_origen' =>
                $origenCoords['lat'] ?? null,

            'lng_origen' =>
                $origenCoords['lng'] ?? null,

            'lat_destino' =>
                $destinoCoords['lat'] ?? null,

            'lng_destino' =>
                $destinoCoords['lng'] ?? null,

        ]);

        /*
        |--------------------------------------------------------------------------
        | ESTADOS AUTOMÁTICOS
        |--------------------------------------------------------------------------
        */

        if($viaje->estado == 'completado'){

            if($viaje->piloto){

                $viaje->piloto->update([

                    'estado' => 'activo'

                ]);

            }

            if($viaje->camion){

                $viaje->camion->update([

                    'estado' => 'disponible'

                ]);

            }

        }

        if($viaje->estado == 'en_ruta'){

            if($viaje->piloto){

                $viaje->piloto->update([

                    'estado' => 'inactivo'

                ]);

            }

            if($viaje->camion){

                $viaje->camion->update([

                    'estado' => 'ocupado'

                ]);

            }

        }

        /*
        |--------------------------------------------------------------------------
        | HISTORIAL
        |--------------------------------------------------------------------------
        */

        if($estadoAnterior != $viaje->estado){

            ViajeHistorial::create([

                'viaje_id' => $viaje->id,

                'estado' => $viaje->estado,

                'descripcion' =>
                    '📍 Estado actualizado de "'
                    . $estadoAnterior .
                    '" a "'
                    . $viaje->estado .
                    '"'

            ]);

        }

        if($pilotoAnterior != $viaje->piloto_id){

            if($viaje->piloto){

                ViajeHistorial::create([

                    'viaje_id' => $viaje->id,

                    'estado' => $viaje->estado,

                    'descripcion' =>
                        '👨‍✈️ Nuevo piloto asignado: '
                        . $viaje->piloto->nombre

                ]);

            }

        }

        if($camionAnterior != $viaje->camion_id){

            if($viaje->camion){

                ViajeHistorial::create([

                    'viaje_id' => $viaje->id,

                    'estado' => $viaje->estado,

                    'descripcion' =>
                        '🚛 Nuevo camión asignado: '
                        . $viaje->camion->placa

                ]);

            }

        }

        if(
            $estadoAnterior == $viaje->estado
            &&
            $pilotoAnterior == $viaje->piloto_id
            &&
            $camionAnterior == $viaje->camion_id
        ){

            ViajeHistorial::create([

                'viaje_id' => $viaje->id,

                'estado' => $viaje->estado,

                'descripcion' =>
                    '✏️ Información del viaje actualizada'

            ]);

        }

        return redirect('/admin/viajes')
            ->with(
                'success',
                'Viaje actualizado correctamente'
            );
    }

    public function destroy($id)
{
    $viaje = Viaje::findOrFail($id);

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
    | ELIMINAR VIAJE
    |--------------------------------------------------------------------------
    */

    $viaje->delete();

    return back()
        ->with(
            'success',
            'Viaje eliminado correctamente'
        );
}

    private function geocode($direccion)
    {
        $query = urlencode($direccion);

        $url =
            "https://nominatim.openstreetmap.org/search?format=json&q={$query}";

        $opts = [

            "http" => [

                "header" =>
                    "User-Agent: TransProApp\r\n"

            ]

        ];

        $context =
            stream_context_create($opts);

        $response =
            file_get_contents(
                $url,
                false,
                $context
            );

        $data =
            json_decode($response, true);

        if(!empty($data)){

            return [

                'lat' => $data[0]['lat'],

                'lng' => $data[0]['lon']

            ];

        }

        return null;
    }
}