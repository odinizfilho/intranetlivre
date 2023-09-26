<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Unidades') }}
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
                                <th class="px-4 py-2">Código da Unidade</th>
                                <th class="px-4 py-2">Nome</th>
                                <th class="px-4 py-2">Descrição</th>
                                <th class="px-4 py-2">Endereço</th>
                                <th class="px-4 py-2">CEP</th>
                                <th class="px-4 py-2">Telefone</th>
                                <th class="px-4 py-2">E-mail</th>
                                <th class="px-4 py-2">Latitude</th>
                                <th class="px-4 py-2">Longitude</th>
                                <th class="px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unidades as $unidade)
                            <tr>
                                <td class="border px-4 py-2">{{ $unidade->id }}</td>
                                <td class="border px-4 py-2">{{ $unidade->cod_unidade }}</td>
                                <td class="border px-4 py-2">{{ $unidade->nome }}</td>
                                <td class="border px-4 py-2">{{ $unidade->descricao }}</td>
                                <td class="border px-4 py-2">{{ $unidade->endereco }}</td>
                                <td class="border px-4 py-2">{{ $unidade->cep }}</td>
                                <td class="border px-4 py-2">{{ $unidade->telefone }}</td>
                                <td class="border px-4 py-2">{{ $unidade->email }}</td>
                                <td class="border px-4 py-2">{{ $unidade->latitude }}</td>
                                <td class="border px-4 py-2">{{ $unidade->longitude }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('unidades.edit', $unidade->id) }}" class="text-blue-500 hover:underline">Editar</a>
                                    <a href="{{ route('unidades.destroy', $unidade->id) }}" class="text-red-500 hover:underline">Excluir</a>
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
