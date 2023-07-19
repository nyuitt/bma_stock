<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('expiration')->only('login');
    }

    protected function authenticated(Request $request, $user)
    {
        if (!$user->is_allowed) {
            Auth::logout();
            return redirect()->route('login')->with('access_denied', 'Acesso negado. Faça login novamente.');
        }
    }
    

    /**
 * Determine the redirect location after the user has been authenticated.
 *
 * @return string
 */
    protected function redirectTo()
    {
        if (Auth::user()->is_allowed) {
            return '/home'; // Redireciona para a rota /home se o usuário for permitido
        } else {
            Auth::logout(); // Faz logout do usuário não permitido
            return redirect()->route('login')->with('access_denied', 'Acesso negado. Faça login novamente.');
        }
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        // Verifique se o usuário é permitido
        $user = $this->guard()->getLastAttempted();
        if ($user && !$user->is_allowed) {
            $errors['is_allowed'] = 'Você não tem permissão para acessar o sistema.';
        }

        return redirect()->route('login')->withErrors($errors)->withInput($request->only($this->username(), 'remember'));
    }
    
}
