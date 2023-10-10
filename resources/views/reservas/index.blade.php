<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Reservas de Sala de Reunião') }}
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
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Sala</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Usuário</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Data da Reserva</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Hora de Início</th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Hora de Término</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservas as $reserva)
                            <tr class="bg-white">
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">{{ $reserva->id }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $reserva->sala->nome }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $reserva->usuario->name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $reserva->data_reserva }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $reserva->hora_inicio }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $reserva->hora_fim }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
