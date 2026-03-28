@extends('layouts.base')

@section('title', 'Calificaciones')

@section('content')
    <div class="w-1/2 borber border-gray-300 rounded-md p-6 bg-gray-100 shadow-md">
        <form method="post" action="{{ route('horario.modificar', $horario->id) }}">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Materia: </label>
                <select name="materia" id=""
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Selecciona una materia</option>
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->clave }}" {{ $horario->materia_id == $materia->clave ? 'selected' : '' }}>{{ $materia->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Usuario: </label>
                <select name="usuario" id=""
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Selecciona un usuario</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->clave_institucional }}" {{ $horario->usuario_id == $usuario->clave_institucional ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Día: </label>
                <select name="dia" id=""
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Selecciona un día</option>
                    <option value="Lunes" {{ $horario->dia == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                    <option value="Martes" {{ $horario->dia == 'Martes' ? 'selected' : '' }}>Martes</option>
                    <option value="Miércoles" {{ $horario->dia == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                    <option value="Jueves" {{ $horario->dia == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                    <option value="Viernes" {{ $horario->dia == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Inicio: </label>
                <input type="time"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name="hora_inicio" id="" aria-describedby="helpId" placeholder="Hora de inicio" value="{{ $horario->hora_inicio }}" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fin: </label>
                <input type="time"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name="hora_fin" id="" aria-describedby="helpId" placeholder="Hora de fin" value="{{ $horario->hora_fin }}" />
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Modificar Horario
            </button>
        </form>
    </div>

    @if (session('error'))
        <div>
            {{  session('error') }}
        </div>
    @endif

@endsection