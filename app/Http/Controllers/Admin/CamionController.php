<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camion;
use Illuminate\Http\Request;

class CamionController extends Controller
{
    public function index()
    {
        $camiones = Camion::latest()->paginate(10);
        return view('admin.camiones.index', compact('camiones'));
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