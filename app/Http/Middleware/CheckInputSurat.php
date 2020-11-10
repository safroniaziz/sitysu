<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckInputSurat
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
        if (auth()->user()->input_surat == 'aktif') {
            return $next($request);
        }
        return redirect()->back();
    }
}
