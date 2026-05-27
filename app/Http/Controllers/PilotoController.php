<?php

namespace App\Http\Controllers;

use App\Models\Piloto;
use Illuminate\Http\Request;

class PilotoController extends Controller
{
    public function index(Request $request)
{
    $buscar = $request->buscar;

    $pilotos = Piloto::query()

        ->when($buscar, function ($query) use ($buscar) {

            $query->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('telefono', 'like', "%{$buscar}%")
                  ->orWhere('licencia', 'like', "%{$buscar}%")
                  ->orWhere('dpi', 'like', "%{$buscar}%");

        })

        ->paginate(20)

        ->withQueryString();

    return view(
        'pilotos.index',
        compact('pilotos')
    );
}

    public function create()
    {
        return view('pilotos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'licencia' => 'nullable|string|max:100',
            'dpi' => 'nullable|string|max:50',
            'estado' => 'required|string|max:50',
        ]);

        Piloto::create($request->all());

        return redirect()->route('pilotos.index')
                         ->with('success', 'Piloto creado correctamente');
    }

    public function show(string $id)
    {
        $piloto = Piloto::findOrFail($id);
        return view('pilotos.show', compact('piloto'));
    }

    public function edit(string $id)
    {
        $piloto = Piloto::findOrFail($id);
        return view('pilotos.edit', compact('piloto'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'licencia' => 'nullable|string|max:100',
            'dpi' => 'nullable|string|max:50',
            'estado' => 'required|string|max:50',
        ]);

        $piloto = Piloto::findOrFail($id);
        $piloto->update($request->all());

        return redirect()->route('pilotos.index')
                         ->with('success', 'Piloto actualizado correctamente');
    }

    public function destroy(string $id)
    {
        $piloto = Piloto::findOrFail($id);
        $piloto->delete();

        return redirect()->route('pilotos.index')
                         ->with('success', 'Piloto eliminado correctamente');
    }
}