@extends('layouts.base')

@section('title', 'Calificaciones')

@section('content')
    <div class="w-1/2 borber border-gray-300 rounded-md p-6 bg-gray-100 shadow-md">
        <form method="post" action="{{ route('materia.modificar', $materia->id) }}">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Nombre: </label>
                <input type="text"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name="nombre_materia" id="" aria-describedby="helpId" placeholder="Nombre de la materia" value="{{ $materia->nombre }}" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Clave: </label>
                <input type="text"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name="clave_materia" id="" aria-describedby="helpId" placeholder="Clave de la materia" value="{{ $materia->clave }}" />
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Modificar Materia
            </button>
        </form>
    </div>

    @if (session('error'))
        <div>
            {{  session('error') }}
        </div>
    @endif

@endsection