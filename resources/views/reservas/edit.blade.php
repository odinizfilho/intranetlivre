<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Reserva de Sala de Reunião') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Conteúdo do formulário de edição de reserva de sala de reunião -->
                    <form method="POST" action="{{ route('reservas.update', $reserva->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- Campos do formulário -->
                        <div class="mb-4">
                            <label for="sala_id" class="block text-gray-700 text-sm font-bold mb-2">Sala:</label>
                            <select name="sala_id" id="sala_id" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                                @foreach ($salas as $sala)
                                <option value="{{ $sala->id }}" @if($sala->id == $reserva->sala_id) selected @endif>{{ $sala->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="data_reserva" class="block text-gray-700 text-sm font-bold mb-2">Data da Reserva:</label>
                            <input type="date" name="data_reserva" id="data_reserva" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $reserva->data_reserva }}" required />
                        </div>
                        <div class="mb-4">
                            <label for="hora_inicio" class="block text-gray-700 text-sm font-bold mb-2">Hora de Início:</label>
                            <input type="time" name="hora_inicio" id="hora_inicio" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $reserva->hora_inicio }}" required />
                        </div>
                        <div class="mb-4">
                            <label for="hora_fim" class="block text-gray-700 text-sm font-bold mb-2">Hora de Término:</label>
                            <input type="time" name="hora_fim" id="hora_fim" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ $reserva->hora_fim }}" required />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Salvar Alterações') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
