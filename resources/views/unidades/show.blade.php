<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Colaborador') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-semibold"></h1>
                    <p class="mt-2"><strong>Nome</strong> {{ $unidade->nome }}</p>
                    <p><strong>Código da Unidade:</strong> </p>
                    <p><strong>Data de Nascimento:</strong> </p>
                    <p><strong>Telefone:</strong> </p>
                    <p><strong>Ramal:</strong> </p>
                    <p><strong>Código do Cargo:</strong> </p>
                    <p><strong>Data de Admissão:</strong> </p>
                    <p><strong>CPF do Gestor:</strong> </p>

                    <a href="{{ route('unidades.index') }}" class="mt-4 text-blue-500 hover:underline">Voltar à lista</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
