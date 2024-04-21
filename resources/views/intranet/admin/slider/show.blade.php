<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Detalhes da Imagem do Slider') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <div class="mt-8 text-2xl">
                        Detalhes da Imagem do Slider
                    </div>
                </div>

                <div class="grid grid-cols-1 bg-gray-200 bg-opacity-25">
                    <div class="p-6">
                        <div class="my-4">
                            <img src="{{ asset('storage/' . $sliderImage->src) }}" alt="{{ $sliderImage->title }}">
                            <div class="mt-2">
                                <h3 class="text-lg font-semibold">{{ $sliderImage->title }}</h3>
                                <p>{{ $sliderImage->content }}</p>
                                <a href="{{ $sliderImage->link }}"
                                    class="text-blue-500 hover:underline">{{ $sliderImage->link }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
