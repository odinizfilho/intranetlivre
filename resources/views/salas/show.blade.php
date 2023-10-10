<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Sala de Reunião') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Conteúdo dos detalhes da sala de reunião -->
                    <h1 class="text-2xl font-semibold">{{ $sala->nome }}</h1>
                    <p>Capacidade: {{ $sala->capacidade }}</p>
                    <p>Descrição: {{ $sala->descricao }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
