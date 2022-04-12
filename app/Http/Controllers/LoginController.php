<?php

namespace App\Http\Controllers;
use App\Http\Controller\Controler;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $username = 'username';
    protected $redirectTo = '/dashboard';
    protected $guard = 'web';

    public function getLogin()
    {
        if (Auth::guard('web')->check())
        {
            return redirect()->route('dashboard');
        }

        return view('auths.login');
    }

    public function postLogin(Request $request) 
    {
        $auth = Auth::guard('web')
            ->attempt([  'username' => $request->username, 
                        'password' => $request->password,
                        'active' => 1,
                    ]);
        if ($auth) 
        {
            return redirect()->route('dashboard');
        }

        return redirect()->route('/dashboard');
    }

    public function getLogout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('/');
    }
}
