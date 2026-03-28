@extends('layouts.base')

@section('title', 'Calificaciones')

@section('content')
    <div class="w-1/2 borber border-gray-300 rounded-md p-6 bg-gray-100 shadow-md">
        <form method="post" action="{{ route('grupo.modificar', $grupo->id) }}">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Nombre: </label>
                <input type="text"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name="nombre" id="" aria-describedby="helpId" placeholder="Nombre del grupo" value="{{ $grupo->nombre }}" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Id horario: </label>
                <select name="horario_id" id=""
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Selecciona un horario</option>
                    @foreach ($horarios as $horario)
                        <option value="{{ $horario->id }}" {{ $grupo->horario_id == $horario->id ? 'selected' : '' }}>{{ $horario->id }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Modificar Grupo
            </button>
        </form>
    </div>

    @if (session('error'))
        <div>
            {{  session('error') }}
        </div>
    @endif

@endsection