<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (Auth::check()) {
            return view('profile');
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('homepage');
        }

        // return back()->withErrors([
            
        //     'email' => 'Invalid credentials',

        // ]);
        return back()->with('invalid', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }
}
