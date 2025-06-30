<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function mostrarLogin()
    {
        return view('iniciar_sesion.login');
    }

    public function procesarLogin(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required',
            'contrasena' => 'required',
        ]);

        $usuario = Usuario::where('nombre_usuario', $request->nombre_usuario)->first();
        //$usuario && $request->contrasena === $usuario->contrasena
        if ($usuario && Hash::check($request->contrasena, $usuario->contrasena)) { //$usuario && Hash::check($request->contrasena, $usuario->contrasena)
            Auth::login($usuario);

            switch ($usuario->rol) {
                case 'Administrador':
                    return redirect()->route('estudiante.index');
                case 'Profesor':
                    return redirect()->route('profesor.panel');
                case 'Tutor':
                    return redirect()->route('tutor.panel');
                default:
                    return redirect('/');
            }
        }

        return back()->withErrors(['nombre_usuario' => 'Credenciales inválidas']);
    }

    public function logout(Request $request)    
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
