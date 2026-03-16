<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inicio</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>


</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex px-6 lg:px-8 items-center lg:justify-center flex-col">
    <nav
    class="navbar navbar-expand-sm navbar-light bg-light w-full border-b border-gray-300 mb-4 pt-6 lg:pt-8">
    <div class="flex items-center justify-between">
        <ul class="flex space-x-4">
            <li class="nav-item">
                <a href="{{ route('home.admin') }}">Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('materia.admin') }}">Materias</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('horario.admin') }}">Horarios</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('grupo.admin') }}">Grupos</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login.admin') }}">Iniciar Sesion</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('registro.admin') }}">Registrarse</a>
            </li>
        </ul>
    </div>
</nav>
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <h1 class="text-2xl font-bold">Bienvenido </h1>
        </main>
    </div>

</body>

</html>
