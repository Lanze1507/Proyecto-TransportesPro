<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camion;
use Illuminate\Http\Request;

class CamionController extends Controller
{
    public function index(Request $request)
{
    $buscar = $request->buscar;

    $camiones = Camion::query()

        ->when($buscar, function ($query) use ($buscar) {

            $query->where('placa', 'like', "%{$buscar}%")
                  ->orWhere('modelo', 'like', "%{$buscar}%")
                  ->orWhere('capacidad', 'like', "%{$buscar}%");

        })

        ->paginate(20)

        ->withQueryString();

    return view(
        'admin.camiones.index',
        compact('camiones')
    );
}

public function edit($id)
{
    $camion = Camion::findOrFail($id);

    return view(
        'admin.camiones.edit',
        compact('camion')
    );
}

public function update(Request $request, $id)
{
    $request->validate([

        'placa' => 'required',

        'modelo' => 'required',

        'capacidad' => 'required|numeric',

        'estado' => 'required|string|max:50',

    ]);

    $camion = Camion::findOrFail($id);

    $camion->update([

        'placa' => $request->placa,

        'modelo' => $request->modelo,

        'capacidad' => $request->capacidad,

        'estado' => $request->estado,

    ]);

    return redirect('/admin/camiones')
        ->with('success', 'Camión actualizado correctamente.');
}

public function destroy($id)
{
    $camion = Camion::findOrFail($id);

    $camion->delete();

    return redirect('/admin/camiones')
        ->with('success', 'Camión eliminado correctamente.');
}

    public function create()
    {
        return view('admin.camiones.create');
    }

    public function store(Request $request)
    {
        Camion::create($request->all());
        return redirect('/admin/camiones');
    }
}