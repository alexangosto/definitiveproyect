<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-bold mb-4">Artículos publicados</h1>
            @foreach ($articulos as $articulo)
            @if(Auth::user() && Auth::user()->id == $articulo->user_id)
                <div class="bg-white rounded-lg shadow-md p-4">
                <label for="titulo" class="block font-medium text-gray-700">Publicado por:</label>
                    <div class="font-medium text-lg mb-2">{{ $articulo->user_name }}</div>
                    <div class="font-medium text-lg mb-2">{{ $articulo->titulo }}</div>
                    <div class="text-gray-700">{{ $articulo->contenido }}</div><br><br>
                </div>
                <br><br>
                @endif
            @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
