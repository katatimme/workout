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

            <div class="flex flex-1 flex-col items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                <div class="text-5xl font-semibold text-pink-500">
                    ALL EXERCISES FOR YOUR WORKOUT
                </div>
                <div class="mt-8 w-4/5 bg-white overflow-hidden shadow sm:rounded grid grid-cols-1 md:grid-cols-3">
                    @foreach ($exercises as $exercise)
                        <div class="p-6 col-span-1 border-t md:border-l">
                            <div class="flex items-center font-semibold text-lg">
                                {{$exercise->name}}
                            </div>
                            <div class="grid-cols-3 text-gray-600">
                                <div>
                                    Easy: {{$exercise->easy}} reps
                                </div>
                                <div>
                                    Medium: {{$exercise->medium}} reps
                                </div>
                                <div>
                                    Hard: {{$exercise->hard}} reps
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
