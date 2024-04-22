<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Branches') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <div class="mt-8 text-2xl">
                        Branches
                    </div>
                </div>

                <div class="grid grid-cols-1 bg-gray-200 bg-opacity-25">
                    <div class="p-6">
                        <!-- Exibir mensagens de sucesso -->
                        @if (session('success'))
                            <div class="mb-4">
                                <div class="font-medium text-green-600">
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif

                        <div class="mb-4">
                            <a href="{{ route('branches.create') }}"
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Criar Nova
                                Branch</a>
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                            @foreach ($branches as $branch)
                                <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                                    <h2 class="text-lg font-semibold">{{ $branch->name }}</h2>
                                    <p class="text-sm text-gray-500">{{ $branch->address }}</p>
                                    <p class="text-sm text-gray-500">{{ $branch->city }}</p>
                                    <p class="text-sm text-gray-500">{{ $branch->country }}</p>
                                    <p class="text-sm text-gray-500">{{ $branch->phone }}</p>
                                    <div class="mt-4">
                                        <a href="{{ route('branches.show', $branch->id) }}"
                                            class="text-blue-500 hover:text-blue-700">View</a>
                                        <a href="{{ route('branches.edit', $branch->id) }}"
                                            class="ml-2 text-blue-500 hover:text-blue-700">Edit</a>
                                        <form action="{{ route('branches.destroy', $branch->id) }}" method="POST"
                                            class="inline ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
