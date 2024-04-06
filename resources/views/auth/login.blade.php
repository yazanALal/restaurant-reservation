<x-guest-layout>
    <div class="flex justify-center items-center h-screen bg-gray-200">
        <div class="w-full max-w-md p-6 bg-white rounded-md shadow-md">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" style="color: #4A5568;" />
                    <x-text-input id="email" class="block mt-1 w-full bg-white" type="email" name="email"
                        :value="old('email')" required autofocus autocomplete="username"
                        style="background-color: #FFFFFF; color: #000000;" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" style="color: #4A5568;" />

                    <x-text-input id="password" class="block mt-1 w-full bg-white" type="password" name="password"
                        required autocomplete="current-password" style="background-color: #FFFFFF; color: #000000;" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ml-3 hover:bg-gray-200" style="background-color: #000000; color: #FFFFFF;">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
