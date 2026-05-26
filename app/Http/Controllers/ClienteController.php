<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // Mostrar todos los clientes
    public function index(Request $request)
{
    $buscar = $request->buscar;

    $clientes = Cliente::query()

        ->when($buscar, function ($query) use ($buscar) {

            $query->where('nombre', 'like', "%{$buscar}%")
                  ->orWhere('email', 'like', "%{$buscar}%")
                  ->orWhere('telefono', 'like', "%{$buscar}%");

        })

        ->paginate(20)

        ->withQueryString();

    return view(
        'clientes.index',
        compact('clientes')
    );
}

    // Mostrar formulario de creación
    public function create()
    {
        return view('clientes.create');
    }

    // Guardar nuevo cliente
    public function store(Request $request)
    {
        Cliente::create($request->all());
        return redirect('/clientes');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect('/clientes');
    }
    public function destroy($id)
    {
    $cliente = Cliente::findOrFail($id);
    $cliente->delete();

    return redirect('/clientes');
    }
}