<?php

namespace App\Http\Middleware;

use Closure;

class ajaxCheck
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
//        $userName=$request->userName;
//        $request->merge($input);
//        if($userName=='lixuke'){
            return $next($request);
//        }
    }
}
