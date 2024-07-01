<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    // public function handle($request, \Closure $next, ...$guards)
    // {
    //     if (Auth::guard($guards)->guest()) {
    //         if ($request->ajax() || $request->wantsJson()) {
    //             return response('Unauthorized.', 401);
    //         } else {
    //             return redirect()->guest(route('login'));
    //         }
    //     }

    //     $response = $next($request);
    //     return $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0')
    //                     ->header('Pragma', 'no-cache')
    //                     ->header('Expires', 'Sat, 01 Jan 2000 00:00:00 GMT');
    // }
}
