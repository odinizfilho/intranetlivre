<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Colaborador') }}
        </h2>
    </x-slot>

    <x-validation-errors class="mb-4" />

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('colaboradores.update', $colaborador->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Matrícula do Colaborador -->
                        <div class="mb-4">
                            <label for="matricula"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Matricula do Colaborador') }}</label>
                            <select name="matricula" id="matricula" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->matricula }}" {{ $colaborador->matricula == $usuario->matricula ? 'selected' : '' }}>{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Unidade -->
                        <div class="mb-4">
                            <label for="unidade"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Unidade') }}</label>
                            <select name="cod_unidade" id="unidade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($unidades as $unidade)
                                    <option value="{{ $unidade->cod_unidade }}" {{ $colaborador->cod_unidade == $unidade->cod_unidade ? 'selected' : '' }}>{{ $unidade->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Data de Nascimento -->
                        <div class="mb-4">
                            <label for="data_nascimento"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Data de Nascimento') }}</label>
                            <input type="date" name="data_nascimento" id="data_nascimento"
                                class="border border-gray-400 rounded w-full py-2 px-3"
                                value="{{ $colaborador->data_nascimento }}" required>
                        </div>

                        <!-- Telefone -->
                        <div class="mb-4">
                            <label for="telefone"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Telefone') }}</label>
                            <input type="tel" name="telefone" id="telefone"
                                class="border border-gray-400 rounded w-full py-2 px-3" value="{{ $colaborador->telefone }}"
                                required>
                        </div>

                        <!-- Ramal -->
                        <div class="mb-4">
                            <label for="ramal"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Ramal') }}</label>
                            <input type="text" name="ramal" id="ramal"
                                class="border border-gray-400 rounded w-full py-2 px-3" value="{{ $colaborador->ramal }}">
                        </div>

                        <!-- Cargo -->
                        <div class="mb-4">
                            <label for="Cargo"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Cargo') }}</label>
                            <select name="cod_cargo" id="cargo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($cargos as $cargo)
                                    <option value="{{ $cargo->cod_cargo }}" {{ $colaborador->cod_cargo == $cargo->cod_cargo ? 'selected' : '' }}>{{ $cargo->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Data de Admissão -->
                        <div class="mb-4">
                            <label for="data_admissao"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Data de Admissão') }}</label>
                            <input type="date" name="data_admissao" id="data_admissao"
                                class="border border-gray-400 rounded w-full py-2 px-3"
                                value="{{ $colaborador->data_admissao }}" required>
                        </div>

                        <!-- Matrícula do Gestor -->
                        <div class="mb-4">
                            <label for="matricula_gestor"
                                class="block text-gray-700 text-sm font-bold mb-2">{{ __('Matrícula do Gestor') }}</label>
                            <select name="matricula_gestor" id="matricula_gestor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @foreach ($usuarios as $usuario)
                                    <option value="{{ $usuario->matricula }}" {{ $colaborador->matricula_gestor == $usuario->matricula ? 'selected' : '' }}>{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Adicione campos para outros dados do colaborador aqui -->

                        <div>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">{{ __('Salvar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
