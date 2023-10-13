<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Documento') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('documentos.update', $documento->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="file" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Arquivo') }}</label>
                            <input type="file" name="file" id="file" class="border border-gray-400 rounded w-full py-2 px-3">
                        </div>

                        <div class="mb-4">
                            <label for="categoria" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Categoria') }}</label>
                            <select name="categoria" id="categoria" class="border border-gray-400 rounded w-full py-2 px-3">
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ $documento->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Tags') }}</label>
                            <!-- Adicione um campo de seleção de tags aqui e marque as tags associadas ao documento -->
                        </div>

                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">{{ __('Atualizar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
