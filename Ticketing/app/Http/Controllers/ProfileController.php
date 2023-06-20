<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return (view('profile'));
    }
    public function update(Request $request)
    {

        $user = auth()->user();
        $rules = [
            'name' => 'max:255',
            'email' => 'unique:users'
        ];
        $validatedData = $request->validate($rules);

        if ($request->name && $request->name != $user->name) {
            $validatedData['name'] = $request->name;
        } else {
            $validatedData['name'] = $user->name;
        }
        if ($request->email && $request->email != $user->email) {
            $validatedData['email'] = $request->email;
        } else {
            $validatedData['email'] = $user->email;
        }

        User::where('id', $user->id)->update($validatedData);
        return redirect('/profile/data')->with('success', 'Succesfully Updated');
    }
}
