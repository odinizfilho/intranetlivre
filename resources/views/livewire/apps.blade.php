<div>
    <div class="mb-8">
        <p class="mb-3 text-lg font-semibold">Aplicativos</p>
        <hr class="mb-4">
        <div class="grid h-32 grid-cols-1 gap-4 overflow-y-auto md:grid-cols-3">
            <!-- item -->
            @foreach ($apps as $app)
                @if ($app->active)
                    <!-- item-inicio -->
                    <a href="{{ $app->app_link }}" target="_blank" title="{{ $app->name }}">
                        <div
                            class="flex flex-col items-center  rounded-md p-1.5 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-slate-800">
                            <img src="{{ $app->image_url }}" alt="{{ $app->name }}" width="40" height="40"
                                class="mb-2">
                            <p class="text-gray-800">{{ $app->name }}</p>
                        </div>
                    </a>
                    <!-- item-fim -->
                @endif
            @endforeach
        </div>
    </div>
</div>
