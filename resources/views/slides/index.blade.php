<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Slides') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                @if (count($slides) > 0)
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Título</th>
                                <th class="px-4 py-2">Ordem de Exibição</th>
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slides as $slide)
                                <tr>
                                    <td class="px-4 py-2">{{ $slide->title }}</td>
                                    <td class="px-4 py-2">{{ $slide->display_order }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('slides.show', $slide->id) }}" class="text-blue-500">Ver</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>Nenhum slide encontrado.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
