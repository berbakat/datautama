<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class Login extends Controller
{
    public function login()
    {
        if (Auth::check()) 
        {
            return redirect('home');
        }
        else
        {
            return view('login');
        }
    }

    public function loginaksi(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) 
        {
            return redirect('home');
        }
        else
        {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/');
    }
}