<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Cargo') }}
        </h2>
    </x-slot>

    <x-validation-errors class="mb-4" />

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <form action="{{ route('cargos.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="cod_cargo"
                            class="block text-gray-700 text-sm font-bold mb-2">{{ __('Código do Cargo') }}</label>
                        <input type="text" name="cod_cargo" id="cod_cargo"
                            class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('cod_cargo') }}"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="nome"
                            class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nome do Cargo') }}</label>
                        <input type="text" name="nome" id="nome"
                            class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('nome') }}"
                            required>
                    </div>

                    <!-- Outros campos relacionados ao Cargo -->

                    <div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">{{ __('Criar') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
