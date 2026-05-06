<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OperadorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $role = auth()->user()->role;

        if (!in_array($role, ['admin', 'operador'])) {
            abort(403, 'Acceso no autorizado');
        }

        return $next($request);
    }
}