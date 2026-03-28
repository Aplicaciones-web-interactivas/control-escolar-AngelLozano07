<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    public function InicioSesion()
    {
        return view('login');
    }

    public function InicioRegistro()
    {
        return view('registro');
    }

    public function IniciarSesion(Request $request)
    {
        $credenciales = [
        'clave_institucional' => $request->clave,
        'password' => $request->password
        ];

        if (Auth::attempt($credenciales)) {
            // Usuario autenticado correctamente
            return redirect()->route('home.admin');
        } else {
            return back()->with('error', 'Credenciales inválidas');
        }
    }

    public function CerrarSesion(Request $request)
    {
        Auth::logout();
        return redirect()->route('login.admin');
    }

    public function Registro(Request $request){
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('error', 'Las contraseñas no coinciden');
        }else if (User::where('clave_institucional', $request->clave)->exists()) {
            return redirect()->back()->with('error', 'La clave institucional ya está registrada');
        }
        $usuario = new User();
        $usuario->nombre = $request->nombre;
        $usuario->clave_institucional = $request->clave;
        $usuario->password = Hash::make($request->password);
        $usuario->save();
        return redirect()->back()->with('success', 'Usuario registrado exitosamente');
    }
}
