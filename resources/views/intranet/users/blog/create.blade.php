<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-bold text-gray-700">Título:</label>
                            <input type="text" name="title" id="title"
                                class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-bold text-gray-700">Conteúdo:</label>
                            <div id="editorjs">
                                <textarea name="content" id="content" class="hidden"></textarea>
                                <!-- Aqui será renderizado o editor do EditorJS -->
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="featured_image" class="block text-sm font-bold text-gray-700">Imagem de
                                Destaque:</label>
                            <input type="file" name="featured_image" id="featured_image"
                                class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                accept="image/*">
                        </div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
