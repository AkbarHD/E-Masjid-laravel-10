<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureDataMasjidCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->masjid == null) { // jika user tersebut blm isi data masjid maka dia akan terus di arahkan ke masjid.create
            flash('Data Masjid Belum Lengkap, silahkan lengkapi data masjid terlebih dahulu')->error();
            return redirect()->route('masjid.create');
        }
        return $next($request);
    }
}
