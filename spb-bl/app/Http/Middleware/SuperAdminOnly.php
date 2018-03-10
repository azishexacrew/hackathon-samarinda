<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminOnly
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
      if(auth()->user()->level != 'SuperAdmin'){
          return redirect('pemilik');
      }
      return $next($request);
    }
}
