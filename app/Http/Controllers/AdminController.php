<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\materia;
use App\Models\horario;
use App\Models\grupo;
use App\Models\User;
use App\Models\inscripcion;
use App\Models\calificacion;
use App\Models\tarea;
use Illuminate\Support\Facades\Auth;

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
        $usuarios = User::all();
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
            $usuarios = User::all();
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
        $usuarios = User::all();
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
        $usuario = User::where('clave_institucional', $request->usuario_id)->first();
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
        $usuarios = User::all();
        $grupos = grupo::all();

        $inscripcion = inscripcion::find($id);
        if ($inscripcion) {
            return view('modificarinscripcion')->with('inscripcion', $inscripcion)->with('usuarios', $usuarios)->with('grupos', $grupos);
        }else {
            return redirect()->back()->with('error', 'Inscripción no encontrada');
        }
    }

    public function modificarinscripcion(Request $request, $id)
    {
        $usuario = User::where('clave_institucional', $request->usuario_id)->first();
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

    public function calificaciones()
    {
        $calificaciones = calificacion::all();
        $usuarios = User::all();
        $grupos = grupo::all();
        return view('calificacion')->with('calificaciones', $calificaciones)->with('usuarios', $usuarios)->with('grupos', $grupos);
    }

    public function eliminarcalificacion($id)
    {
        $calificacion = calificacion::find($id);
        if ($calificacion) {
            $calificacion->delete();
        }else {
            return redirect()->back()->with('error', 'Calificación no encontrada');
        }
        return redirect()->back()->with('success', 'Calificación eliminada correctamente');
    }

    public function agregarcalificacion(Request $request)
    {
        $usuario = User::where('clave_institucional', $request->usuario_id)->first();
        if (!$usuario) {
            return redirect()->back()->with('error', "Usuario no encontrado.\n");
        }
        $grupo = grupo::where('id', $request->grupo_id)->first();
        if (!$grupo) {
            return redirect()->back()->with('error', "Grupo no encontrado.\n");
        }

        $calificacion = new calificacion();
        $calificacion->usuario_id = $request->usuario_id;
        $calificacion->grupo_id = $request->grupo_id;
        $calificacion->calificacion = $request->calificacion;
        $calificacion->save();
        return redirect()->back()->with('success', 'Calificación agregada correctamente');
    }

    public function mostrarcalificacion($id)
    {
        $usuarios = User::all();
        $grupos = grupo::all();
        $calificacion = calificacion::find($id);
        if ($calificacion) {
            return view('modificarcalificacion')->with('calificacion', $calificacion)->with('usuarios', $usuarios)->with('grupos', $grupos);
        }else {
            return redirect()->back()->with('error', 'Calificación no encontrada');
        }
    }

    public function modificarcalificacion(Request $request, $id)
    {
        $usuario = User::where('clave_institucional', $request->usuario_id)->first();
        if (!$usuario) {
            return redirect()->back()->with('error', "Usuario no encontrado.\n");
        }

        $grupo = grupo::where('id', $request->grupo_id)->first();
        if (!$grupo) {
            return redirect()->back()->with('error', "Grupo no encontrado.\n");
        }

        $calificacion = calificacion::find($id);
        if ($calificacion) {
            $calificacion->usuario_id = $request->usuario_id;
            $calificacion->grupo_id = $request->grupo_id;
            $calificacion->calificacion = $request->calificacion;
            $calificacion->save();
            return redirect('/calificaciones')->with('success', 'Calificación modificada correctamente');
        }else {
            return redirect()->back()->with('error', 'Calificación no encontrada');
        }
    }

    public function tarea()
    {
        $grupos = grupo::all();
        $tareas = tarea::all();
        return view('tarea')->with('tareas', $tareas)->with('grupos', $grupos);
    }

    public function eliminartarea($id)
    {
        $tarea = tarea::find($id);
        if ($tarea) {
            $tarea->delete();
        }else {
            return redirect()->back()->with('error', 'Tarea no encontrada');
        }
        return redirect()->back()->with('success', 'Tarea eliminada correctamente');
    }

    public function agregartarea(Request $request)
    {
        $grupo = grupo::where('id', $request->grupo_id)->first();
        if (!$grupo) {
            return redirect()->back()->with('error', "Grupo no encontrado.\n");
        }

        $tarea = new tarea();
        $tarea->titulo = $request->titulo;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_vencimiento = $request->fecha_vencimiento;
        $tarea->grupo_id = $request->grupo_id;
        $tarea->save();
        return redirect()->back()->with('success', 'Tarea agregada correctamente');
    }

    public function mostrartarea($id)
    {
        $grupos = grupo::all();
        $tarea = tarea::find($id);
        if ($tarea) {
            return view('modificartarea')->with('tarea', $tarea)->with('grupos', $grupos);
        }else {
            return redirect()->back()->with('error', 'Tarea no encontrada');
        }
    }

    public function modificartarea(Request $request, $id)
    {
        $grupo = grupo::where('id', $request->grupo_id)->first();
        if (!$grupo && Auth::user()->rol != 'alumno') {
            return redirect()->back()->with('error', "Grupo no encontrado.\n");
        }

        $tarea = tarea::find($id);
        if ($tarea) {
            if(Auth::user()->rol == 'alumno') {
                $archivo = $request->file('archivo');
                $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
                $rutaArchivo = $archivo->storeAs('tareas', $nombreArchivo, 'public');
                $tarea->ruta_archivo = $rutaArchivo;
                $tarea->save();
                return redirect('/tareas')->with('success', 'Tarea entregada correctamente');
            }else{
                $tarea->titulo = $request->titulo;
                $tarea->descripcion = $request->descripcion;
                $tarea->fecha_vencimiento = $request->fecha_vencimiento;
                $tarea->grupo_id = $request->grupo_id;
                $tarea->save();
                return redirect('/tareas')->with('success', 'Tarea modificada correctamente');
            }
        }else {
            return redirect()->back()->with('error', 'Tarea no encontrada');
        }
    }
}

