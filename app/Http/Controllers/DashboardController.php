<?php

namespace App\Http\Controllers;

use App\Models\Viaje;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Admin → panel de viajes
        if ($user->role === 'admin') {
            return redirect('/admin/viajes');
        }

        // Operador → panel operador
        if ($user->role === 'operador') {
            return redirect()->route('operador.viajes.index');
        }

        // Cliente → su dashboard de viajes
        $cliente = $user->cliente;

        if (!$cliente) {
            return view('dashboard_cliente', ['viajes' => collect()]);
        }

        $viajes = $cliente->viajes;
        return view('dashboard_cliente', compact('viajes'));
    }
}