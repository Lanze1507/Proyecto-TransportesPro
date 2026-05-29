<?php

namespace App\Http\Controllers\Operador;

use App\Http\Controllers\Controller;
use App\Models\Viaje;
use App\Models\Piloto;
use App\Models\Camion;
use App\Models\Cliente;

class DashboardController extends Controller
{
    public function index()
    {
        // KPIs calculados directamente desde la DB
        $stats = [
            'total'               => Viaje::count(),
            'pendientes'          => Viaje::where('estado', 'pendiente')->count(),
            'aprobados'           => Viaje::where('estado', 'aprobado')->count(),
            'en_ruta'             => Viaje::where('estado', 'en_ruta')->count(),
            'completados'         => Viaje::where('estado', 'completado')->count(),
            'cancelados'          => Viaje::where('estado', 'cancelado')->count(),
            'rechazados'          => Viaje::where('estado', 'rechazado')->count(),
            'pilotos_activos'     => Piloto::where('estado', 'activo')->count(),
            'camiones_disponibles'=> Camion::where('estado', 'disponible')->count(),
            'clientes'            => Cliente::count(),
        ];

        // Viajes que necesitan atención inmediata
        $viajes_pendientes = Viaje::with(['cliente'])
            ->where('estado', 'pendiente')
            ->latest()
            ->take(5)
            ->get();

        // Últimos 8 viajes de cualquier estado
        $viajes_recientes = Viaje::with(['cliente', 'piloto', 'camion'])
            ->latest()
            ->take(8)
            ->get();

        return view('operador.dashboard', compact(
            'stats',
            'viajes_pendientes',
            'viajes_recientes'
        ));
    }
}