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
        return 'login page';
    }

    public function login(Request $request)
    {

        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validator, true)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return 'login page';
    }

    public function register(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
            'level' => 'required'
        ]);

        if ($validator) {
            User::create([
                'position_id' => $request->position_id,
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'level' => $request->level
            ]);
        }

        return 'register page';
    }

    public function logout()
    {
        Auth::logout();
        return route('login');
    }
}
