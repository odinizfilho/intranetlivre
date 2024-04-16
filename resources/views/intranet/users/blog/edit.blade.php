<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Editar Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('blog.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block mb-2 text-sm font-bold text-gray-700">Título:</label>
                            <input type="text" name="title" id="title"
                                class="block w-full mt-1 rounded-md shadow-sm form-input" value="{{ $post->title }}"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block mb-2 text-sm font-bold text-gray-700">Conteúdo:</label>
                            <div id="toolbar"></div>
                            <div id="editor">
                                {!! $post->content !!}
                            </div>
                            <textarea name="content" id="editor-area" class="hidden" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="featured_image" class="block mb-2 text-sm font-bold text-gray-700">Imagem de
                                Destaque:</label>
                            <input type="file" name="featured_image" id="featured_image"
                                class="block w-full mt-1 rounded-md shadow-sm form-input" accept="image/*">
                        </div>
                        <button type="submit"
                            class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
