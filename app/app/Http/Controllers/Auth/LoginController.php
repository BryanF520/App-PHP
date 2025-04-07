<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Personas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        // Validar las credenciales
        $credentials = $request->validate([
            'nombre_uno' => 'required',
            'password' => 'required',
        ]);

        // Obtener el usuario de la base de datos
        $user = Personas::where('nombre_uno', $credentials['nombre_uno'])->first();

        // Verificar si el usuario existe y la contraseña es correcta
        if ($user && Hash::check($credentials['password'], $user->password) && ($user->rol_id == 1 || $user->rol_id == 2)) {
            // Guardar el rol, nombre y otros datos en la sesión
            Auth::guard()->login($user);
            $request->session()->put('rol', $user->rol_id);
            $request->session()->put('usuario', $user->nombre_uno);
            $request->session()->regenerate();



            // Redirigir según el rol
            return redirect()->route('home');
        }

        return back()->withErrors([
            'nombre_uno' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
