<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\materia;
use App\Models\horario;
use App\Models\grupo;
use App\Models\usuario;
use App\Models\inscripcion;
use App\Models\calificacion;

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
        $horarios = horario::all();

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
        $horario = new horario();
        $horario->materia_id = $request->materia;
        $horario->usuario_id = $request->usuario;
        $horario->dia = $request->dia;
        $horario->hora_inicio = $request->hora_inicio;
        $horario->hora_fin = $request->hora_fin;
        $horario->save();
        return redirect()->back()->with('success', 'Horario agregado correctamente');
    }

    public function mostrarhorario($id)
    {
        $horario = horario::find($id);
        if ($horario) {
            $materias = materia::all();
            $usuarios = usuario::all();
            return view('modificarhorario')->with('horario', $horario)->with('materias', $materias)->with('usuarios', $usuarios);
        }else {
            return redirect()->back()->with('error', 'Horario no encontrado');
        }
    }

    public function modificarhorario(Request $request, $id)
    {
        $horario = horario::find($id);
        if ($horario) {
            $horario->materia_id = $request->materia;
            $horario->usuario_id = $request->usuario;
            $horario->dia = $request->dia;
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
        $horarios = horario::all();
        return view('grupo')->with('grupos', $grupos)->with('horarios', $horarios);
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
        $horario = horario::where('id', $request->horario_id)->first();
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
            $horarios = horario::all();
            return view('modificargrupo')->with('grupo', $grupo)->with('horarios', $horarios);
        }else {
            return redirect()->back()->with('error', 'Grupo no encontrado');
        }
    }

    public function modificargrupo(Request $request, $id)
    {
        $horario = horario::where('id', $request->horario_id)->first();
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

    public function inscripciones()
    {
        $inscripciones = inscripcion::all();
        $usuarios = usuario::all();
        $grupos = grupo::all();
        return view('inscripcion')->with('inscripciones', $inscripciones)->with('usuarios', $usuarios)->with('grupos', $grupos);
    }

    public function eliminarinscripcion($id)
    {
        $inscripcion = inscripcion::find($id);
        if ($inscripcion) {
            $inscripcion->delete();
        }else {
            return redirect()->back()->with('error', 'Inscripción no encontrada');
        }
        return redirect()->back()->with('success', 'Inscripción eliminada correctamente');
    }

    public function agregarinscripcion(Request $request)
    {
        $usuario = usuario::where('id', $request->usuario_id)->first();
        if (!$usuario) {
            return redirect()->back()->with('error', "Usuario no encontrado.\n");
        }
        $grupo = grupo::where('id', $request->grupo_id)->first();
        if (!$grupo) {
            return redirect()->back()->with('error', "Grupo no encontrado.\n");
        }

        $inscripcion = new inscripcion();
        $inscripcion->usuario_id = $request->usuario_id;
        $inscripcion->grupo_id = $request->grupo_id;
        $inscripcion->save();
        return redirect()->back()->with('success', 'Inscripción agregada correctamente');
    }

    public function mostrarinscripcion($id)
    {
        $inscripcion = inscripcion::find($id);
        if ($inscripcion) {
            return view('modificarinscripcion')->with('inscripcion', $inscripcion);
        }else {
            return redirect()->back()->with('error', 'Inscripción no encontrada');
        }
    }

    public function modificarinscripcion(Request $request, $id)
    {
        $usuario = usuario::where('id', $request->usuario_id)->first();
        if (!$usuario) {
            return redirect()->back()->with('error', "Usuario no encontrado.\n");
        }

        $grupo = grupo::where('id', $request->grupo_id)->first();
        if (!$grupo) {
            return redirect()->back()->with('error', "Grupo no encontrado.\n");
        }

        $inscripcion = inscripcion::find($id);
        if ($inscripcion) {
            $inscripcion->usuario_id = $request->usuario_id;
            $inscripcion->grupo_id = $request->grupo_id;
            $inscripcion->save();
            return redirect('/inscripciones')->with('success', 'Inscripción modificada correctamente');
        }else {
            return redirect()->back()->with('error', 'Inscripción no encontrada');
        }
    }
}

