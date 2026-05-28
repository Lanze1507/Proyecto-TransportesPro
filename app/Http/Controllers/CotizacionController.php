<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cotizacion;

class CotizacionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            'nombre' => 'required',

            'email' => 'required|email',

            'telefono' => 'required',

            'tipo_carga' => 'required',

            'ciudad_origen' => 'required',

            'peso' => 'required|numeric',

        ]);

        /*
        |--------------------------------------------------------------------------
        | CÁLCULO SIMPLE
        |--------------------------------------------------------------------------
        */

        $precio = 150 + ($request->peso * 2.5);

        /*
        |--------------------------------------------------------------------------
        | SERVICIOS EXTRA
        |--------------------------------------------------------------------------
        */

        if($request->has('express')){

            $precio += 100;

        }

        if($request->has('seguro')){

            $precio += 75;

        }

        if($request->has('embalaje')){

            $precio += 50;

        }

        /*
        |--------------------------------------------------------------------------
        | GUARDAR
        |--------------------------------------------------------------------------
        */

        Cotizacion::create([

            'nombre' => $request->nombre,

            'email' => $request->email,

            'telefono' => $request->telefono,

            'tipo_carga' => $request->tipo_carga,

            'ciudad_origen' => $request->ciudad_origen,

            'incoterm' => $request->incoterm,

            'peso' => $request->peso,

            'alto' => $request->alto,

            'ancho' => $request->ancho,

            'largo' => $request->largo,

            'precio_estimado' => $precio,

        ]);

        return back()->with(

            'success',

            '✅ Cotización enviada correctamente. Precio estimado: Q' . number_format($precio, 2)

        );
    }

    public function index()
{
    $cotizaciones = \App\Models\Cotizacion::latest()->get();

    return view(

        'admin.cotizaciones.index',

        compact('cotizaciones')

    );
}
    
    
}