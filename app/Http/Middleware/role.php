<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah peran pengguna sesuai dengan yang diizinkan
        if ($request->user()->role !== $role) {
            // Jika tidak sesuai, kembalikan response dengan pesan error
            return redirect()->back();
        }

        // Lanjutkan request
        return $next($request);
    }
}
