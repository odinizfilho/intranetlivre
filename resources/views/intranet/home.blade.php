<x-app-layout>

    <div class="px-6 py-8">
        <!--buscador-->
        <div class="flex items-center p-3 mb-4 bg-white border-none rounded-full shadow-md">
            <form action="{{ route('docmanager.search') }}" method="GET" class="flex space-x-3 w-full">
                <input type="text" name="search" placeholder="Pesquisar..."
                    class="flex-1 px-4 py-2 bg-gray-100 rounded-full focus:outline-none">
                <select name="category"
                    class="px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-100 border border-gray-300 rounded-full appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="" selected>Todas as categorias</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </form>
        </div>










        <div class="flex-grow p-6 overflow-auto">
            <div class="grid grid-cols-3 gap-6">
                <div class="h-64 col-span-1 p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <livewire:apps />
                </div>
                <div class="h-64 col-span-2 p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <livewire:slide />
                </div>
                <div class="h-full col-span-3 p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <!--post-1-->

                    <div
                        class="relative flex min-h-screen flex-col justify-center overflow-hidden bg-gray-50 py-6 sm:py-12">
                        <div class="m-10 flex flex-col items-center mx-auto max-w-screen-lg">
                            <div class="header flex w-full justify-center">
                                <h2
                                    class="font-black pb-10 mb-20 text-5xl text-blue-900 before:block before:absolute before:bg-sky-300  relative before:w-1/3 before:h-1 before:bottom-0 before:left-1/3">
                                    Novidades</h2>
                            </div>
                            <div class="grid w-full gap-10 grid-cols-3">
                                <!--post-->
                                @foreach ($posts as $post)
                                    <div
                                        class="bg-white w-full rounded-lg shadow-md flex flex-col transition-all overflow-hidden hover:shadow-2xl">
                                        <div class="  p-6">

                                            <div
                                                class="pb-3 mb-4 border-b border-stone-200 text-xs font-medium flex justify-between text-blue-900">
                                                <span class="flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    {{ $post->created_at->format('d/m/Y') }}
                                                </span>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8.625 12a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <h3 class="mb-4 font-semibold  text-2xl"><a
                                                    href="{{ route('blog.show', $post->slug) }}"
                                                    class="transition-all text-blue-900 hover:text-blue-600">
                                                    {{ $post->title }}</a></h3>
                                            <p class="text-sky-800 text-sm mb-0">
                                                {{ strlen($post->content) > 65 ? substr($post->content, 0, 45) . '...' : $post->content }}

                                            </p>
                                        </div>
                                        <div class="mt-auto">
                                            @if ($post->hasMedia('featured_image'))
                                                <img src="{{ $post->getFirstMediaUrl('featured_image') }}"
                                                    alt="" class="w-full h-48 object-cover">
                                            @else
                                                <img src="https://grassworksmanufacturing.com/wp-content/themes/i3-digital/images/no-image-available.png"
                                                    alt="" class="w-full h-48 object-cover">
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                <!--post-->
                            </div>
                        </div>
                    </div>
                    <!--post-1-->
                </div>
            </div>
        </div>



    </div>


</x-app-layout>
