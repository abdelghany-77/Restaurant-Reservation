<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function LoginForm()
    {
        return view('auth.login'); // Make sure this view exists
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('homepage'); // Redirect to home if login is successful
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function RegisterForm()
    {
        return view('auth.register'); // Make sure this view exists
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $data['password'] = bcrypt($data['password']);
        \App\Models\User::create($data);

        return redirect()->route('login')->with('success', 'Account created! Please log in.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }
}
