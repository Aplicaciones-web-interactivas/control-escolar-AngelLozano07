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
        </ul>
    </div>
</nav>
