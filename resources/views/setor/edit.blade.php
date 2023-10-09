<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar setor') }}
        </h2>
    </x-slot>

    <x-validation-errors class="mb-4" />

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('setor.update', $setor->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="cod_setor" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Código do setor') }}</label>
                            <input type="text" name="cod_setor" id="cod_setor" class="border border-gray-400 rounded w-full py-2 px-3" value="{{ $setor->cod_setor }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nome do setor') }}</label>
                            <input type="text" name="nome" id="nome" class="border border-gray-400 rounded w-full py-2 px-3" value="{{ $setor->nome }}" required>
                        </div>

                        <!-- Adicione outros campos relacionados ao setor aqui -->

                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">{{ __('Atualizar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
