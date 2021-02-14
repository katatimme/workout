<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        @if (Route::has('login'))
            <div class="fixed top-0 left-0 right-0 px-6 py-4 bg-gray-100 dark:bg-gray-900 flex justify-end bg-opacity-60 z-10">
                @auth
                    <a href="{{ url('/workouts') }}" class=" flex items-end text-sm text-w-700 underline">Dashboard</a>
                    <a href="{{ url('/workouts/new') }}" class="ml-4 px-2 py-1 w-auto rounded-md bg-green-500 hover:bg-green-600 focus:bg-green-700 text-sm text-white">New Workout</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="min-h-screen flex flex-col">
            <div style="background-image: url('/images/head.jpg');  background-position: center;  background-repeat: no-repeat;  background-size: cover;"
                class="w-full h-96 relative">
            </div>

            <div class="flex flex-1 flex-col items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                <div class="text-5xl font-semibold text-pink-500">
                    WORKOUT WITH A PLAN
                </div>
                <div class="mt-8 w-4/5 bg-white overflow-hidden shadow sm:rounded grid grid-cols-1 md:grid-cols-3">
                    <div class="p-6 col-span-1 border-t md:border-l">
                        <div class="flex items-center">
                            Custom
                        </div>
                        <div class="mt-2 text-gray-600 text-sm">
                            Do whatever suits you and what you want to achieve best. We think you're special!
                        </div>
                    </div>

                    <div class="p-6 col-span-1 border-t md:border-l">
                        <div class="flex items-center">
                            Goals
                        </div>
                        <div class="mt-2 text-gray-600 text-sm">
                            Set goals and check on them whenever. We can make it happen!
                        </div>
                    </div>

                    <div class="p-6 col-span-1 border-t md:border-l">
                        <div class="flex items-center">
                            Focus
                        </div>
                        <div class="mt-2 text-gray-600 text-sm">
                            Don't worry about what to do next or any timer status. We got you covered! 
                        </div>
                    </div>
                </div>
                <a href="{{ url('/exercises') }}" class="mt-8 px-4 py-2 w-auto flex items-center justify-center rounded-md bg-pink-500 text-xl text-white font-semibold hover:bg-pink-600 focus:bg-pink-700">All exercises</a>
            </div>
        </div>
    </body>
</html>
