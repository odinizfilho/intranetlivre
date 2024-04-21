<article x-data="slider" class="relative flex flex-shrink-0 w-full overflow-hidden shadow-2xl">
    <div class="absolute z-10 px-2 text-sm text-center text-white bg-gray-600 rounded-full bottom-5 right-5">
        <span x-text="currentIndex"></span>/
        <span x-text="images.length"></span>
    </div>

    <template x-for="(item, index) in imageData">
        <figure class="h-56" x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            <img :src="item.src" :alt="item.title"
                class="absolute inset-0 z-10 object-cover object-top w-full h-full opacity-70" />
            <figcaption
                class="absolute inset-x-0 z-20 p-4 mx-auto text-sm font-light leading-snug tracking-widest text-center bg-gray-300 bg-opacity-25 bottom-1 w-96">
                <h4 x-text="item.title"></h4>
                <p x-text="item.content"></p>
                <a :href="item.link"
                    class="px-2 py-1 space-x-2 text-blue-500 bg-gray-100 rounded shadow-md hover:underline ">Saiba
                    Mais</a>
            </figcaption>
        </figure>
    </template>

    <button @click="back()"
        class="absolute z-10 flex items-center justify-center -translate-y-1/2 bg-gray-100 rounded-full shadow-md left-14 top-1/2 w-11 h-11 hover:bg-gray-200">
        <svg class="w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5"
            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
            </path>
        </svg>
    </button>

    <button @click="next()"
        class="absolute z-10 flex items-center justify-center -translate-y-1/2 bg-gray-100 rounded-full shadow-md right-14 top-1/2 w-11 h-11 hover:bg-gray-200">
        <svg class="w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5"
            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
</article>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('slider', () => ({
            currentIndex: 1,
            imageData: [
                @foreach ($slider as $slide)
                    {
                        src: '{{ $slide->hasMedia('src_slider') ? $slide->getFirstMediaUrl('src_slider') : '#' }}',
                        title: '{{ $slide->title }}',
                        content: '{{ $slide->content }}',
                        link: '{{ $slide->link }}'
                    },
                @endforeach

            ],
            back() {
                if (this.currentIndex > 1) {
                    this.currentIndex = this.currentIndex - 1;
                }
            },
            next() {
                if (this.currentIndex < this.imageData.length) {
                    this.currentIndex = this.currentIndex + 1;
                } else if (this.currentIndex <= this.imageData.length) {
                    this.currentIndex = this.imageData.length - this.currentIndex + 1
                }
            },
        }))
    })
</script>
