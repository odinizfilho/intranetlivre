<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Nova Filil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <div class="mt-8 text-2xl">
                        Nova Filial
                    </div>
                </div>

                <div class="grid grid-cols-1 bg-gray-200 bg-opacity-25">
                    <div class="p-6">
                        <!-- Formulário de criação de nova Branch -->
                        <form action="{{ route('branches.store') }}" method="POST">
                            @csrf

                            <!-- Campos do formulário -->
                            <div class="my-4">
                                <x-label for="name" :value="__('Nome')" />
                                <x-input id="name" class="block w-full mt-1" type="text" name="name"
                                    :value="old('name')" required autofocus />
                            </div>

                            <div class="my-4">
                                <x-label for="address" :value="__('Endereço')" />
                                <x-input id="address" class="block w-full mt-1" type="text" name="address"
                                    :value="old('address')" />
                            </div>

                            <div class="my-4">
                                <x-label for="city" :value="__('Cidade')" />
                                <x-input id="city" class="block w-full mt-1" type="text" name="city"
                                    :value="old('city')" />
                            </div>

                            <div class="my-4">
                                <x-label for="country" :value="__('País')" />
                                <x-input id="country" class="block w-full mt-1" type="text" name="country"
                                    :value="old('country')" />
                            </div>

                            <div class="my-4">
                                <x-label for="phone" :value="__('Telefone')" />
                                <x-input id="phone" class="block w-full mt-1" type="text" name="phone"
                                    :value="old('phone')" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Salvar') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
