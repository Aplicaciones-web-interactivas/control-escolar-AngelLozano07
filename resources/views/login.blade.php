@extends('layouts.base')

@section('title', 'Calificaciones')

@section('content')
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

@endsection