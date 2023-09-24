<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 font-medium text-sm text-red-600">
            {{ __('Email já em uso') }}
        </div>

        <p class="text-sm text-gray-600">
            {{ __('O email informado já está em uso por outro usuário.') }}
        </p>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Voltar para a página inicial') }}
            </a>
        </div>
    </x-authentication-card>
</x-guest-layout>
