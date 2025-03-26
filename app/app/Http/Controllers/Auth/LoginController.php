<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Credenciales predefinidas
        $predefinedEmail = 'a@gmail.com';
        $predefinedPassword = 'asd';

        if ($credentials['email'] === $predefinedEmail && $credentials['password'] === $predefinedPassword) {
            // Simular autenticación exitosa
            $request->session()->regenerate();
            return redirect()->route('personas.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
