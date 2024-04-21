<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Nova Imagem do Slider') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <div class="mt-8 text-2xl">
                        Nova Imagem do Slider
                    </div>
                </div>

                <div class="grid grid-cols-1 bg-gray-200 bg-opacity-25">
                    <div class="p-6">
                        <!-- Formulário de criação de nova imagem -->
                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Campos do formulário -->
                            <div class="my-4">
                                <x-label for="title" :value="__('Título')" />
                                <x-input id="title" class="block w-full mt-1" type="text" name="title"
                                    :value="old('title')" required autofocus />
                            </div>

                            <div class="my-4">
                                <x-label for="content" :value="__('Conteúdo')" />
                                <textarea id="content" name="content" class="block w-full mt-1" required></textarea>
                            </div>

                            <div class="my-4">
                                <x-label for="link" :value="__('Link')" />
                                <x-input id="link" class="block w-full mt-1" type="text" name="link"
                                    :value="old('link')" required />
                            </div>

                            <div class="my-4">
                                <x-label for="src" :value="__('Imagem')" />
                                <x-input id="src_slider" class="block w-full mt-1" type="file" name="src_slider"
                                    required />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Salvar') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
