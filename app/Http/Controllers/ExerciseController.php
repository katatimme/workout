<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Exercise;

class ExerciseController extends Controller
{
    public function show()
    {
        return view('exercises', [
            'exercises' => Exercise::all()
        ]);
    }

    public function new()
    {
        return view('workouts/new', [
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
    }
    

}
