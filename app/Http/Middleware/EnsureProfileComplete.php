<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureProfileComplete
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Skip for admin
        if ($user && $user->isAdmin()) {
            return $next($request);
        }

        // If on the profile.create route, allow through
        if ($request->routeIs('member.profile.create') || $request->routeIs('member.profile.store')) {
            return $next($request);
        }

        // If profile not complete, redirect to fill it
        if ($user && !$user->hasCompleteProfile()) {
            return redirect()->route('member.profile.create')
                ->with('info', 'Lengkapi data profil anggota Anda terlebih dahulu.');
        }

        return $next($request);
    }
}
