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
            @auth
            <div class="fixed top-0 left-0 right-0 px-6 py-4 bg-gray-100 dark:bg-gray-900 flex justify-end bg-opacity-60 z-10">
                <a href="{{ url('/') }}" class="ml-4 text-sm text-gray-700 underline">Logout</a>
            </div>

            <div class="min-h-screen flex flex-col">

                <div class="flex flex-1 flex-col items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                    <div class="text-5xl font-semibold text-pink-500">
                        MY WORKOUTS
                        </div>
                    <div class="mt-12 flex">
                        <div>
                            <div class="flex justify-center text-lg font-semibold text-gray-700">Casual Abs</div>
                            <div class="w-48 bg-white overflow-hidden shadow sm:rounded grid grid-cols-1">
                                <div class="h-24 px-2 py-4 bg-pink-300 col-span-1 border-t md:border-l">
                                    <div class="text-center font-semibold text-lg text-green-800">
                                        Ab bikes
                                    </div>
                                    <div class="text-center text-gray-700">
                                        24 reps
                                    </div>
                                </div>
                                <div class="h-24 px-2 py-4 bg-pink-300 col-span-1 border-t md:border-l">
                                    <div class="flex justify-center font-semibold text-lg text-green-800">
                                        Mountain climbers
                                    </div>
                                    <div class="text-center text-gray-700">
                                        40 reps
                                    </div>
                                </div>
                                <div class="h-24 px-2 py-4 bg-pink-300 col-span-1 border-t md:border-l">
                                    <div class="text-center font-semibold text-lg text-green-800">
                                        Sciccor kicks
                                    </div>
                                    <div class="text-center text-gray-700">
                                        20 reps
                                    </div>
                                </div>
                                <div class="h-24 px-2 py-4 bg-pink-300 col-span-1 border-t md:border-l">
                                    <div class="text-center font-semibold text-lg text-green-800">
                                        Sit ups
                                    </div>
                                    <div class="text-center text-gray-700">
                                        15 reps
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-8">
                            <div class="flex justify-center text-lg font-semibold text-gray-700">Killing it legs</div>
                            <div class="w-48 bg-white overflow-hidden shadow sm:rounded grid grid-cols-1">
                                <div class="h-24 px-2 py-4 bg-pink-900 col-span-1 border-t md:border-l">
                                    <div class="text-center font-semibold text-lg text-green-200">
                                    Burpees
                                    </div>
                                    <div class="text-center text-gray-300">
                                        20 reps
                                    </div>
                                </div>
                                <div class="h-24 px-2 py-4 bg-pink-900 col-span-1 border-t md:border-l">
                                    <div class="text-center font-semibold text-lg text-green-200">
                                        Medicine ball squat clean press
                                    </div>
                                    <div class="text-center text-gray-300">
                                        30 reps
                                    </div>
                                </div>
                                <div class="h-24 px-2 py-4 bg-pink-900 col-span-1 border-t md:border-l">
                                    <div class="text-center font-semibold text-lg text-green-200">
                                        Walking lunges
                                    </div>
                                    <div class="text-center text-gray-300">
                                        40 reps
                                    </div>
                                </div>
                                <div class="h-24 px-2 py-4 bg-pink-900 col-span-1 border-t md:border-l">
                                    <div class="text-center font-semibold text-lg text-green-200">
                                        Step ups
                                    </div>
                                    <div class="text-center text-gray-300">
                                        30 reps
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('/new-workout') }}" class="mt-8 px-4 py-2 w-auto flex items-center justify-center rounded-md bg-green-500 text-xl text-white font-semibold hover:bg-green-600 focus:bg-green-700">New Workout</a>
                </div>
            </div>

            @else
                <a href="{{ route('login') }}" class="mt-20 px-4 py-2 w-auto flex items-center justify-center rounded-md bg-green-500 text-2xl text-white font-semibold hover:bg-green-600 focus:bg-green-700">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="mt-20 px-4 py-2 w-auto flex items-center justify-center rounded-md bg-pink-500 text-2xl text-white font-semibold hover:bg-pink-600 focus:bg-pink-700">Login</a>
                @endif
            @endauth
        @endif
    </body>
</html>
