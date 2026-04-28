<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica que haya usuario autenticado
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Verifica rol
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Acceso no autorizado');
        }

        return $next($request);
    }
}