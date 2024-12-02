<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      $allowedOrigins = ['http://127.0.0.1:5173', 'http://127.0.0.1:8088/auth/google', 'http://localhost:8088/'];
      # $origin = $_SERVER['HTTP_ORIGIN'];
      $origin = request()->headers->get('referer');
      #var_dump($origin); exit;
      $response = $next($request);
      if (in_array($origin, $allowedOrigins)) {
        $response->headers->set('Access-Control-Allow-Origin', $origin);
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Authorization, Origin');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE, OPTIONS');
      }
      return $response;
    }
}