<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-lg font-semibold mb-4">Posts Recentes</h1>
                    @foreach ($posts as $post)
                        <div class="mb-4">
                            <a href="{{ route('blog.show', $post->slug) }}" class="text-blue-500">{{ $post->title }}</a>
                            <p class="text-gray-600">{{ $post->created_at->format('d/m/Y') }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
