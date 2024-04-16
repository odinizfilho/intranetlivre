<x-app-layout>
    <main>
        <section class="pt-31.5 pb-17.5">
            <div class="max-w-[1030px] mx-auto px-4 sm:px-8 xl:px-0">
                <div class="max-w-[770px] mx-auto text-center">
                    </br>
                    <a href="category.html"
                        class="inline-flex px-3 py-1 mb-1 text-sm font-medium bg-blue-100 rounded-full text-blue">Categoria
                        do post</a>
                    <h1 class="mb-5 text-2xl font-bold text-gray-800 sm:text-4xl lg:text-2xl">
                        {{ $post->title }}
                    </h1>
                </div>
                @if ($post->hasMedia('featured_image'))
                    <img src="{{ $post->getFirstMediaUrl('featured_image') }}" alt="blog"
                        class="mt-10 rounded-md mb-11">
                @else
                    <img src="https://grassworksmanufacturing.com/wp-content/themes/i3-digital/images/no-image-available.png"
                        alt="blog" class="mt-10 rounded-md mb-11">
                @endif
                <div class="max-w-[770px] mx-auto">
                    {!! $post->content !!}
                </div>
            </div>
        </section>
    </main>

</x-app-layout>
