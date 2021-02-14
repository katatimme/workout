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
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>
    <body class="antialiased">
        @if (Route::has('login'))
            @auth
            <div class="fixed top-0 left-0 right-0 px-6 py-4 bg-gray-100 dark:bg-gray-900 flex justify-end bg-opacity-60 z-10">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="ml-4 text-sm text-gray-700 underline">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

            <div class="min-h-screen flex flex-col">

                <div class="flex flex-1 flex-col items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                    @if(empty($workouts))
                        <div class="text-3xl font-semibold text-pink-500">
                            Dang, you haven't added any workouts. Create one right away, so you can start in no time!
                        </div>
                    @endif
                    <div class="text-5xl font-semibold text-green-500">
                        MY WORKOUTS
                        </div>
                    <div class="mt-12 flex">
                        @foreach($workouts as $workout)
                            <div class="mx-4" x-data="{difficulty: '{{$workout->difficulty}}'}">
                                <div class="flex justify-center text-lg font-semibold text-gray-700">
                                    {{$workout->name}}
                                </div>
                                <div class="w-48 bg-white overflow-hidden shadow sm:rounded grid grid-cols-1">
                                    <div 
                                        class="h-24 px-2 py-4 col-span-1 border-t md:border-l"
                                        x-bind:class="{'bg-pink-100': difficulty == 'easy',
                                            'bg-pink-200': difficulty == 'medium',
                                            'bg-pink-300': difficulty == 'hard'}"
                                        >
                                        <div 
                                            class="text-center font-semibold text-lg"
                                            x-bind:class="{'text-green-600': difficulty == 'easy',
                                                'text-green-700': difficulty == 'medium',
                                                'text-green-800': difficulty == 'hard'}"
                                            >
                                            {{$exercises[$workout->exercise0_id]->name}}
                                        </div>
                                        <div 
                                            class="text-center"
                                            x-bind:class="{'text-gray-500': difficulty == 'easy',
                                                'text-gray-600': difficulty == 'medium',
                                                'text-gray-700': difficulty == 'hard'}"
                                            >
                                            {{$exercises[$workout->exercise0_id][$workout->difficulty]}} reps
                                        </div>
                                    </div>
                                    <div 
                                        class="h-24 px-2 py-4 col-span-1 border-t md:border-l"
                                        x-bind:class="{'bg-pink-100': difficulty == 'easy',
                                            'bg-pink-200': difficulty == 'medium',
                                            'bg-pink-300': difficulty == 'hard'}"
                                        >
                                        <div 
                                            class="flex justify-center font-semibold text-lg"
                                            x-bind:class="{'text-green-600': difficulty == 'easy',
                                                'text-green-700': difficulty == 'medium',
                                                'text-green-800': difficulty == 'hard'}"
                                            >
                                            {{$exercises[$workout->exercise1_id]->name}}
                                        </div>
                                        <div 
                                            class="text-center"
                                            x-bind:class="{'text-gray-500': difficulty == 'easy',
                                                'text-gray-600': difficulty == 'medium',
                                                'text-gray-700': difficulty == 'hard'}"
                                            >
                                            {{$exercises[$workout->exercise1_id][$workout->difficulty]}} reps
                                        </div>
                                    </div>
                                    <div 
                                        class="h-24 px-2 py-4 col-span-1 border-t md:border-l"
                                        x-bind:class="{'bg-pink-100': difficulty == 'easy',
                                            'bg-pink-200': difficulty == 'medium',
                                            'bg-pink-300': difficulty == 'hard'}"
                                        >
                                        <div 
                                            class="text-center font-semibold text-lg"
                                            x-bind:class="{'text-green-600': difficulty == 'easy',
                                                'text-green-700': difficulty == 'medium',
                                                'text-green-800': difficulty == 'hard'}"
                                            >
                                            {{$exercises[$workout->exercise2_id]->name}}
                                        </div>
                                        <div 
                                            class="text-center"
                                            x-bind:class="{'text-gray-500': difficulty == 'easy',
                                                'text-gray-600': difficulty == 'medium',
                                                'text-gray-700': difficulty == 'hard'}"
                                            >
                                            {{$exercises[$workout->exercise2_id][$workout->difficulty]}} reps
                                        </div>
                                    </div>
                                    <div 
                                        class="h-24 px-2 py-4 col-span-1 border-t md:border-l"
                                        x-bind:class="{'bg-pink-100': difficulty == 'easy',
                                            'bg-pink-200': difficulty == 'medium',
                                            'bg-pink-300': difficulty == 'hard'}"
                                        >
                                        <div 
                                            class="text-center font-semibold text-lg"
                                            x-bind:class="{'text-green-600': difficulty == 'easy',
                                                'text-green-700': difficulty == 'medium',
                                                'text-green-800': difficulty == 'hard'}"
                                            >
                                            {{$exercises[$workout->exercise3_id]->name}}
                                        </div>
                                        <div 
                                            class="text-center"
                                            x-bind:class="{'text-gray-500': difficulty == 'easy',
                                                'text-gray-600': difficulty == 'medium',
                                                'text-gray-700': difficulty == 'hard'}"
                                            >
                                            {{$exercises[$workout->exercise3_id][$workout->difficulty]}} reps
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ url('/workouts/new') }}" class="mt-8 px-4 py-2 w-auto flex items-center justify-center rounded-md bg-green-500 text-xl text-white font-semibold hover:bg-green-600 focus:bg-green-700">New Workout</a>
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
