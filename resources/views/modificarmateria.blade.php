<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Modificar Materia</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>


</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

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

</body>

</html>
