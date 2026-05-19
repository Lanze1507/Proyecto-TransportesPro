<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN VIEW
    |--------------------------------------------------------------------------
    */

    public function create(): View
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | ADMIN
        |--------------------------------------------------------------------------
        */

        if($user->role === 'admin'){

            return redirect('/admin/viajes');
        }

        /*
        |--------------------------------------------------------------------------
        | OPERADOR
        |--------------------------------------------------------------------------
        */

        if($user->role === 'operador'){

            return redirect('/operador/viajes');

        }

        /*
        |--------------------------------------------------------------------------
        | PILOTO
        |--------------------------------------------------------------------------
        */

        if($user->role === 'piloto'){

            return redirect('/piloto/dashboard');

        }

        /*
        |--------------------------------------------------------------------------
        | CLIENTE
        |--------------------------------------------------------------------------
        */

        return redirect('/dashboard');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}