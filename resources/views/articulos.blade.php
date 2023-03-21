<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form action="{{ route('articulos.store') }}" method="GET">
            @csrf
            <h1 class="text-2xl font-bold mb-4">Publicar artículos</h1>
            <div class="mb-4">
                <label for="titulo" class="block font-medium text-gray-700">Título:</label>
                <input type="text" name="titulo" id="titulo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>
            <div class="mb-4">
                <label for="contenido" class="block font-medium text-gray-700">Contenido:</label>
                <textarea name="contenido" id="contenido" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                <x-input-error :messages="$errors->get('contenido')" class="mt-2" />
            </div>
            <x-primary-button>{{ __('Publicar') }}</x-primary-button>
        </form>
    </div>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-2xl font-bold mb-4">Artículos publicados</h1>
            @foreach ($articulos as $articulo)
                <div class="bg-white rounded-lg shadow-md p-4">
                <label for="titulo" class="block font-medium text-gray-700">Publicado por:</label>
                    <div class="font-medium text-lg mb-2">{{ $articulo->user_name }}</div>
                    <div class="font-medium text-lg mb-2">{{ $articulo->titulo }}</div>
                    <div class="text-gray-700">{{ $articulo->contenido }}</div><br><br>
                    @if(Auth::user() && Auth::user()->id == $articulo->user_id)
                    <form action="{{ route('articulos.destroy', $articulo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-primary-button>{{ __('Eliminar') }}</x-primary-button>
                    <x-primary-button><a href="{{ route('articulos.edit', $articulo->id) }}" class="btn btn-primary">Editar</a></x-primary-button>
                    @endif
                </div>
                <br><br>
            @endforeach
    </div>
</x-app-layout>
