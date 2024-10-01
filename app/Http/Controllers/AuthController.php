<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
{

    $credentials = $request->validate([
        'username' => ['required', 'string'],
        'password' => ['required'],
    ]);

    // if (auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {
    //     $request->session()->regenerate();

    //     return redirect()->intended('/dashboard'); // Redirect ke dashboard
    // }

    // Jika gagal
    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ]);
}
}
