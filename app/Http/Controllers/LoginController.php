<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin');
            }
            elseif ($user->role === 'employee') {
                return redirect()->route('dashboard');
            }

            return redirect()->intended('home');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
