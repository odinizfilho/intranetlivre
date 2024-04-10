<x-app-layout>


    <div class="py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
            <p class="flex items-center text-gray-600">
                <a href="/" class="flex items-center hover:underline">
                    Intranet
                </a>
                <span class="mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                    </svg>
                </span>
                <a href="/docmanager" class="flex items-center hover:underline">
                    Gestão de Documentos
                </a>
                <span class="mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                    </svg>
                </span>
                <a href="/category" class="flex items-center hover:underline">
                    Categorias
                </a>
                <span class="mx-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8" />
                    </svg>
                </span>
                <a href="#" class="flex items-center hover:underline">
                    {{ $category->name }}
                </a>
            </p>
            <br />
        </div>
        <div class="overflow-hidden bg-white shadow sm:rounded-lg">
            <div class="flex items-center justify-between p-3 bg-blue-400 border-b">
                <div class="flex items-center px-2 py-1 space-x-2 bg-gray-100 rounded shadow-md text-slate-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                    </svg>
                    <a href="#" onclick="history.go(-1);"> <span>{{ __('Voltar') }}</span></a>
                </div>
                <div class="text-lg font-bold text-gray-100 mx-auto">{{ $category->name }}</div>
            </div>




            <div class="p-6">
                <div id="main-content" class="file_manager bg-gray-100 min-h-screen py-8">
                    <!--doc-->
                    <div
                        class="container mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @forelse ($documents as $document)
                            <div class="col">
                                <div class="bg-white p-4 rounded-lg shadow-md">
                                    <a href="{{ route('docmanager.show', $document->id) }}" class="flex items-center">
                                        <div class="hover">
                                            <button type="button" class="btn btn-icon btn-danger">
                                                @php
                                                    $fileExtension = pathinfo(
                                                        $document->getFirstMedia('documents')->file_name,
                                                        PATHINFO_EXTENSION,
                                                    );
                                                    switch ($fileExtension) {
                                                        case 'pdf':
                                                            $iconClass = 'fa fa-file-pdf text-danger';
                                                            break;
                                                        case 'doc':
                                                        case 'docx':
                                                            $iconClass = 'fa fa-file-word text-primary';
                                                            break;
                                                        case 'xls':
                                                        case 'xlsx':
                                                            $iconClass = 'fa fa-file-excel text-success';
                                                            break;
                                                        // Adicione mais casos conforme necessário
                                                        default:
                                                            $iconClass = 'fa fa-file text-info';
                                                    }
                                                @endphp
                                                <i class="{{ $iconClass }}"></i>
                                            </button>
                                        </div>
                                        <div class="icon mr-2">
                                        </div>

                                        <div class="file-name">
                                            <p class="mb-1 text-muted">{{ $document->title }}</p>
                                            <small class="text-xs text-muted">
                                                Descrição:
                                                {{ strlen($document->description) > 60 ? substr($document->description, 0, 60) . '...' : $document->description }}
                                                <br>
                                                Tamanho:
                                                {{ round($document->getFirstMedia('documents')->size / 1024, 2) }}
                                                KB
                                                <span class="date">{{ $document->created_at->format('d/m/Y') }}</span>
                                            </small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center">
                                <p class="text-gray-600">Não há documentos nesta categoria.</p>
                            </div>
                        @endforelse
                    </div>

                    <!--doc-->



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
