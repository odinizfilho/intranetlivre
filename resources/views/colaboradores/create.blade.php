<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Colaborador') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('colaboradores.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="cpf_colaborador" class="block text-gray-700 text-sm font-bold mb-2">{{ __('CPF do Colaborador') }}</label>
                            <input type="text" name="cpf_colaborador" id="cpf_colaborador" class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('cpf_colaborador') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="cod_unidade" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Código da Unidade') }}</label>
                            <input type="text" name="cod_unidade" id="cod_unidade" class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('cod_unidade') }}" required>
                        </div>

                        <!-- Adicione campos para outros dados do colaborador aqui -->

                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">{{ __('Criar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
