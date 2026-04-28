<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Viaje;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ViajeController extends Controller
{
    public function index()
    {
        $viajes = Viaje::with('cliente')->get();
        return view('admin.viajes.index', compact('viajes'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('admin.viajes.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        Viaje::create($request->all());
        return redirect('/admin/viajes');
    }

    public function edit($id)
    {
        $viaje = Viaje::findOrFail($id);
        $clientes = Cliente::all();
        return view('admin.viajes.edit', compact('viaje','clientes'));
    }

    public function update(Request $request, $id)
    {
        $viaje = Viaje::findOrFail($id);
        $viaje->update($request->all());
        return redirect('/admin/viajes');
    }

    public function destroy($id)
    {
        Viaje::destroy($id);
        return back();
    }
}
