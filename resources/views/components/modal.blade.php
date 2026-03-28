<div id="{{ $id }}" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">

    <div class="bg-white rounded-lg p-6 w-96">
        
        <h2 class="text-xl font-bold mb-4">{{ $titulo }}</h2>

        {{ $slot }}

        <div class="flex justify-end mt-4">
            <button onclick="cerrarModal('{{ $id }}')" 
                class="bg-gray-400 text-white px-4 py-2 rounded">
                Cerrar
            </button>
        </div>

    </div>

</div>