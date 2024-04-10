<x-app-layout>


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('docmanager.search') }}" method="GET" class="flex space-x-3 w-full">
                        <input type="text" name="search" placeholder="Pesquisar..."
                            class="flex-1 px-4 py-2 bg-gray-100 rounded-full focus:outline-none"
                            value="{{ request('search') }}">
                        <select name="category"
                            class="px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-100 border border-gray-300 rounded-full appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="" selected>Todas as categorias</option>
                            @foreach ($category as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (!request()->has('search'))
                        <p>Faça sua busca.</p>
                    @else
                        @if ($documents->count() > 0)
                            <h3 class="text-lg font-semibold mb-4">Resultados da pesquisa: "{{ request('search') }}"
                            </h3>
                            <ul>
                                @foreach ($documents as $document)
                                    <li class="mb-8">
                                        <h4 class="text-lg font-semibold mb-2">
                                            <a href="{{ route('docmanager.show', $document->id) }}"
                                                class="text-blue-500 hover:underline">{{ $document->title }}</a>
                                        </h4>
                                        <p class="text-gray-600">{{ $document->description }}</p>
                                        @if ($document->category)
                                            <p class="text-sm text-gray-500 mt-1">Categoria:
                                                {{ $document->category->name }}</p>
                                        @else
                                            <p class="text-sm text-gray-500 mt-1">Categoria: Sem categoria</p>
                                        @endif
                                        <p class="text-sm text-gray-500">Criado em:
                                            {{ $document->created_at->format('d/m/Y H:i') }}</p>
                                        <p class="text-sm text-gray-500">Autor: {{ $document->user->name }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Nenhum documento encontrado.</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
