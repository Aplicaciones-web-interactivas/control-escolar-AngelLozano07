@extends('layouts.base')

@section('title', 'Calificaciones')

@section('content')
    <div class="w-1/2 borber border-gray-300 rounded-md p-6 bg-gray-100 shadow-md">
        <form method="post" action="{{ route('calificacion.modificar', $calificacion->id) }}">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Usuario: </label>
                <select name="usuario_id" id=""
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Selecciona un usuario</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->clave_institucional }}" {{ $calificacion->usuario_id == $usuario->clave_institucional ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Grupo: </label>
                <select name="grupo_id" id=""
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Selecciona un grupo</option>
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id }}" {{ $calificacion->grupo_id == $grupo->id ? 'selected' : '' }}>{{ $grupo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Calificación: </label>
                <input type="number" step="0.01" min="0" max="100"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name="calificacion" id="" aria-describedby="helpId" placeholder="Calificación del usuario" value="{{ $calificacion->calificacion }}" />
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Modificar Calificación
            </button>
        </form>
    </div>

    @if (session('error'))
        <div>
            {{  session('error') }}
        </div>
    @endif
@endsection