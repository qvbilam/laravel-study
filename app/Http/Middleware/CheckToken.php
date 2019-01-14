<?php

namespace App\Http\Middleware;

use Closure;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->header('token') != 'erhuadamowang'){
            return response()->json(['error' => 'Unauthorized'], 401);
//            return redirect()->to('https://laravel.dev');
        }
        return $next($request);
    }
}
