@extends('layouts.base')

@section('title', 'Calificaciones')

@section('content')
    @include('layouts.navbar')

    @if(auth()->user()->rol != 'alumno')
        <button onclick="abrirModal('modal1')" class="bg-blue-500 text-white px-4 py-2 rounded">
            Subir tarea
        </button>

        <x-modal id="modal1" titulo="Crear tarea">
            <form method="post" action="{{ route('tarea.agregar') }}">
                @csrf

                <div class="mb-3">
                    <label for="" class="form-label">Titulo: </label>
                    <input type="text"
                        class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        name="titulo" id="" aria-describedby="helpId" placeholder="Titulo de la tarea" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Descripción: </label>
                    <textarea
                        class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        name="descripcion" id="" aria-describedby="helpId" placeholder="Descripción de la tarea"></textarea>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Fecha de entrega: </label>
                    <input type="date"
                        class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        name="fecha_vencimiento" id="" aria-describedby="helpId" placeholder="Fecha de entrega" />
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Grupo: </label>
                    <select name="grupo_id" id=""
                        class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Selecciona un grupo</option>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit"
                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Agregar Tarea
                </button>
            </form>
        </x-modal>
    @endif

    <div class="w-1/2 borber border-gray-300 rounded-md p-4 bg-gray-100 shadow-md mt-6">

        <table class="table-auto text-center w-full border-collapse border border-gray-300 rounded-lg bg-white">

            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2">Titulo</th>
                    <th>Descripción</th>
                    <th>Fecha de entrega</th>
                    <th>Grupo</th>
                    <th>Archivo</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-300">
                @foreach ($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->titulo }}</td>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->fecha_vencimiento }}</td>
                        <td>{{ $tarea->grupo->nombre }}</td>
                        <td>{{ $tarea->ruta_archivo }}</td>
                        <td>{{ $tarea->calificacion }}</td>
                        <td class="text-center gap-4">

                            <button
                                class="bg-green-500 text-white font-bold py-1 px-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <a href="{{ route('tarea.mostrar', $tarea->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M10 2a8 8 0 100 16 8 8 0 000-16zm1.707 11.707a1 1 0 01-1.414-1.414L11.586 10l-1.293-1.293a1 1 0 111.414-1.414L13.414 10l1.293 1.293z" />
                                    </svg>
                                </a>
                            </button>

                            @if(auth()->user()->rol != 'alumno')
                                <form method='post' action='{{ route('tarea.eliminar', $tarea->id) }}'>

                                    <button
                                        class="bg-red-500 text-white font-bold py-1 px-3 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                        @csrf
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2h12a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM4.293 8.293a1 1 0 011.414 0L10 12.586l4.293-4.293a1 1 0 111.414 1.414L11.414 14l4.293 4.293a1 1 0 01-1.414 1.414L10 15.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 14l-4.293-4.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection
