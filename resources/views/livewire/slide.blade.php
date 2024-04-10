<div x-data="{
    slides: [
        { src: 'https://daisyui.com/images/stock/photo-1625726411847-8cbb60cc71e6.jpg', link: 'https://www.example.com/page1' },
        { src: 'https://daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.jpg', link: 'https://www.example.com/page2' },
        { src: 'https://daisyui.com/images/stock/photo-1414694762283-acccc27bca85.jpg', link: 'https://www.example.com/page3' },
        { src: 'https://daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.jpg', link: 'https://www.example.com/page4' }
    ],
    currentIndex: 0,
    interval: null,
    nextSlide() {
        this.currentIndex = (this.currentIndex + 1) % this.slides.length;
    },
    prevSlide() {
        this.currentIndex = (this.currentIndex - 1 + this.slides.length) % this.slides.length;
    },
    startInterval() {
        this.interval = setInterval(this.nextSlide, 5000); // Change slide every 5 seconds
        this.nextSlide(); // Start with the next slide immediately
    },
    stopInterval() {
        clearInterval(this.interval);
        this.interval = null;
    },
    goToLink(link) {
        window.location.href = link;
    }
}" x-init="startInterval()" @mouseenter="stopInterval()" @mouseleave="startInterval()"
    class="relative">
    <div class="w-full carousel">
        <template x-for="(slide, index) in slides" :key="index">
            <div class="block w-full carousel-item" x-show="index === currentIndex">

                <a href="#" @click="goToLink(slide.link)"><img :src="slide.src"
                        class="w-full rounded-md" /></a>
            </div>
        </template>
    </div>
    <div class="absolute inset-y-0 flex items-center justify-between w-full px-4 py-2">
        <button @click.stop="prevSlide" class="btn btn-xs">&lt; Anterior</button>
        <button @click.stop="nextSlide" class="btn btn-xs">Próximo &gt;</button>
    </div>
</div>
