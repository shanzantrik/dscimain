<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ForceHttps
{
  public function handle(Request $request, Closure $next)
  {
    if (App::environment('production')) {
      // Force HTTPS in production
      if (!$request->secure()) {
        return redirect()->secure($request->getRequestUri());
      }

      // Add security headers
      $response = $next($request);
      $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
      $response->headers->set('Content-Security-Policy', "upgrade-insecure-requests");
      $response->headers->set('X-Content-Type-Options', 'nosniff');
      $response->headers->set('X-XSS-Protection', '1; mode=block');
      $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
      $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

      return $response;
    }

    return $next($request);
  }
}
