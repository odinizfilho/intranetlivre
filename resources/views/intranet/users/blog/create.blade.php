<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Novo Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-bold text-gray-700">Título:</label>
                            <input type="text" name="title" id="title"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-bold text-gray-700">Conteúdo:</label>
                            <div id="toolbar"></div>
                            <div id="editor">
                            </div>
                            <textarea name="content" id="editor-area" class="hidden"></textarea>
                            <!-- Aqui será renderizado o editor do EditorJS -->

                        </div>
                        <div class="mb-4">
                            <label for="featured_image" class="block text-sm font-bold text-gray-700">Imagem de
                                Destaque:</label>
                            <input type="file" name="featured_image" id="featured_image"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm form-input focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                accept="image/*">
                        </div>
                        <button type="submit"
                            class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
