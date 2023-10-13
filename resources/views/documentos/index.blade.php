<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documentos') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Formulário de busca por termo -->
                    <form action="{{ route('documentos.index') }}" method="GET" class="mb-4">
                        <div class="flex">
                            <input type="text" name="termoPesquisa" placeholder="Pesquisar por termo" class="border border-gray-400 rounded w-full py-2 px-3">
                            <button type="submit" class="px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">Pesquisar</button>
                        </div>
                    </form>

                    <!-- Filtros por categoria e tags -->
                    <div class="mb-4">
                        <label for="categoria" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Filtrar por Categoria') }}</label>
                        <select name="categoria" id="categoria" class="border border-gray-400 rounded w-full py-2 px-3">
                            <option value="">Todas as Categorias</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="tags" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Filtrar por Tags') }}</label>
                        <select name="tags[]" id="tags" multiple class="border border-gray-400 rounded w-full py-2 px-3">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Lista dos últimos documentos -->
                    <h2 class="text-2xl font-semibold mb-4">{{ __('Últimos Documentos') }}</h2>
                    <ul>
                        @foreach($documentos as $documento)
                            <li>
                                <a href="{{ route('documentos.show', $documento->id) }}">{{ $documento->nome }}</a>
                                <!-- Adicione outras informações do documento, como autor e data de criação, se necessário -->
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
