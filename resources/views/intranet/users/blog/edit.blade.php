<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('blog.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                            <input type="text" name="title" id="title"
                                class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $post->title }}"
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Conteúdo:</label>
                            <textarea name="content" id="content" class="form-textarea rounded-md shadow-sm mt-1 block w-full" rows="6"
                                required>{{ $post->content }}</textarea>
                        </div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>