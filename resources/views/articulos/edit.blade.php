<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <h1 class="text-2xl font-bold mb-4">Editar artículos</h1>
        <form method="POST" action="{{ route('articulos.update', $articulos->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
            <label for="titulo" class="block font-medium text-gray-700">Título:</label>
                <input type="text" name="titulo" id="titulo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="{{ $articulos->titulo }}">
            </div>
            <div class="form-group">
            <label for="contenido" class="block font-medium text-gray-700">Contenido:</label>
                <textarea name="contenido" id="contenido" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $articulos->contenido }}</textarea>
            </div><br>
            <x-primary-button>Actualizar</x-primary-button>
        </form>
        </form>
    </div>
   
</x-app-layout>

