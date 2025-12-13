<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // kalau belum login ATAU user bukan admin
        if (!auth()->check() || !auth()->user()->is_admin) {
            return redirect('/')->with('error', 'Akses ditolak.');
        }

        return $next($request);
    }
}
