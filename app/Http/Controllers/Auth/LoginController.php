<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'usuario' => 'required',
            'password' => 'required',
        ]);

        // Credenciales predefinidas
        $predefinedUser = [
            'admin' => ['password' => 'asd', 'rol' => 'admin'],
            'recepcionista' => ['password' => '123', 'rol' => 'recepcionista']
        ];

        if (
            isset($predefinedUser[$credentials['usuario']]) &&
            $credentials['password'] === $predefinedUser[$credentials['usuario']]['password']
        ) {
            // Guardar el rol en sesión
            $request->session()->put('rol', $predefinedUser[$credentials['usuario']]['rol']);
            $request->session()->regenerate();
        
            return redirect()->route('personas.index');
        }

        return back()->withErrors([
            'usuario' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }
    
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
