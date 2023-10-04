<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Slide') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-semibold">{{ $slide->title }}</h2>
                <p class="text-gray-600">Ordem de Exibição: {{ $slide->display_order }}</p>
                <!-- Outros detalhes do slide aqui -->
            </div>
        </div>
    </div>
</x-app-layout>
