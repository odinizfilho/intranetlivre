<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Colaboradores') }}
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
                                <th class="px-4 py-2">Nome</th>
                                <th class="px-4 py-2">CPF do Colaborador</th>
                                <th class="px-4 py-2">Unidade</th>
                                <th class="px-4 py-2">Cargo</th>
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($colaboradores as $colaborador)
                            <tr>
                                <td class="border px-4 py-2">{{ $colaborador->id }}</td>
                                <td class="border px-4 py-2">{{ $colaborador->user->name }}</td>
                                <td class="border px-4 py-2">{{ $colaborador->matricula }}</td>
                                <td class="border px-4 py-2">
                                    @php
                                        $unidade = $unidades->firstWhere('cod_unidade', $colaborador->cod_unidade);
                                    @endphp
                                    @if ($unidade)
                                        {{ $unidade->nome }}
                                    @else
                                        Unidade não encontrada
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    @php
                                        $cargo = $cargos->firstWhere('cod_cargo', $colaborador->cod_cargo);
                                    @endphp
                                    @if ($cargo)
                                        {{ $cargo->nome }}
                                    @else
                                        Cargo não encontrada
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('colaboradores.show', $colaborador->id) }}" class="text-blue-500 hover:underline">Detalhes</a>
                                    <a href="{{ route('colaboradores.edit', $colaborador->id) }}" class="text-yellow-500 hover:underline">Editar</a>
                                    <a href="{{ route('colaboradores.delete', $colaborador->id) }}" class="text-red-500 hover:underline">Excluir</a>
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
