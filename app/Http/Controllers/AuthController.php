<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }

    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('username','password'))){
            $user = Auth::user();
            
            if($user->sisya != null){
                if($user->sisya->status == 1){
                    return redirect('/dashboard');
                }

                 Auth::logout();

            }
            return redirect('/dashboard');

            
        } return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
