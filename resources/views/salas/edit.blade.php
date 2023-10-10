<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Sala de Reunião') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Conteúdo do formulário de edição -->
                    <form method="POST" action="{{ route('salas.update', $sala->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- Campos do formulário -->
                        <div class="mb-4">
                            <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $sala->nome }}" required />
                        </div>
                        <div class="mb-4">
                            <label for="capacidade" class="block text-gray-700 text-sm font-bold mb-2">Capacidade:</label>
                            <input type="number" name="capacidade" id="capacidade" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $sala->capacidade }}" required />
                        </div>
                        <div class="mb-4">
                            <label for="descricao" class="block text-gray-700 text-sm font-bold mb-2">Descrição:</label>
                            <textarea name="descricao" id="descricao" rows="4" class="form-textarea rounded-md shadow-sm mt-1 block w-full">{{ $sala->descricao }}</textarea>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Salvar Alterações') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
