<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <head>
            <link rel="stylesheet" href="{{ asset('css/register.css') }}">
        </head>
        <!-- Agregamos la clase form y las clases adecuadas al formulario -->
        <form method="POST" action="{{ route('register') }}" class="form">
            @csrf

            <p class="title">Register</p>
            <p class="message">Signup now and get full access to our app.</p>
            <div class="flex">
                <label>
                    <input required type="text" class="input" name="first_name" :value="old('first_name')" placeholder="">
                    <span>Firstname</span>
                </label>

                <label>
                    <input required type="text" class="input" name="last_name" :value="old('last_name')" placeholder="">
                    <span>Lastname</span>
                </label>
            </div>  

            <label>
                <input required type="email" class="input" name="email" :value="old('email')" placeholder="">
                <span>Email</span>
            </label>

            <label>
                <input required type="password" class="input" name="password" placeholder="">
                <span>Password</span>
            </label>
            <label>
                <input required type="password" class="input" name="password_confirmation" placeholder="">
                <span>Confirm Password</span>
            </label>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <button type="submit" class="submit">Submit</button>

            <p class="signin">Already have an account? <a href="{{ route('login') }}">Signin</a></p>
        </form>
    </x-authentication-card>
</x-guest-layout>