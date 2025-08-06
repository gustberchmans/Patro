<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Voornaam -->
        <div class="mt-4">
            <x-input-label for="voornaam" :value="__('Voornaam')" />
            <x-text-input id="voornaam" class="block mt-1 w-full" type="text" name="voornaam" :value="old('voornaam')" required />
            <x-input-error :messages="$errors->get('voornaam')" class="mt-2" />
        </div>

        <!-- Achternaam -->
        <div class="mt-4">
            <x-input-label for="achternaam" :value="__('Achternaam')" />
            <x-text-input id="achternaam" class="block mt-1 w-full" type="text" name="achternaam" :value="old('achternaam')" required />
            <x-input-error :messages="$errors->get('achternaam')" class="mt-2" />
        </div>

        <!-- Verjaardag -->
        <div class="mt-4">
            <x-input-label for="verjaardag" :value="__('Verjaardag')" />
            <x-text-input id="verjaardag" class="block mt-1 w-full" type="date" name="verjaardag" :value="old('verjaardag')" required />
            <x-input-error :messages="$errors->get('verjaardag')" class="mt-2" />
        </div>

        <!-- Profielfoto -->
        <div class="mt-4">
            <x-input-label for="profielfoto" :value="__('Profielfoto')" />
            <input id="profielfoto" class="block mt-1 w-full" type="file" name="profielfoto" accept="image/*" />
            <x-input-error :messages="$errors->get('profielfoto')" class="mt-2" />
        </div>

        <!-- About me -->
        <div class="mt-4">
            <x-input-label for="about_me" :value="__('About me')" />
            <textarea id="about_me" class="block mt-1 w-full rounded-md border-gray-300" name="about_me" rows="3">{{ old('about_me') }}</textarea>
            <x-input-error :messages="$errors->get('about_me')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
