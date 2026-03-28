<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Mi App')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" crossorigin="anonymous"></script>


</head>

<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex px-6 lg:px-8 items-center lg:justify-center flex-col">

    
    @yield('content')

    <script>
        window.abrirModal = function(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        window.cerrarModal = function(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>

</body>

</html>
