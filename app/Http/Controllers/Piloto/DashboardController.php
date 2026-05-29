<?php

namespace App\Http\Controllers\Piloto;

use App\Http\Controllers\Controller;
use App\Models\Piloto;
use App\Models\Viaje;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Buscar el registro de piloto vinculado al usuario logueado
        $piloto = Piloto::where('user_id', $user->id)->first();

        // Si el usuario tiene rol piloto pero no tiene registro en pilotos todavía
        if (!$piloto) {
            return view('pilotos.sin_asignar');
        }

        // ── KPIs ──
        $stats = [
            'total'       => $piloto->viajes()->count(),
            'en_transito' => $piloto->viajes()
                                ->where('estado', 'en_ruta', 'en_transito')
                                ->count(),
            'completados' => $piloto->viajes()
                                ->whereIn('estado', ['completado', 'entregado'])
                                ->count(),
            'pendientes'  => $piloto->viajes()
                                ->where('estado', 'aprobado')
                                ->count(),
        ];

        // ── Viaje activo actual (si hay uno en ruta) ──
        $viaje_activo = $piloto->viajes()
            ->with(['cliente', 'camion', 'historial'])
            ->where('estado', 'en_ruta', 'en_transito')
            ->latest()
            ->first();

        // ── Próximos viajes aprobados (listos para iniciar) ──
        $viajes_proximos = $piloto->viajes()
            ->with(['cliente', 'camion'])
            ->where('estado', 'aprobado')
            ->latest()
            ->take(5)
            ->get();

        // ── Historial reciente de viajes ──
        $viajes_recientes = $piloto->viajes()
            ->with(['cliente', 'camion'])
            ->whereIn('estado', ['completado', 'entregado', 'cancelado'])
            ->latest()
            ->take(6)
            ->get();

        return view('pilotos.dashboard', compact(
            'piloto',
            'stats',
            'viaje_activo',
            'viajes_proximos',
            'viajes_recientes'
        ));
    }
}