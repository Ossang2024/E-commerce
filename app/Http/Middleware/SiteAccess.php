<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SiteAccess
{
    public function handle(Request $request, Closure $next)
    {
        // Autoriser la page d'accès
        if ($request->is('access-code') || $request->is('access-code/*')) {
            return $next($request);
        }

        // Si l'utilisateur n'a pas encore entré le code
        if (!session('site_access')) {
            return redirect('/access-code');
        }

        return $next($request);
    }
}