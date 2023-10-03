<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Cargos') }}
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
                                <th class="px-4 py-2">Código do Cargo</th>
                                <th class="px-4 py-2">Nome</th>
                                <!-- Outras colunas relacionadas ao Cargo -->
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cargos as $cargo)
                            <tr>
                                <td class="border px-4 py-2">{{ $cargo->id }}</td>
                                <td class="border px-4 py-2">{{ $cargo->cod_cargo }}</td>
                                <td class="border px-4 py-2">{{ $cargo->nome }}</td>
                                <!-- Outras colunas relacionadas ao Cargo -->
                                <td class="border px-4 py-2">
                                    <a href="{{ route('cargos.show', $cargo->id) }}" class="text-blue-500 hover:underline">Detalhes</a>
                                    <a href="{{ route('cargos.edit', $cargo->id) }}" class="text-yellow-500 hover:underline">Editar</a>
                                    <a href="{{ route('cargos.destroy', $cargo->id) }}" class="text-red-500 hover:underline">Excluir</a>
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
