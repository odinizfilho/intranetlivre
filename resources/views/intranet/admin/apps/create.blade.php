<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adicionar Aplicativo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('apps.store') }}">
                        @csrf

                        <div>
                            <x-label for="name" :value="__('Nome do Aplicativo')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="image_url" :value="__('URL da Imagem')" />

                            <x-input id="image_url" class="block mt-1 w-full" type="url" name="image_url" :value="old('image_url')" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="app_link" :value="__('Link do Aplicativo')" />

                            <x-input id="app_link" class="block mt-1 w-full" type="url" name="app_link" :value="old('app_link')" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="active" :value="__('Ativo')" />

                            <select name="active" id="active" class="block mt-1 w-full">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button>
                                {{ __('Salvar') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:admin-apps-table/>
            </div>
        </div>
    </div>
</x-app-layout>
