@extends('layouts.base')

@section('title', 'Calificaciones')

@section('content')
    <div class="w-1/2 borber border-gray-300 rounded-md p-6 bg-gray-100 shadow-md">
        <h1 class="text-3xl font-bold mb-3">Registro</h1>
        <form method="POST" action="{{ route('registro.usuario') }}">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Nombre:</label>
                <input type="text" id="clave" name="nombre"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Clave institucional:</label>
                <input type="text" id="clave" name="clave"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Contraseña:</label>
                <input type="password" id="clave" name="password"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Confirmar contraseña:</label>
                <input type="password" id="password" name="password_confirmation"
                    class="form-control border border-gray-500 rounded-md p-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Registrarse
            </button>

            <div class="mt-3">
                <a href="{{ route('login.admin') }}">Iniciar Sesion</a>
            </div>
        </form>
    </div>

    @if (session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
@endsection