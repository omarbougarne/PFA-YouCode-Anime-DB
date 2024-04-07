<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create() {
        return view('users.register');
    }


    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => 'required|confirmed|min:6',
            'role' => 'required|string|in:user,admin,mod',
        ]);


        $formFields['password'] = bcrypt($formFields['password']);


        $user = User::create($formFields);


        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }


    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/register')->with('message', 'You have been logged out!');

    }


    public function login() {
        return view('users.login');
    }


    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            $user = auth()->user();

            // // Check user role and redirect accordingly
            // if ($user->role === 'admin') {
            //     return redirect('/admin/dashboard');
            // } elseif ($user->role === 'mod') {
            //     return redirect('/mod/dashboard');
            // } else {
            //     return redirect('/')->with('message', 'You are now logged in!');
            // }
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

}
