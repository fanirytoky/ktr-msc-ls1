<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
                <img class="w-20 h-20 fill-current text-gray-500" src="{{url('images/logo/logo_icon.png')}}"/>

            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Company name -->
            <div class="mt-4">
                <x-label for="companyName" :value="__('Company name')" />

                <x-input id="companyName" class="block mt-1 w-full" type="text" name="companyName" :value="old('companyName')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="emailAddress" :value="__('Email address')" />

                <x-input id="emailAddress" class="block mt-1 w-full" type="email" name="emailAddress" :value="old('emailAddress')" required />
            </div>

            <!-- telephoneNumber -->
            <div class="mt-4">
                <x-label for="phoneNumber" :value="__('Phone number')" />

                <x-input id="phoneNumber" class="block mt-1 w-full" type="text" name="phoneNumber" :value="old('phoneNumber')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>