<?php

namespace App\Http\Controllers;

use App\Models\Viaje;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $cliente = $user->cliente;

        if (!$cliente) {
            return view('dashboard_cliente', [
                'viajes' => collect()
            ]);
        }

        $viajes = $cliente->viajes;

        return view('dashboard_cliente', compact('viajes'));
    }
}