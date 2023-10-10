<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Salas de Reunião') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Conteúdo da visualização -->
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Capacidade</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salas as $sala)
                            <tr class="bg-white">
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $sala->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $sala->nome }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $sala->capacidade }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $sala->descricao }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
