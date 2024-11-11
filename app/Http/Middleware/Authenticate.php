<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (! $this->auth->guard($guards)->check()) {
            dd("Usuario no autenticado"); // Este mensaje debería aparecer si el usuario no está autenticado
            return $this->redirectTo($request) ?: route('login');
        }

        return $next($request);
    }

    /**
     * Obtiene la ruta a la que debe redirigir el usuario cuando no está autenticado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
