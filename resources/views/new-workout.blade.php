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
            <div class="fixed top-0 left-0 right-0 px-6 py-4 flex justify-end z-10">
                <a href="{{ url('/dashboard') }}" class="text-md text-pink-600 underline">Cancel</a>
            </div>

            <div class="min-h-screen flex flex-col">

                <form
                    x-data="{
                        showModal: false,
                        exercises: {{$exercises->toJson()}},
                        difficulty: 'medium',
                        selected: [null, null, null, null],
                        newWorkoutFor: null
                    }"
                    class="flex flex-1 flex-col items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
                    <div class="text-5xl font-semibold text-pink-500">
                        CREATE A NEW WORKOUT
                    </div>
                    <div class="mt-20 text-gray-500 font-semibold">Choose a name:</div>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="text" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-4 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="My workout name">
                    </div>
                    <div class="mt-8 text-gray-500 font-semibold">Choose a difficulty:</div>
                    <div class="mt-1 flex">
                        <label class="rounded-full h-24 w-24 flex items-center justify-center bg-gray-300 text-green-800 text-xl font-semibold"
                            x-bind:class="{'bg-pink-300 border border-green-800': difficulty == 'easy'}"
                            @click="difficulty = 'easy'">
                            Easy
                            <input class="hidden" type="radio" id="easy" name="difficulty" value="easy"></input>
                        </label>
                        <label class="mx-4 rounded-full h-24 w-24 flex items-center justify-center bg-gray-500 text-green-300 text-xl font-semibold"
                            x-bind:class="{'bg-pink-700 border border-green-300': difficulty == 'medium'}"
                            @click="difficulty = 'medium'">
                            Medium
                            <input class="hidden" type="radio" id="medium" name="difficulty" value="medium"></input>
                        </label>

                        <label class="rounded-full h-24 w-24 flex items-center justify-center bg-gray-700 text-green-200 text-xl font-semibold"
                            x-bind:class="{'bg-pink-900 border border-green-200': difficulty == 'hard'}"
                            @click="difficulty = 'hard'">
                            Hard
                            <input class="hidden" type="radio" id="hard" name="difficulty" value="hard"></input>
                        </label>
                    </div>
                    <div class="mt-8 text-gray-500 font-semibold">Choose the exercises:</div>
                    <div class="mt-1 w-48 bg-white overflow-hidden shadow sm:rounded grid grid-cols-1">
                        <template x-for="(exercise, index) in selected" :key="exercise ? exercise.name : index">
                            <div>
                                <template x-if='exercise == null'>
                                    <div class="h-24 flex items-center justify-center text-6xl font-bold text-green-500 col-span-1 border-t md:border-l"
                                        @click="
                                            showModal = true
                                            newWorkoutFor = index
                                        "
                                        >
                                        +
                                    </div>
                                </template>
                                <template x-if='exercise != null'>
                                    <div class="h-24 px-2 py-4 col-span-1 border-t md:border-l"
                                        x-bind:class="{'bg-pink-300': difficulty == 'easy',
                                            'bg-pink-700': difficulty == 'medium',
                                            'bg-pink-900': difficulty == 'hard'}"
                                        @click="
                                            showModal = true
                                            newWorkoutFor = index
                                        "
                                        >
                                        <div class="text-center font-semibold text-lg"
                                            x-bind:class="{'text-green-800': difficulty == 'easy',
                                                'text-green-300': difficulty == 'medium',
                                                'text-green-200': difficulty == 'hard'}"
                                            x-text="exercise.name">

                                        </div>
                                        <div class="text-center"
                                            x-bind:class="{'text-gray-700': difficulty == 'easy',
                                                'text-gray-400': difficulty == 'medium',
                                                'text-gray-300': difficulty == 'hard'}">
                                            <span x-text="exercise[difficulty]"></span>
                                            reps
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>
                    <div x-cloak x-show="showModal" class="fixed inset-0 z-10 bg-black bg-opacity-20">
                        <div class="h-full w-full flex justify-center items-center">
                            <div
                                class="relative bg-white rounded p-4 inline-block max-w-full"
                                @click.away="showModal = false"
                                >
                                <div class="absolute top-0 right-0 flex justify-center items-center h-8 w-8 text-2xl font-semibold text-pink-600"
                                    @click="showModal = false"
                                    >
                                    ×
                                </div>
                                <div class="flex items-center justify-center p-4">
                                    <div class="bg-white overflow-hidden shadow sm:rounded grid grid-cols-1 md:grid-cols-3">
                                        <template x-for="(exercise, index) in exercises" :key="exercise">
                                            <div class="h-24 px-2 py-4 col-span-1 border-t md:border-l hover:bg-green-500"
                                                x-bind:class="{'bg-pink-300 hover:bg-green-300': difficulty == 'easy',
                                                    'bg-pink-700 hover:bg-green-700': difficulty == 'medium',
                                                    'bg-pink-900 hover:bg-green-900': difficulty == 'hard'}"
                                                @click="
                                                    selected[newWorkoutFor] = exercise
                                                    showModal = false
                                                ">
                                                <div class="text-center font-semibold text-lg"
                                                    x-bind:class="{'text-green-800 hover:text-pink-800': difficulty == 'easy',
                                                        'text-green-300 hover:text-pink-300': difficulty == 'medium',
                                                        'text-green-200 hover:text-pink-200': difficulty == 'hard'}"
                                                    x-text="exercise.name">
                                                </div>
                                                <div class="text-center"
                                                    x-bind:class="{'text-gray-700': difficulty == 'easy',
                                                        'text-gray-400': difficulty == 'medium',
                                                        'text-gray-300': difficulty == 'hard'}">
                                                    <span x-text="exercise[difficulty]"></span>
                                                    reps
                                                </div>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>  
                        </div>  
                    </div>

                    <a href="{{ url('/dashboard') }}" class="mt-8 px-4 py-2 w-auto flex items-center justify-center rounded-md bg-green-500 text-xl text-white font-semibold hover:bg-green-600 focus:bg-green-700">Save</a>
                </form>
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
