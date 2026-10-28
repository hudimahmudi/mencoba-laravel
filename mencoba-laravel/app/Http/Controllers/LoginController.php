<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function actionLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required']
        ]);
        if(Auth::attempt($credentials)){
            $request->session()-> regenerate();
            return redirect()->intended(route('admin.dashboard.index'))->with('success', 'Welcome to dashboard admin PPKD Sticker');
        }

        return back()->withErrors(['email'=> 'incorrect email or password'])->onlyInput('email');
        // Auth::attempt()
    }
}
