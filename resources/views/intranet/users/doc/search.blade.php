<x-app-layout>


    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form class="flex w-full" action="{{ route('docmanager.search') }}" method="GET">
                        <div class="flex items-center">
                            <!-- Modificado para adicionar "items-center" para alinhar verticalmente -->
                            <label for="search-dropdown"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Categoria</label>

                            <select name="category"
                                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                                <option value="" selected>Todas as categorias</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="relative w-full">
                            <input type="search" name="search" id="search-dropdown"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="Pesquise documentos...." value="{{ request('search') }}" required />
                            <button type="submit"
                                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                aria-label="Pesquisar">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (!request()->has('search'))
                        <p>Faça sua busca.</p>
                    @else
                        @if ($documents->count() > 0)
                            <h3 class="mb-4 text-lg font-semibold">Resultados da pesquisa: "{{ request('search') }}"
                            </h3>
                            <ul>
                                @foreach ($documents as $document)
                                    <li class="mb-8">
                                        <h4 class="mb-2 text-lg font-semibold">
                                            <a href="{{ route('docmanager.show', $document->id) }}"
                                                class="text-blue-500 hover:underline">{{ $document->title }}</a>
                                        </h4>
                                        <p class="text-gray-600">{{ $document->description }}</p>
                                        @if ($document->category)
                                            <p class="mt-1 text-sm text-gray-500">Categoria:
                                                {{ $document->category->name }}</p>
                                        @else
                                            <p class="mt-1 text-sm text-gray-500">Categoria: Sem categoria</p>
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
