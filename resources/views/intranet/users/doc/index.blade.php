<!-- resources/views/docmanagers/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Gestor de Documentos') }}
        </h2>
    </x-slot>

    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="p-6">
                <!-- Conteúdo Aqui -->
                <h3 class="mb-4 text-lg font-semibold">Meus Documentos</h3>
                @foreach ($documents as $document)
                    <div class="pb-4 mb-4 border-b border-gray-200">
                        <h4 class="text-xl font-semibold">{{ $document->title }}</h4>
                        <p class="text-gray-600">{{ $document->description }}</p>
                        @foreach ($document->getMedia('documents') as $media)
                            <a href="{{ route('docmanager.download', [$document->id, $media->file_name]) }}"
                                class="text-blue-500">Download {{ $media->file_name }}</a><br>
                        @endforeach
                        <!-- Adicionando um link para visualizar detalhes do documento -->
                        <a href="{{ route('docmanager.show', $document->id) }}" class="text-blue-500">Detalhes</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
