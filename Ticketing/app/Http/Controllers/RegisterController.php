<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('sign.loginup');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|string|min:8'
        ]);

        // $user = User::create($validatedData);

        // if ($user) {
        //     return redirect()->route('homepage');
        // } else {
        //     return back();
        // }
        User::create($validatedData);
        session()->flash('success', 'Successfully added, please log in');
        return redirect()->route('login');
    }
}
