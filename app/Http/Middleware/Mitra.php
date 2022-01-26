<?php

namespace App\Http\Middleware;

use App\Models\Mitra as ModelsMitra;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Mitra
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::id()!=1) {
            $mitra = ModelsMitra::all()->where('user_id', Auth::id())->first();
            if($mitra==null){
                return redirect()->route('page.register.mitra');
            }
        }
        return $next($request);
    }
}
