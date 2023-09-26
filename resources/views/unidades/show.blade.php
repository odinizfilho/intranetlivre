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
                    <h1 class="text-2xl font-semibold">{{ $colaborador->nome }}</h1>
                    <p class="mt-2"><strong>CPF do Colaborador:</strong> {{ $colaborador->cpf_colaborador }}</p>
                    <p><strong>Código da Unidade:</strong> {{ $colaborador->cod_unidade }}</p>
                    <p><strong>Data de Nascimento:</strong> {{ $colaborador->data_nascimento }}</p>
                    <p><strong>Telefone:</strong> {{ $colaborador->telefone }}</p>
                    <p><strong>Ramal:</strong> {{ $colaborador->ramal }}</p>
                    <p><strong>Código do Cargo:</strong> {{ $colaborador->cod_cargo }}</p>
                    <p><strong>Data de Admissão:</strong> {{ $colaborador->data_admissao }}</p>
                    <p><strong>CPF do Gestor:</strong> {{ $colaborador->cpf_gestor }}</p>

                    <a href="{{ route('colaboradores.index') }}" class="mt-4 text-blue-500 hover:underline">Voltar à lista</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
