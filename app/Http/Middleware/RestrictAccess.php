<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use User;

class RestrictAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

// Kolla om användaren är admin för att kunna ha access till adminpanelen
    public function handle($request, Closure $next)
    {
       if(Auth::check() && Auth::user()->isAdmin()) {

        return $next($request);
       }

       return redirect("/login");
    }
}
