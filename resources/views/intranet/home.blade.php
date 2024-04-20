<x-app-layout>

    <div class="px-6 py-8">
        <!-- Buscador -->
        <div class="flex items-center p-3 mb-4 bg-white border-none rounded-full shadow-md">
            <form action="{{ route('docmanager.search') }}" method="GET" class="flex w-full space-x-3">
                <input type="text" name="search" placeholder="Pesquisar..."
                    class="flex-1 px-4 py-2 bg-gray-100 rounded-full focus:outline-none focus:border-blue-500 focus:bg-white">
                <select name="category"
                    class="px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-100 border border-gray-300 rounded-full appearance-none focus:outline-none focus:border-blue-500 focus:bg-white">
                    <option value="" selected>Todas as categorias</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </form>
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
                                <a href="#" class="block">
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
                                        {{ strlen($post->content) > 65 ? substr($post->content, 0, 45) . '...' : $post->content }}
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
