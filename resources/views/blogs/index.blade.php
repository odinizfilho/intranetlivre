<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meus Post') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">{{ session('success') }}</strong>
                </div>
            @endif

            <div class="mb-4">
                @if (Auth::user()->currentTeam && Auth::user()->currentTeam->id == 1)
                    <a href="{{ route('posts.create') }}">
                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-4">
                            {{ __('Adicionar post') }}
                        </button>
                    </a>
                @endif
            </div>

            @if ($blogs->count() > 0)
                <div class="p-6 bg-white rounded-lg shadow-2xl">
                    <table class="w-full bg-white" id="blogsTable">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 text-left">{{ __('Título') }}</th>
                                <th class="py-2 px-4 text-left">{{ __('Autor') }}</th>
                                <th class="py-2 px-4 text-left">{{ __('Data de Criação') }}</th>
                                <th class="py-2 px-4 text-left">{{ __('Ações') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td class="py-2 px-4">{{ $blog->title }}</td>
                                    <td class="py-2 px-4">{{ $blog->author->name ?? __('Desconhecido') }}</td>
                                    <td class="py-2 px-4">{{ $blog->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="py-2 px-4">
                                        <a href="{{ route('posts.show', $blog->id) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Visualizar') }}</a>
                                        <a href="{{ route('posts.edit', $blog->id) }}" class="text-yellow-600 hover:text-yellow-900">{{ __('Editar') }}</a>
                                        <form action="{{ route('posts.destroy', $blog->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Tem certeza que deseja excluir este post?')">{{ __('Excluir') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-500">{{ __('Nenhum post encontrado.') }}</p>
            @endif
        </div>
    </div>

    <!-- Incluir a biblioteca DataTables -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#blogsTable').DataTable();
        });
    </script>
</x-app-layout>
