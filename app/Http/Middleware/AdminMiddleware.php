<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    // Check if user is authenticated and is an admin
    if (!Auth::check() || !Auth::user()->is_admin) {
      if ($request->expectsJson()) {
        return response()->json(['error' => 'Unauthorized.'], 403);
      }
      return redirect()->route('admin.login')->with('error', 'You do not have admin access.');
    }

    return $next($request);
  }
}
