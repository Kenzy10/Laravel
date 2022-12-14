<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isGuest
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
        //cek kalau fitur auth ada history login, diperbolehkan akses
       if(Auth::check()){
        return redirect()->route('dashboard')->with('notAllowed', 'Anda sudah login');
       }
       return $next($request);

       //kalau gada history login bakal dibalikin ke halaman login dengan pesan error

      
    }
}
        

