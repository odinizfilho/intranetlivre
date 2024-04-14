<x-app-layout>
    <main>
        <section class="pt-31.5 pb-17.5">
            <div class="max-w-[1030px] mx-auto px-4 sm:px-8 xl:px-0">
                <div class="max-w-[770px] mx-auto text-center">
                    </br>
                    <a href="category.html"
                        class="inline-flex text-blue bg-blue-100 font-medium text-sm py-1 px-3 rounded-full mb-1">Categoria
                        do post</a>
                    <h1 class="font-bold text-2xl sm:text-4xl lg:text-2xl text-gray-800 mb-5">
                        {{ $post->title }}
                    </h1>
                </div>
                @if ($post->hasMedia('featured_image'))
                    <img src="{{ $post->getFirstMediaUrl('featured_image') }}" alt="blog"
                        class="mt-10 mb-11 rounded-md">
                @else
                    <img src="https://grassworksmanufacturing.com/wp-content/themes/i3-digital/images/no-image-available.png"
                        alt="blog" class="mt-10 mb-11 rounded-md">
                @endif
                <div class="max-w-[770px] mx-auto">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
        </section>
    </main>

</x-app-layout>
