<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{/*
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user() && $request->user()->role == $role) {
            return $next($request);
        }

        return redirect('dashboard'); // Измените 'dashboard' на URL, на который вы хотите перенаправить пользователя, если у него нет правильной роли.
    }*/
}

