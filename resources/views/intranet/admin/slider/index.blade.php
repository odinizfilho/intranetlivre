<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Imagens do Slider') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <div class="mt-8 text-2xl">
                        Imagens do Slider
                    </div>
                </div>

                <div class="grid grid-cols-1 bg-gray-200 bg-opacity-25">
                    <div class="p-6">
                        <!-- Exibir mensagens de sucesso -->
                        @if (session('success'))
                            <div class="mb-4">
                                <div class="font-medium text-green-600">
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif

                        <div class="mb-4">
                            <a href="{{ route('slider.create') }}"
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Criar Novo
                                Slide</a>
                        </div>
                        <div class="relative max-w-screen-xl px-6 py-8 mx-auto overflow-hidden">
                            <div class="flex space-x-4 overflow-x-auto" style="scroll-snap-type: x mandatory;">
                                @foreach ($sliderImages as $image)
                                    <div x-data="{ isOpen: false }"
                                        class="relative flex-shrink-0 w-64 border border-gray-300 rounded-lg bg-gradient-to-r">
                                        <div class="relative p-4">
                                            <!-- Dropdown menu -->
                                            <div x-show.transition="isOpen" @click.away="isOpen = false"
                                                class="absolute left-0 w-48 mt-2 bg-white rounded-md shadow-lg"
                                                id="imageDropdownMenu" aria-labelledby="imageDropdownToggle">
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Editar</a>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Excluir</a>
                                            </div>

                                            <h2 class="text-lg font-semibold">{{ $image->title }}</h2>
                                            <p>{{ strlen($image->content) > 95 ? substr($image->content, 0, 45) . '...' : $image->content }}
                                            </p>

                                            <button @click="isOpen = !isOpen" class="absolute top-0 right-0"
                                                aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 6a2 2 0 100-4 2 2 0 000 4zM12 12a2 2 0 100-4 2 2 0 000 4zM12 18a2 2 0 100-4 2 2 0 000 4z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
