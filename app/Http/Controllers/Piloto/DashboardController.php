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
        $pilotos = Piloto::where('user_id', $user->id)->first();

        // Si el usuario tiene rol piloto pero no tiene registro en pilotos todavía
        if (!$pilotos) {
            return view('piloto.sin_asignar');
        }

        // ── KPIs ──
        $stats = [
            'total'       => $pilotos->viajes()->count(),
            'en_transito' => $pilotos->viajes()
                                ->whereIn('estado', ['en_transito', 'en_ruta'])
                                ->count(),
            'completados' => $pilotos->viajes()
                                ->whereIn('estado', ['entregado', 'completado'])
                                ->count(),
            'pendientes'  => $pilotos->viajes()
                                ->where('estado', 'aprobado')
                                ->count(),
        ];

        // ── Viaje activo actual (si hay uno en tránsito) ──
        $viaje_activo = $pilotos->viajes()
            ->with(['cliente', 'camion', 'historial'])
            ->whereIn('estado', ['en_transito', 'en_ruta'])
            ->latest()
            ->first();

        // ── Próximos viajes aprobados (listos para iniciar) ──
        $viajes_proximos = $pilotos->viajes()
            ->with(['cliente', 'camion'])
            ->where('estado', 'aprobado')
            ->latest()
            ->take(5)
            ->get();

        // ── Historial reciente de viajes ──
        $viajes_recientes = $pilotos->viajes()
            ->with(['cliente', 'camion'])
            ->whereIn('estado', ['entregado', 'completado', 'cancelado'])
            ->latest()
            ->take(6)
            ->get();

        return view('pilotos.dashboard', compact(
            'pilotos',
            'stats',
            'viaje_activo',
            'viajes_proximos',
            'viajes_recientes'
        ));
    }
}