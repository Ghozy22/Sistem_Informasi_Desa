<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request){

        $login = $request->validate([
            'email' => ['required', 'email:dns', ],
            'password' => ['required'],
        ]);

        if(Auth::attempt($login)){
            if(auth()->user()->level == 1){
                $request->session()->regenerate();

                return redirect()->intended('/');
            } else {
                $request->session()->regenerate();

                return redirect()->intended('/');
            }
        }

        return back()->with('loginError', 'Gagal Login!');
    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }
}
