<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\materia;
use App\Models\horario;
use App\Models\grupo;
use App\Models\usuario;

class AdminController extends Controller
{
    public function index()
    {
        return view('home');
    }


    public function materias()
    {
        $materias = materia::all();
        return view('materias')->with('materias', $materias);
    }

    public function eliminarmateria($id)
    {
        $materia = materia::find($id);
        if ($materia) {
            $materia->delete();
        }else {
            return redirect()->back()->with('error', 'Materia no encontrada');
        }
        return redirect()->back()->with('success', 'Materia eliminada correctamente');
    }

    public function agregarmateria(Request $request)
    {
        $materia = new materia();
        $materia->nombre = $request->nombre_materia;
        $materia->clave = $request->clave_materia;
        $materia->save();
        return redirect()->back()->with('success', 'Materia agregada correctamente');
    }

    public function mostrarmateria($id)
    {
        $materia = materia::find($id);
        if ($materia) {
            return view('modificarmateria')->with('materia', $materia);
        }else {
            return redirect()->back()->with('error', 'Materia no encontrada');
        }
    }

    public function modificarmateria(Request $request, $id)
    {
        $materia = materia::find($id);
        if ($materia) {
            $materia->nombre = $request->nombre_materia;
            $materia->clave = $request->clave_materia;
            $materia->save();
            return redirect('/materias')->with('success', 'Materia modificada correctamente');
        }else {
            return redirect()->back()->with('error', 'Materia no encontrada');
        }
    }

    public function horarios()
    {
        $horarios = DB::table('horarios')
        ->join('materias', 'horarios.materia_id', '=', 'materias.clave')
        ->join('usuarios', 'horarios.usuario_id', '=', 'usuarios.clave_institucional')
        ->select(
            'horarios.id',
            'horarios.clave',
            'materias.nombre as materia',
            'usuarios.nombre as usuario',
            'horarios.hora_inicio',
            'horarios.hora_fin'
        )
        ->get();

        $materias = materia::all();
        $usuarios = usuario::all();
        return view('horario')->with('horarios', $horarios)->with('materias', $materias)->with('usuarios', $usuarios);
    }

    public function eliminarhorario($id)
    {
        $horario = horario::find($id);
        if ($horario) {
            $horario->delete();
        }else {
            return redirect()->back()->with('error', 'Horario no encontrado');
        }
        return redirect()->back()->with('success', 'Horario eliminado correctamente');
    }

    public function agregarhorario(Request $request)
    {
        $usuario = usuario::where('clave_institucional', $request->usuario)->first();
        $materia = materia::where('clave', $request->materia)->first();
        $mensajeError = '';
        if (!$usuario) {
            $mensajeError .= "Usuario no encontrado.\n";
        }
        if (!$materia) {
            $mensajeError .= "Materia no encontrada.\n";
        }
        if ($mensajeError) {
            return redirect()->back()->with('error', $mensajeError);
        }
        $horario = new horario();
        $horario->clave = $request->clave;
        $horario->materia_id = $request->materia;
        $horario->usuario_id = $request->usuario;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->save();
        return redirect()->back()->with('success', 'Horario agregado correctamente');
    }

    public function mostrarhorario($id)
    {
        $horario = horario::find($id);
        if ($horario) {
            return view('modificarhorario')->with('horario', $horario);
        }else {
            return redirect()->back()->with('error', 'Horario no encontrado');
        }
    }

    public function modificarhorario(Request $request, $id)
    {
        $horario = horario::find($id);
        if ($horario) {
            $horario->materia_id = $request->materia;
            $horario->hora_inicio = $request->hora_inicio;
            $horario->hora_fin = $request->hora_fin;
            $horario->save();
            return redirect('/horarios')->with('success', 'Horario modificado correctamente');
        }else {
            return redirect()->back()->with('error', 'Horario no encontrado');
        }
    }

    public function grupos()
    {
        $grupos = grupo::all();
        return view('grupo')->with('grupos', $grupos);
    }

    public function eliminargrupo($id)
    {
        $grupo = grupo::find($id);
        if ($grupo) {
            $grupo->delete();
        }else {
            return redirect()->back()->with('error', 'Grupo no encontrado');
        }
        return redirect()->back()->with('success', 'Grupo eliminado correctamente');
    }

    public function agregargrupo(Request $request)
    {
        $horario = horario::where('clave', $request->horario_id)->first();
        if (!$horario) {
            return redirect()->back()->with('error', "Horario no encontrado.\n");
        }

        $grupo = new grupo();
        $grupo->nombre = $request->nombre;
        $grupo->horario_id = $request->horario_id;
        $grupo->save();
        return redirect()->back()->with('success', 'Grupo agregado correctamente');
    }

    public function mostrargrupo($id)
    {
        $grupo = grupo::find($id);
        if ($grupo) {
            return view('modificargrupo')->with('grupo', $grupo);
        }else {
            return redirect()->back()->with('error', 'Grupo no encontrado');
        }
    }

    public function modificargrupo(Request $request, $id)
    {
        $horario = horario::where('clave', $request->horario_id)->first();
        if (!$horario) {
            return redirect()->back()->with('error', "Horario no encontrado.\n");
        }

        $grupo = grupo::find($id);
        if ($grupo) {
            $grupo->nombre = $request->nombre;
            $grupo->horario_id = $request->horario_id;
            $grupo->save();
            return redirect('/grupos')->with('success', 'Grupo modificado correctamente');
        }else {
            return redirect()->back()->with('error', 'Grupo no encontrado');
        }
    }
}

