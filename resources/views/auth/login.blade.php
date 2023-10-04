<x-intra-layout>
    <x-authentication-card>
       

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
        
        <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Senha') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <x-button>
                {{ __('Log in') }}
            </x-button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">
                @if (Route::has('password.request'))
                    <a class="text-primary-700 hover:underline dark:text-primary-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }} <a >Recupere</a> 
                    </a>
                @endif
            </div>

                
            </div>
        </form>
    </x-authentication-card>
</x-intra-layout>
