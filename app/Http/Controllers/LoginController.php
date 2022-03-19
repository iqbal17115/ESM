<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'mobile' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->hasAnyRole('admin|user')) {
                return redirect('/admin');
            } else {
                return redirect(route('home'));
            }
        }

        return back()->withErrors([
            'mobile' => 'The provided credentials do not match our records.',
        ]);
    }
}
