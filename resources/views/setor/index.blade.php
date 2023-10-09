<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de setor') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Código do setor</th>
                                <th class="px-4 py-2">Nome</th>
                                <!-- Outras colunas relacionadas ao setor -->
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($setor as $setor)
                            <tr>
                                <td class="border px-4 py-2">{{ $setor->id }}</td>
                                <td class="border px-4 py-2">{{ $setor->cod_setor }}</td>
                                <td class="border px-4 py-2">{{ $setor->nome }}</td>
                                <!-- Outras colunas relacionadas ao setor -->
                                <td class="border px-4 py-2">
                                    <a href="{{ route('setor.show', $setor->id) }}" class="text-blue-500 hover:underline">Detalhes</a>
                                    <a href="{{ route('setor.edit', $setor->id) }}" class="text-yellow-500 hover:underline">Editar</a>
                                    <a href="{{ route('setor.destroy', $setor->id) }}" class="text-red-500 hover:underline">Excluir</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
