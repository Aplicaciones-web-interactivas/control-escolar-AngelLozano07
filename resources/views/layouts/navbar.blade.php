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
                <a href="{{ route('inscripcion.admin') }}">Inscripciones</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('calificacion.admin') }}">Calificaciones</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tarea.admin') }}">Tareas</a>
            </li>
        </ul>
        <div class="flex items-center space-x-4">
            <span class="text-gray-600">{{ auth()->user()->nombre }}</span>
            <form method="POST" action="{{ route('logout.usuario') }}">
                @csrf
                <button type="submit"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>
