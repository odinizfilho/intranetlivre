<!-- resources/views/intranet/config.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Configurações da Intranet') }}
        </h2>
    </x-slot>

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="p-6">
                <!-- Formulário Aqui -->
                <h3 class="mb-4 text-lg font-semibold">Configurações</h3>
                <form action="{{ route('config.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" name="titulo" id="titulo"
                            class="block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value="{{ old('titulo') ?? $config->titulo }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="logo" class="block text-sm font-medium text-gray-700">Logo</label>
                        <input type="file" name="logo" id="logo"
                            class="block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    @if ($config->getFirstMediaUrl('logo'))
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Logo Atual</label>
                            <img src="{{ $config->getFirstMediaUrl('logo') }}" alt="Logo Atual" class="mt-1">
                        </div>
                    @endif


                    <div class="mb-4">
                        <label for="cnpj" class="block text-sm font-medium text-gray-700">CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj"
                            class="block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value="{{ old('cnpj') ?? $config->cnpj }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="cep" class="block text-sm font-medium text-gray-700">CEP</label>
                        <input type="text" name="cep" id="cep"
                            class="block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value="{{ old('cep') ?? $config->cep }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="endereco" class="block text-sm font-medium text-gray-700">Endereço</label>
                        <input type="text" name="endereco" id="endereco"
                            class="block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value="{{ old('endereco') ?? $config->endereco }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="link" class="block text-sm font-medium text-gray-700">Link</label>
                        <input type="text" name="link" id="link"
                            class="block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value="{{ old('link') ?? $config->link }}" required>
                    </div>

                    <div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
