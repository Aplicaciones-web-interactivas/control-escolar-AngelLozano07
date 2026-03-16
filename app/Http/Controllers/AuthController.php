<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\usuario;

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
        $clave = $request->clave;
        $password = $request->password;
        $usuario = usuario::where('clave_institucional', $clave)->first();

        if ($usuario && Hash::check($password, $usuario->password)) {
            // Inicio de sesión exitoso
            return view('home',compact('usuario'));
        } else {
            // Credenciales inválidas
            return redirect()->back()->with('error', 'Credenciales inválidas');
        }
    }

    public function Registro(Request $request){
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('error', 'Las contraseñas no coinciden');
        }else if (usuario::where('clave_institucional', $request->clave)->exists()) {
            return redirect()->back()->with('error', 'La clave institucional ya está registrada');
        }
        $usuario = new usuario();
        $usuario->nombre = $request->nombre;
        $usuario->clave_institucional = $request->clave;
        $usuario->password = Hash::make($request->password);
        $usuario->save();
        return redirect()->back()->with('success', 'Usuario registrado exitosamente');
    }
}
