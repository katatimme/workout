<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\WorkoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/exercises', [ExerciseController::class, 'show']);

Route::get('/workouts', [WorkoutController::class, 'create'])
->middleware(['auth'])
->name('workouts')
->name('logout');

Route::get('/workouts/new', [ExerciseController::class, 'get'])->middleware(['auth']);
Route::post('/workouts/new', [WorkoutController::class, 'store'])->middleware(['auth']);
Route::get('/workouts/{id}', [WorkoutController::class, 'show'])->middleware(['auth']);
Route::put('/workouts/{id}', [WorkoutController::class, 'update'])->middleware(['auth']);
Route::delete('/workouts/{id}', [WorkoutController::class, 'delete'])->middleware(['auth']);

require __DIR__.'/auth.php';
