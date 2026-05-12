<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="w-4/5 md:w-4/5 lg:w-8/12 bg-white dark:bg-gray-800 shadow-md overflow-hidden rounded-lg px-2 py-2">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mt-4 flex flex-col items-center justify-between">
                <div class="w-9/12 lg:w-10/12">
                    <x-input-label class="lg:text-lg" for="email" :value="__('Email')" />
                    <x-text-input class="lg:text-lg" id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4 flex flex-col items-center justify-between">
                <div class="w-9/12 lg:w-10/12">
                    <x-input-label class="lg:text-lg" for="password" :value="__('Password')" />

                    <x-text-input class="lg:text-lg" id="password" class="block w-full mt-1"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>

            <!-- Remember Me -->
            <div class="mt-4 flex justify-center items-center sm:items-center">
                <div class="w-9/12 flex flex-col md:flex-row md:items-center md:justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                    <span class="ms-2 text-sm lg:text-lg text-gray-600 dark:text-gray-400">{{ __('Lembrar-me') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm lg:text-lg text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif
                </div>
            </div>
            
            <div class="flex flex-col justify-center items-center my-4">
                <div class="w-9/12 lg:w-10/12">
                    <x-primary-button class="lg:text-lg" style="background-color: #7C52B3;" class="w-full flex items-center justify-center">
                        {{ __('Entrar') }}
                    </x-primary-button>
                    <div class="text-sm lg:text-lg mt-2 flex items-center justify-center gap-1">
                        <span>Novo por aqui?</span>
                        <a style="color: #7C52B3;" class="font-bold underline text-sm lg:text-lg hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                            {{ __('Crie uma conta') }}
                        </a>
                    </div>
                </div>
            </div>
            <div>
                
            </div>
        </form>
    </div>
    
</x-guest-layout>
