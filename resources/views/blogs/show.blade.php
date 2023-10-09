<x-app-layout>
    <main class="mt-10">

        <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
            <div class="absolute left-0 bottom-0 w-full h-full z-10"
                style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
            <img src="{{ asset($post->image_path) }}" class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
            <div class="p-4 absolute bottom-0 left-0 z-20">
                @foreach ($post->categories as $category) <a href="#"
                    class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">
                    {{ $category->name }}
                </a>@endforeach
                <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                    {{ $post->title }}
                </h2>

            </div>
        </div>


        <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
            {!! html_entity_decode($post->content) !!}

        </div>
    </main>
    <livewire:comments :model="$blog"/>
</br>
    <footer class="bg-white">
    <hr class="my-10 border-gray-200" />
</footer>
</x-app-layout>