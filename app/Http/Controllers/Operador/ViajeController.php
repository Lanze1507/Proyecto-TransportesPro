<?php
namespace App\Http\Controllers\Operador;

use App\Http\Controllers\Controller;
use App\Models\Viaje;
use App\Models\Piloto;
use App\Models\Camion;
use Illuminate\Http\Request;

class ViajeController extends Controller
{
    // Lista todos los viajes
    public function index()
    {
        $viajes = Viaje::with(['cliente', 'piloto', 'camion'])->get();
        return view('operador.viajes.index', compact('viajes'));
    }

    // Detalle de un viaje
    public function show($id)
    {
        $viaje   = Viaje::with(['cliente', 'piloto', 'camion'])->findOrFail($id);
        $pilotos = Piloto::where('estado', 'activo')->get();
        $camiones = Camion::where('estado', 'disponible')->get();
        return view('operador.viajes.show', compact('viaje', 'pilotos', 'camiones'));
    }

    // Aprobar viaje
    public function aprobar($id)
    {
        $viaje = Viaje::findOrFail($id);
        $viaje->update(['estado' => 'aprobado']);
        return back()->with('success', 'Viaje aprobado correctamente.');
    }

    // Rechazar viaje
    public function rechazar($id)
    {
        $viaje = Viaje::findOrFail($id);
        $viaje->update(['estado' => 'rechazado']);
        return back()->with('success', 'Viaje rechazado.');
    }

    // Asignar piloto y camión
    public function asignar(Request $request, $id)
    {
        $request->validate([
            'piloto_id' => 'required|exists:pilotos,id',
            'camion_id' => 'required|exists:camiones,id',
        ]);

        $viaje = Viaje::findOrFail($id);
        $viaje->update([
            'piloto_id' => $request->piloto_id,
            'camion_id' => $request->camion_id,
            'estado'    => 'en_transito',
        ]);

        return back()->with('success', 'Piloto y camión asignados.');
    }

    // Cancelar viaje
    public function cancelar($id)
    {
        $viaje = Viaje::findOrFail($id);
        $viaje->update(['estado' => 'cancelado']);
        return back()->with('success', 'Viaje cancelado.');
    }
}