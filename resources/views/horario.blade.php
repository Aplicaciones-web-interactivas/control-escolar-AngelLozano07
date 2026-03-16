<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Horarios</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>


</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex px-6 lg:px-8 items-center lg:justify-center flex-col">
    @include('layouts.navbar')
    <div class="w-1/2 borber border-gray-300 rounded-md p-6 bg-gray-100 shadow-md">
        <form method="post" action="{{ route('horario.agregar') }}">
            @csrf

            <div class="mb-3">
                <label for="" class="form-label">Materia: </label>
                <select name="materia" id=""
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Selecciona una materia</option>
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->clave }}">{{ $materia->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Usuario: </label>
                <select name="usuario" id=""
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Selecciona un usuario</option>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->clave_institucional }}">{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Dia: </label>
                <select name="dia" id=""
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Selecciona un día</option>
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                    <option value="Sábado">Sábado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Inicio: </label>
                <input type="time"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name="hora_inicio" id="" aria-describedby="helpId" placeholder="Hora que inicia" />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fin: </label>
                <input type="time"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name="hora_fin" id="" aria-describedby="helpId" placeholder="Hora que termina" />
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Agregar Horario
            </button>
        </form>
    </div>

    @if (session('error'))
        <div class="w-1/2 borber border-gray-300 rounded-md p-4 bg-red-100 shadow-md mt-6 text-red-700">
            {!! nl2br(e(session('error'))) !!}
        </div>
    @endif

    <div class="w-1/2 borber border-gray-300 rounded-md p-4 bg-gray-100 shadow-md mt-6">

        <table class="table-auto text-center w-full border-collapse border border-gray-300 rounded-lg bg-white">

            <thead class="bg-gray-200">
                <tr>
                    <th class="py-2">Id</th>
                    <th>Materia</th>
                    <th>Usuario</th>
                    <th>Dia</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Opciones</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-300">
                @foreach ($horarios as $horario)
                    <tr>
                        <td>{{ $horario->id }}</td>
                        <td>{{ $horario->materia->nombre }}</td>
                        <td>{{ $horario->usuario->nombre }}</td>
                        <td>{{ $horario->dia }}</td>
                        <td>{{ $horario->hora_inicio }}</td>
                        <td>{{ $horario->hora_fin }}</td>
                        <td class="text-center gap-4">

                            <button
                                class="bg-green-500 text-white font-bold py-1 px-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                <a href="{{ route('horario.mostrar', $horario->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M10 2a8 8 0 100 16 8 8 0 000-16zm1.707 11.707a1 1 0 01-1.414-1.414L11.586 10l-1.293-1.293a1 1 0 111.414-1.414L13.414 10l1.293 1.293z" />
                                    </svg>
                                </a>
                            </button>

                            <form method='post' action='{{ route('horario.eliminar', $horario->id) }}'>

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

</body>

</html>
