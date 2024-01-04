<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <!--

        User::insert([
    [
        'name' => "Taylor Otweel",
        'email' => "taylor@laravel.com",
        'password' => bcrypt('password'),
        'profile_photo_path' => "https://pbs.twimg.com/profile_images/1694737709166899200/EQkjv0gi_400x400.jpg"
    ],
    [
        'name' => "Mohamed Said",
        'email' => "mohamed@laravel.com",
        'password' => bcrypt('password'),
        'profile_photo_path' => "https://pbs.twimg.com/profile_images/1528620344055037955/oJY73Gp9_400x400.jpg"
    ],
    [
        'name' => "Dries Vints",
        'email' => "dries@laravel.com",
        'password' => bcrypt('password'),
        'profile_photo_path' => "https://pbs.twimg.com/profile_images/1705128067688005632/9qNdhalh_400x400.jpg"
    ],
    [
        'name' => "Nuno Maduro",
        'email' => "nuno@laravel.com",
        'password' => bcrypt('password'),
        'profile_photo_path' => "https://pbs.twimg.com/profile_images/1573244584943042560/9Mq8p_QH_400x400.jpg"
    ],
     [
        'name' => "James Brooks",
        'email' => "james@laravel.com",
        'password' => bcrypt('password'),
        'profile_photo_path' => "https://pbs.twimg.com/profile_images/1728701948876947456/BZ0GPo_b_400x400.jpg"
    ],
       [
        'name' => "Joe Dixon",
        'email' => "joe@laravel.com",
        'password' => bcrypt('password'),
        'profile_photo_path' => "https://pbs.twimg.com/profile_images/1635394346089340928/ZZ-H1GZn_400x400.jpg"
    ],
     [
        'name' => "Jess Archer",
        'email' => "jess@laravel.com",
        'password' => bcrypt('password'),
        'profile_photo_path' => "https://pbs.twimg.com/profile_images/1727582257509277696/v4dIgS5-_400x400.jpg"
    ],
     [
        'name' => "Tim MacDonald",
        'email' => "tim@laravel.com",
        'password' => bcrypt('password'),
        'profile_photo_path' => "https://pbs.twimg.com/profile_images/1550646512384114688/zZE9rQay_400x400.jpg"
    ],
    [
        'name' => "Guus Leeuw",
        'email' => "guus@laravel.com",
        'password' => bcrypt('password'),
        'profile_photo_path' => "https://pbs.twimg.com/profile_images/1192086638291308544/mGuSJlRu_400x400.jpg"
    ],
     [
        'name' => "Mior Muhammad Zaki Mior Khairuddin",
        'email' => "mior@laravel.com",
        'password' => bcrypt('password'),
        'profile_photo_path' => "https://pbs.twimg.com/profile_images/1319778200638025729/Nhg36st9_400x400.jpg"
    ],


])
-->

        <x-login-link label="Christoph"  email="christoph@laravel.com" />
        <x-login-link label="Taylor"     email="taylor@lravel.com" />
            <x-login-link label="Mohamed"    email="mohamed@laravel.com" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
