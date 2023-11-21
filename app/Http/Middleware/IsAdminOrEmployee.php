<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdminOrEmployee
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && (auth()->user()->role=="admin" || auth()->user()->role=="employee")) {
            return $next($request);
        }

        return redirect('dashboard')->with('error',"You don't have admin or employee access.");
    }
}
