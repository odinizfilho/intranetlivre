<x-app-layout>

    <div class="px-6 py-8">
        <!-- Buscador -->
        <div class="flex items-center p-3 mb-4 bg-white border-none rounded-full shadow-md">
            <form class="flex w-full" action="{{ route('docmanager.search') }}" method="GET">
                <div class="flex items-center">
                    <!-- Modificado para adicionar "items-center" para alinhar verticalmente -->
                    <label for="search-dropdown"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Categoria</label>

                    <select name="category"
                        class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600">
                        <option value="" selected>Todas as categorias</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="relative w-full">
                    <input type="search" name="search" id="search-dropdown"
                        class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                        placeholder="Pesquise documentos...." required />
                    <button type="submit"
                        class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        aria-label="Pesquisar">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </button>
                </div>
            </form>






        </div>
    </div>

    <div class="flex-grow p-6">
        <div class="grid grid-cols-3 gap-6">
            <div class="h-64 col-span-1 p-6 bg-white border border-gray-100 rounded-md shadow-md">
                <livewire:apps />
            </div>
            <div class="h-64 col-span-2 p-6 bg-white border border-gray-100 rounded-md shadow-md">
                <livewire:slide />
            </div>

            <div class="relative max-w-screen-xl px-6 py-8 mx-auto overflow-hidden">
                <h1 class="mb-4 text-2xl font-bold">Documentos por categoria</h1>
                <div class="flex space-x-4 overflow-x-auto" style="scroll-snap-type: x mandatory;">
                    @foreach ($categories as $category)
                        <div
                            class="w-64 bg-gradient-to-r from-gray-100 via-[#bce1ff] to-gray-100 border border-gray-300 rounded-lg flex-shrink-0">
                            <a href="{{ route('documents.by.category', $category->slug) }}" class="block">
                                <div class="p-4">
                                    <h2 class="text-lg font-semibold">{{ $category->name }}</h2>
                                    <p>{{ strlen($category->description) > 95 ? substr($category->description, 0, 45) . '...' : $category->description }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Nova div com grid de postagens -->
            <div class="col-span-3 px-6 py-8 bg-white rounded-md shadow-md">
                <h2 class="mb-4 text-2xl font-bold">Últimas Postagens</h2>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                    @foreach ($posts as $post)
                        <div class="overflow-hidden bg-white rounded-lg shadow-md hover:shadow-2xl">
                            <div class="p-6 border-b border-gray-200">
                                <div class="flex justify-between pb-3 mb-4 text-xs font-medium text-blue-900">
                                    <span class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                        {{ $post->created_at->format('d/m/Y') }}
                                    </span>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                                        </svg>
                                    </span>
                                </div>
                                <h3 class="mb-4 text-2xl font-semibold">
                                    <a href="{{ route('blog.show', $post->slug) }}"
                                        class="text-blue-900 hover:text-blue-600">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                                <p class="mb-0 text-sm text-gray-800">
                                    {!! strlen($post->content) > 65 ? substr($post->content, 0, 65) . '...' : $post->content !!}

                                </p>
                            </div>
                            <div class="mt-auto">
                                @if ($post->hasMedia('featured_image'))
                                    <img src="{{ $post->getFirstMediaUrl('featured_image') }}"
                                        alt="{{ $post->title }}" class="object-cover w-full h-48">
                                @else
                                    <img src="https://grassworksmanufacturing.com/wp-content/themes/i3-digital/images/no-image-available.png"
                                        alt="Imagem Indisponível" class="object-cover w-full h-48">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
