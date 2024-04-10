<x-app-layout>

    <div class="px-6 py-8">
        <!--buscador-->
        <div class="flex items-center p-3 mb-4 bg-white border-none rounded-full shadow-md">
            <form action="{{ route('docmanager.search') }}" method="GET" class="flex space-x-3 w-full">
                <input type="text" name="search" placeholder="Pesquisar..."
                    class="flex-1 px-4 py-2 bg-gray-100 rounded-full focus:outline-none">
                <select name="category"
                    class="px-4 py-2 pr-8 leading-tight text-gray-700 bg-gray-100 border border-gray-300 rounded-full appearance-none focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="" selected>Todas as categorias</option>
                    @foreach ($category as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </form>
        </div>










        <div class="flex-grow p-6 overflow-auto">
            <div class="grid grid-cols-3 gap-6">
                <div class="h-64 col-span-1 p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <livewire:apps />
                </div>
                <div class="h-64 col-span-2 p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <livewire:slide />
                </div>
                <div class="h-full col-span-3 p-6 bg-white border border-gray-100 rounded-md shadow-md shadow-black/5">
                    <livewire:posts />
                </div>
            </div>
        </div>



    </div>


</x-app-layout>
