<?php

namespace App\Http\Controllers;

use App\Models\Viaje;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */
        if ($user->role === 'admin') {

            return redirect('/admin/viajes');

        }

        /*
        |--------------------------------------------------------------------------
        | OPERADOR
        |--------------------------------------------------------------------------
        */
        if ($user->role === 'operador') {

            return redirect()
                ->route('operador.viajes.index');

        }

        /*
        |--------------------------------------------------------------------------
        | CLIENTE
        |--------------------------------------------------------------------------
        */

        $cliente = $user->cliente;

        if (!$cliente) {

            return view(
                'dashboard_cliente',
                [
                    'viajes' => collect()
                ]
            );

        }

        /*
        |--------------------------------------------------------------------------
        | CARGAR TODO EL SISTEMA
        |--------------------------------------------------------------------------
        */

        $viajes = Viaje::with([

            'cliente',
            'piloto',
            'camion',
            'historial'

        ])
        ->where('cliente_id', $cliente->id)
        ->latest()
        ->get();

        return view(
            'dashboard_cliente',
            compact('viajes')
        );
    }
}