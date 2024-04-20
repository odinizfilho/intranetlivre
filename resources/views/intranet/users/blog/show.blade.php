<x-app-layout>
    <div class="relative max-w-screen-xl p-5 mx-auto sm:p-10 md:p-16">
        <div class="overflow-hidden text-center bg-center bg-cover"
            style="min-height: 500px; background-image: url('{{ $post->hasMedia('featured_image') ? $post->getFirstMediaUrl('featured_image') : 'https://api.time.com/wp-content/uploads/2020/07/never-trumpers-2020-election-01.jpg?quality=85&w=1201&h=676&crop=1' }}')"
            title="{{ $post->title }}">
        </div>
        <div class="max-w-3xl mx-auto">
            <div
                class="flex flex-col justify-between mt-3 leading-normal bg-white rounded-b lg:rounded-b-none lg:rounded-r">
                <div class="relative top-0 p-5 -mt-32 bg-white sm:p-10">
                    <h1 href="#" class="mb-2 text-3xl font-bold text-gray-900">{{ $post->title }}</h1>
                    <p class="mt-2 text-xs text-gray-700">Escrito por: Endomarketing


                    </p>
                    <br />

                    {!! $post->content !!}






                </div>
                <livewire:comments :model="$post" />

            </div>
        </div>
    </div>
</x-app-layout>
