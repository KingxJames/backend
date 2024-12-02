<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/*
This is a custom middleware that forces the request header to be set to 
json. Default laravel behavior is to redirect the user to a login route
if the request header is not set to json. 

Author: SW

*/

class ForceJsonRequestHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->headers->set('Accept', 'application/json');
        
        return $next($request);
    }
}