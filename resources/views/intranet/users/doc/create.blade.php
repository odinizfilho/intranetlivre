<!-- resources/views/docmanagers/create.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Gestor de Documentos') }}
        </h2>
    </x-slot>

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="p-6">
                <!-- Formulário Aqui -->
                <h3 class="mb-4 text-lg font-semibold">Novo Documento</h3>
                <form action="{{ route('docmanagers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                        <input type="text" name="title" id="title"
                            class="block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
                        <textarea name="description" id="description" rows="3"
                            class="block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="document" class="block text-sm font-medium text-gray-700">Documento</label>
                        <input type="file" name="document" id="document" accept=".pdf"
                            class="block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria</label>
                        <select name="category_id" id="category_id"
                            class="block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="is_public" class="block text-sm font-medium text-gray-700">Compartilhamento</label>
                        <select name="is_public" id="is_public"
                            class="block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="0">Privado</option>
                            <option value="1">Público</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="shared_with" class="block text-sm font-medium text-gray-700">Compartilhar
                            com</label>
                        <select name="shared_with[]" id="shared_with" multiple
                            class="block w-full p-2 mt-1 border-gray-300 rounded-md focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <!-- Lista de usuários disponíveis para compartilhamento -->
                        </select>
                    </div>
                    <div>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
