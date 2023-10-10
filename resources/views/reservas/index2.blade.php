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
                    <x-calendar :events="$events" />
                    <!-- Adicione o componente de calendário aqui -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
