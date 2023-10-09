<x-app-layout>
    <x-slot name="header">
    
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Postagem') }}
        </h2>
        <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    </x-slot>

    
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Título') }}</label>
                            <input type="text" name="title" id="title" class="border border-gray-400 rounded w-full py-2 px-3" required>
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Conteúdo') }}</label>
                            <div id="">
                                <textarea type="text" name="content" id="content" class="ckeditor border border-gray-400 rounded w-full py-2 px-3" required></textarea>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Imagem') }}</label>
                            <input type="file" name="image" id="image" class="border border-gray-400 rounded w-full py-2 px-3" accept="image/*">
                        </div>

                        <div class="mb-4">
                            <label for="Cargo"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Categoria') }}</label>
                            <select name="categories[]" id="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">{{ __('Gerar Link') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        CKEDITOR.replace('content');
    </script>
</x-app-layout>
