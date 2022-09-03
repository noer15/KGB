<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('/auth.login');
    }

    public function login(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validator)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
