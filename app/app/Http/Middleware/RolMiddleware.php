<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RolMiddleware
{
    public function handle(Request $request, Closure $next, $rol)
    {
        if ($request->session()->get('rol') !== $rol) {
            return redirect()->route('login'); // Redirigir si no tiene permisos
        }

        return $next($request);
    }
}
