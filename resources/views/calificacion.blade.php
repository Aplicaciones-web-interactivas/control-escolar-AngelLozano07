@extends('layouts.base')

@section('title', 'Calificaciones')

@section('content')
    @include('layouts.navbar')
    <button onclick="abrirModal('modal1')" class="bg-blue-500 text-white px-4 py-2 rounded">
        Agregar Calificación
    </button>

    <x-modal id="modal1" titulo="Crear tarea">
        <form method="post" action="{{ route('calificacion.agregar') }}">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Usuario: </label>
                <select name="usuario_id" id=""
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Selecciona un usuario</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->clave_institucional }}">{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
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

            <div class="mb-3">
                <label for="" class="form-label">Calificación: </label>
                <input type="number" step="0.01" min="0" max="100"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name="calificacion" id="" aria-describedby="helpId" placeholder="Calificación del usuario" />
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Agregar Calificación
            </button>
        </form>
    </x-modal>
    <!-- <div class="w-1/2 borber border-gray-300 rounded-md p-6 bg-gray-100 shadow-md"></div> -->

    @if (session('error'))
        <div class="w-1/2 borber border-gray-300 rounded-md p-4 bg-red-100 shadow-md mt-6 text-red-700">
            {!! nl2br(e(session('error'))) !!}
        </div>
    @endif

    <div class="w-1/2 borber border-gray-300 rounded-md p-4 bg-gray-100 shadow-md mt-6">

        <table class="table-auto text-center w-full border-collapse border border-gray-300 rounded-lg bg-white">

            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2">Id grupo</th>
                    <th>Usuario</th>
                    <th>Grupo</th>
                    <th>Calificación</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-300">
                @foreach ($calificaciones as $calificacion)
                    <tr>
                        <td>{{ $calificacion->id }}</td>
                        <td>{{ $calificacion->usuario->nombre }}</td>
                        <td>{{ $calificacion->grupo->nombre }}</td>
                        <td>{{ $calificacion->calificacion }}</td>
                        <td class="text-center gap-4">

                            <button
                                class="bg-green-500 text-white font-bold py-1 px-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <a href="{{ route('calificacion.mostrar', $calificacion->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M10 2a8 8 0 100 16 8 8 0 000-16zm1.707 11.707a1 1 0 01-1.414-1.414L11.586 10l-1.293-1.293a1 1 0 111.414-1.414L13.414 10l1.293 1.293z" />
                                    </svg>
                                </a>
                            </button>

                            <form method='post' action='{{ route('calificacion.eliminar', $calificacion->id) }}'>

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
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
@endsection