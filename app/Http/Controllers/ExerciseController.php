<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Exercise;

class ExerciseController extends Controller
{
    public function showForAll()
    {
        return view('exercises', [
            'exercises' => Exercise::all()
        ]);
    }

    public function showForNew()
    {
        return view('new-workout', [
            'exercises' => Exercise::all(),
        ]);
    }


    //
    /**
     * Store a new exercise in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request...

        $exercise = new Exercise;

        $exercise->name = $exercise->name;

        $exercise->easy = $exercise->easy;

        $exercise->medium = $exercise->medium;

        $exercise->hard = $exercise->hard;

        $exercise->save();
    }
    

}
