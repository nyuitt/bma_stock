<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckExpiration
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()) {
            if (!Auth::user()->is_allowed) {
                Auth::logout();
                return redirect()->route('login')->with('access_denied', 'Acesso negado. Faça login novamente.');
            }
    
            $expirationDate = now()->subDays(7);
            if (Auth::user()->created_at->lt($expirationDate)) {
                Auth::logout();
                return redirect()->route('login')->with('access_denied', 'Acesso negado. Faça login novamente.');
            }

            if (Auth::user()->is_allowed == 0) {
                Auth::logout();
                return redirect()->route('login')->with('access_denied', 'Acesso negado. Faça login novamente.');
            }
        } elseif ($request->getMethod() == 'POST') {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return redirect('/home');
            } else {
                return redirect()->route('login')->withErrors([
                    'login' => 'Credenciais inválidas. Faça login novamente.'
                ]);
            }
        }

        return $next($request);
    }
}
