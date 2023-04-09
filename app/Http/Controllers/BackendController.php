<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BackendController extends Controller
{
    
    public function login(){
        return view('admin.login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
           return redirect()->route('pharmacy.admin.dashboard');
        }

        return back()->with([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->intended(route('pharmacy.admin.login'));
    }
}
