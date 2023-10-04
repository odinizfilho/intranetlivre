<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Slide') }}
        </h2>
    </x-slot>

    <x-validation-errors class="mb-4" />

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <form action="{{ route('slides.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="image_url" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Imagem do Slide') }}
                        </label>
                        <input type="file" name="image_url" id="image_url"
                            class="border border-gray-400 rounded w-full py-2 px-3" required>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Título') }}
                        </label>
                        <input type="text" name="title" id="title"
                            class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('title') }}">
                    </div>

                    <div class="mb-4">
                        <label for="display_order" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Ordem de exibição') }}
                        </label>
                        <input type="number" name="display_order" id="display_order"
                            class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('display_order') }}"
                            required>
                    </div>

                    <div class="mb-4">
                        <label for="link_url" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('URL do Link') }}
                        </label>
                        <input type="text" name="link_url" id="link_url"
                            class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('link_url') }}">
                    </div>

                    <div class="mb-4">
                        <label for="slide_type" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Tipo de Slide') }}
                        </label>
                        <input type="text" name="slide_type" id="slide_type"
                            class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('slide_type') }}">
                    </div>

                    <div class="mb-4">
                        <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Data de Início') }}
                        </label>
                        <input type="date" name="start_date" id="start_date"
                            class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('start_date') }}">
                    </div>

                    <div class="mb-4">
                        <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Data de Término') }}
                        </label>
                        <input type="date" name="end_date" id="end_date"
                            class="border border-gray-400 rounded w-full py-2 px-3" value="{{ old('end_date') }}">
                    </div>

                    <div class="mb-4">
                        <label for="is_active" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Ativo') }}
                        </label>
                        <input type="checkbox" name="is_active" id="is_active" value="1"
                            {{ old('is_active') ? 'checked' : '' }}>
                    </div>

                    <!-- Outros campos relacionados ao Slide -->

                    <div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                            {{ __('Criar') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
