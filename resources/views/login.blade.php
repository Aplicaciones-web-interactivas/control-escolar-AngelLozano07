<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>


</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">

    <div class="w-1/2 borber border-gray-300 rounded-md p-6 bg-gray-100 shadow-md">
        <h1 class="text-3xl font-bold mb-3">Inicio Sesion</h1>
        <form method="post" action="{{ route('login.usuario') }}">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Clave Institucional: </label>
                <input type="text"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name="clave" id="" aria-describedby="helpId" placeholder="" />
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Contraseña: </label>
                <input type="password"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    name="password" id="" aria-describedby="helpId" placeholder="" />
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Iniciar Sesion
            </button>

            <div class="mt-3">
                <a href="{{ route('registro.admin') }}">Registrarse</a>
            </div>
        </form>
    </div>

    @if (session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif

</body>

</html>
