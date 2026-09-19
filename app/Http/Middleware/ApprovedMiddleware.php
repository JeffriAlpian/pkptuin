<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApprovedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && !$request->user()->isApproved() && !$request->user()->isAdmin()) {
            // Kita bisa arahkan ke halaman khusus
            return redirect()->route('approval.pending');
        }

        return $next($request);
    }
}
