@extends('layouts.base')

@section('title', 'Tareas')

@section('content')
    <div class="w-1/2 borber border-gray-300 rounded-md p-6 bg-gray-100 shadow-md">
        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-3">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <form method="post" enctype="multipart/form-data" action="{{ route('tarea.modificar', $tarea->id) }}">
            @csrf

            @if(auth()->user()->rol == 'alumno')
                <div class="mb-3">
                    <label for="" class="form-label">Archivo: </label>
                    <input type="file"
                        class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        name="archivo" id="" aria-describedby="helpId" placeholder="Sube tu tarea" />
                </div>
            @else
                <div class="mb-3">
                    <label for="" class="form-label">Título: </label>
                    <input type="text"
                        class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        name="titulo" id="" aria-describedby="helpId" placeholder="Título de la tarea" value="{{ $tarea->titulo }}" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Descripción: </label>
                    <textarea
                        class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        name="descripcion" id="" aria-describedby="helpId" placeholder="Descripción de la tarea">{{ $tarea->descripcion }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Fecha de entrega: </label>
                    <input type="date"
                        class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        name="fecha_vencimiento" id="" aria-describedby="helpId" placeholder="Fecha de entrega" value="{{ $tarea->fecha_vencimiento }}" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Grupo: </label>
                    <select name="grupo_id" id=""
                        class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Selecciona un grupo</option>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}" {{ $tarea->grupo_id == $grupo->id ? 'selected' : '' }}>{{ $grupo->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <button type="submit"
                class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                @if(auth()->user()->rol == 'alumno')
                    Subir Tarea
                @else
                    Modificar Tarea
                @endif
            </button>
        </form>
    </div>

    @if (session('error'))
        <div>
            {{  session('error') }}
        </div>
    @endif

@endsection