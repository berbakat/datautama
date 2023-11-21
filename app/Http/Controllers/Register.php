<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;

class Register extends Controller
{
    public function register()
    {
        if (Auth::check()) 
        {
            return redirect('home');
        }
        else
        {
            return view('register');
        }
    }

    public function saveregister(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
			'username' => $request->input('username'),
            'password' => $request->input('password'),
			'created_at' => date('Y-m-d H:i:s')
        ];
		
		$user = User::create($data);
        
        auth()->login($user);
        
        return redirect('home');

    }

    public function logoutaksi()
    {
        Auth::logout();
        return redirect('/');
    }
}