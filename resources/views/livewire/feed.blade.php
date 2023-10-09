<div>
    <h1 class="text-3xl font-semibold mb-4">Feed de Notícias</h1>

    <div class="space-y-4">
        @foreach ($blogs as $blog)
        <div class="bg-white p-4 shadow rounded-lg">
            <h2 class="text-xl font-semibold mb-2">{{ $blog->title }}</h2>
            <p class="text-gray-600">
                @php
                    $decodedContent = html_entity_decode($blog->content);
                @endphp

                @if (strlen($decodedContent) > 280)
                    {{ substr($decodedContent, 0, 280) }}...
                    <a href="{{ route('posts.show', ['id' => $blog->id]) }}" class="text-blue-500">Ler mais</a>
                @else
                    {{ $decodedContent }}
                @endif
            </p>
        </div>
        @endforeach
    </div>

    <!-- Botão "Ver mais" -->
    <div class="text-center mt-4">
        <button wire:click="loadMorePosts" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Ver mais</button>
    </div>
</div>
