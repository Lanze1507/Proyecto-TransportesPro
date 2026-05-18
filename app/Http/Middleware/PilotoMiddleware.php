<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PilotoMiddleware
{
    /**
     * Permite el acceso solo a usuarios con rol 'piloto'.
     * El admin también puede acceder para pruebas.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $role = auth()->user()->role;

        if (!in_array($role, ['piloto', 'admin'])) {
            abort(403, 'Acceso no autorizado. Se requiere rol de piloto.');
        }

        return $next($request);
    }
}