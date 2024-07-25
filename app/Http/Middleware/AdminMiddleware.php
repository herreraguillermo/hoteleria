<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;//quiza este de mas

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // app/Http/Middleware/AdminMiddleware.php

public function handle($request, Closure $next)
{
    if (auth()->check() && auth()->user()->is_admin) {
        return $next($request);
    }

    return redirect('/'); // O una página de error adecuada
}

/* public function handle($request, Closure $next)
{
    if (!Auth::check() || !Auth::user()->isAdmin()) {
        return redirect('/home');
    }

    return $next($request);
} */
}
