<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do setor') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-semibold">{{ $setor->nome }}</h1>
                    <p class="mt-2"><strong>Código do setor:</strong> {{ $setor->cod_setor }}</p>
                    <!-- Adicione outras informações relacionadas ao setor aqui -->
                    <a href="{{ route('setor.index') }}" class="mt-4 text-blue-500 hover:underline">Voltar à lista</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
