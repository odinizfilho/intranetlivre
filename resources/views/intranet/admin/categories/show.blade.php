<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <div class="mt-8 text-2xl">
                        Detalhes da Categoria
                    </div>
                </div>

                <div class="grid grid-cols-1 bg-gray-200 bg-opacity-25">
                    <div class="p-6">
                        <p>Categoria: {{ $category->name }}</p>
                        <!-- Adicione mais detalhes da categoria, se necessário -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
