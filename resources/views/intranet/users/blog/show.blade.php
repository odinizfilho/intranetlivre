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
                    <p class="text-gray-700">
                        Resumo do post
                    </p>
                    <div class="flex items-center justify-center gap-4 mt-7.5">
                        <div class="flex w-12.5 h-12.5 rounded-full overflow-hidden">
                            <img src="https://clarity-tailwind.preview.uideck.com/images/user-01.png" alt="user">
                        </div>
                        <div class="text-left">
                            <h4 class="font-medium text-lg text-gray-800 mb-1">
                                Nome do Autor
                            </h4>
                            <div class="flex items-center gap-1.5">
                                <p>{{ $post->created_at->format('d/m/Y') }}</p>
                                <span class="flex w-3 h-3 rounded-full bg-gray-800"></span>
                                <p>A quantos minustos, ou horas, dias ou ano foi postado</p>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="https://clarity-tailwind.preview.uideck.com/images/blog-single-01.png" alt="blog"
                    class="mt-10 mb-11">
                <div class="max-w-[770px] mx-auto">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
        </section>
    </main>

</x-app-layout>
