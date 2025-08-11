<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" 
                          :value="old('username', $user->username)" required autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <!-- Verjaardag -->
        <div>
            <x-input-label for="birthday" :value="__('Verjaardag')" />
            <x-text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full" 
                          :value="old('birthday', optional($user->birthday)->format('Y-m-d'))" autocomplete="bday" />
            <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
        </div>

        <!-- Profielfoto -->
        <div>
            <x-input-label for="profielfoto" :value="__('Profielfoto')" />
            <input id="profielfoto" name="profielfoto" type="file" accept="image/*" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('profielfoto')" />
            @if ($user->profielfoto)
                <img src="{{ asset('storage/' . $user->profielfoto) }}" alt="Profielfoto" class="h-24 w-24 rounded-full mt-2 object-cover" />
            @endif
        </div>

        <!-- Over mij -->
        <div>
            <x-input-label for="about" :value="__('Over mij')" />
            <textarea id="about" name="about" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200">{{ old('about', $user->about) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('about')" />
        </div>

        <!-- Email (zoals eerder) -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" 
                          :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <!-- Save button etc. -->
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
