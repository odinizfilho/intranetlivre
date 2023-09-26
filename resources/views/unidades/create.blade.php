<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Unidade') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('unidades.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="cod_unidade" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Código da Unidade') }}</label>
                            <input type="text" name="cod_unidade" id="cod_unidade" class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('cod_unidade') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="nome" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nome') }}</label>
                            <input type="text" name="nome" id="nome" class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('nome') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="descricao" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Descrição') }}</label>
                            <textarea name="descricao" id="descricao" class="border border-gray-400 rounded w-full py-2 px-3" rows="4">{{ old('descricao') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="endereco" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Endereço') }}</label>
                            <input type="text" name="endereco" id="endereco" class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('endereco') }}">
                        </div>

                        <div class="mb-4">
                            <label for="cep" class="block text-gray-700 text-sm font-bold mb-2">{{ __('CEP') }}</label>
                            <input type="text" name="cep" id="cep" class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('cep') }}">
                        </div>

                        <div class="mb-4">
                            <label for="telefone" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Telefone') }}</label>
                            <input type="text" name="telefone" id="telefone" class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('telefone') }}">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-mail') }}</label>
                            <input type="email" name="email" id="email" class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('email') }}">
                        </div>

                        <div class="mb-4">
                            <label for="latitude" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Latitude') }}</label>
                            <input type="text" name="latitude" id="latitude" class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('latitude') }}">
                        </div>

                        <div class="mb-4">
                            <label for="longitude" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Longitude') }}</label>
                            <input type="text" name="longitude" id="longitude" class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('longitude') }}">
                        </div>

                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">{{ __('Criar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
