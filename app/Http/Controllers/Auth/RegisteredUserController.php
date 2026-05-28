<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\Notificacion;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
\App\Models\Cliente::create([

    'user_id' => $user->id,

    'nombre' => $user->name,

    'email' => $user->email,

    'telefono' => '',

    'direccion' => '',

]);

        event(new Registered($user));

        

        \App\Models\Notificacion::create([

    'titulo' =>
        '👤 Nuevo cliente registrado',

    'mensaje' =>
        $user->name .
        ' se registró con el correo: '
        . $user->email

]);
        

        Auth::login($user);

        if ($user->role === 'admin') {
    return redirect('/clientes');
} else {
    return redirect('/dashboard');
}
    }
}
