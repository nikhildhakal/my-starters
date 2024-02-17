<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @bukStyles
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <main class="p-6">
                {{-- HTML --}}
                <x-ui-html :title="isset($title) ? $title . ' - ' . config('app.name') : ''">
                    {{-- META --}}
                    <x-ui-social-meta
                        title="Hello World"
                        card="summary"
                        description="Blade components are awesome!"
                        image="http://example.com/social.jpg"
                    />
                    {{-- Alert --}}
                    <x-ui-alert type="success" class="bg-green-700 text-green-100 p-4 rounded" />
                    {{-- Trix Editor --}}
                    <div class="sm:flex border border-gray-400 rounded mt-4 p-5">
                        <x-ui-trix name="about" class="p-1" styling="trix-styles" />
                    </div>
                    {{-- Form --}}
                    <div class="sm:flex border border-gray-400 rounded mt-4 p-6">
                        <x-ui-form action="http://example.com" has-files>
                            <x-ui-label for="checkbox" />
                            <x-ui-checkbox name="remember_me"/><br/>

                            <x-ui-label for="color_picker" />
                            <x-ui-color-picker name="color" /><br/>

                            <x-ui-label for="email_input" />
                            <x-ui-email name="email_address" class="p-1" /><br/>
                            {{-- Flatpickr --}}
                            <x-ui-label for="datetime_input" />
                            <x-ui-flat-pickr name="birthday" /><br/>

                            <x-ui-label for="input_type_password" />
                            <x-ui-input name="confirm_password" id="confirmPassword" type="password" class="p-1" />
                            <x-ui-password name="my_password" class="p-1" />

                            <x-ui-textarea name="about"/>
                        </x-ui-form>
                    </div>
                    {{-- Dropdown --}}
                    <x-ui-dropdown class="bg-green-700 text-green-100 p-1 rounded">
                        <x-slot name="trigger">
                            <button>Dries</button>
                        </x-slot>
                    
                        <a href="#">Profile</a>
                        <a href="#">Settings</a>
                        <a href="#">Logout</a>
                    </x-ui-dropdown>
                    {{-- Avatar --}}
                    <x-ui-avatar search="john@example.com" provider="gravatar" fallback="https://unavatar.now.sh/gravatar/john@example.com" />
                </x-ui-html>
                
            </main>
            <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                            {{-- Form Button --}}
                            <x-ui-logout class="p-2 bg-red-500 text-white rounded" />
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
        
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>
        @bukScripts
    </body>
</html>
