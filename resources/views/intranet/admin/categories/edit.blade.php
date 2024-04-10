<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Editar Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <div class="mt-8 text-2xl">
                        Editar Categoria
                    </div>
                </div>

                <div class="grid grid-cols-1 bg-gray-200 bg-opacity-25">
                    <div class="p-6">
                        <!-- Exibir mensagens de erro -->
                        @if ($errors->any())
                            <div class="mb-4">
                                <div class="font-medium text-red-600">
                                    {{ __('Ops! Algo deu errado.') }}
                                </div>

                                <ul class="mt-3 text-sm text-red-600 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Formulário de edição de categoria -->
                        <form action="{{ route('categories.update', $category->slug) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-label for="name" :value="__('Nome')" />
                                <x-input id="name" class="block w-full mt-1" type="text" name="name"
                                    :value="$category->name" required autofocus />
                            </div>

                            <div>
                                <x-label for="slug" :value="__('Slug')" />
                                <x-input id="slug" class="block w-full mt-1" type="text" name="slug"
                                    :value="$category->slug" required />
                            </div>

                            <div>
                                <x-label for="description" :value="__('Descrição')" />
                                <textarea id="description" name="description" class="block w-full mt-1">{{ $category->description }}</textarea>
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
    </div>
</x-app-layout>
