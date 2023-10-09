<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aniversariantes do Mês') }}
        </h2>
    </x-slot>

    

    <div class="container mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Nome</th>
                            <th class="px-4 py-2">Data de Nascimento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aniversariantes as $aniversariante)
                        <tr>
                            <td class="border px-4 py-2">{{ $aniversariante->matricula }}</td>
                            <td class="border px-4 py-2"> @php
                                $usuario = $usuarios->firstWhere('matricula', $aniversariante->matricula);
                            @endphp
                            @if ($usuario)
                                {{ $usuario->name }}
                            @else
                                Nome não encontrada
                            @endif</td>
                            <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($aniversariante->data_nascimento)->format('d/m') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>
</x-app-layout>
