<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Exercise;
use App\Models\Workout;

class WorkoutController extends Controller
{

    public function create(Request $request)
    {
        $exercises = array();
        foreach (Exercise::all() as $exercise) {
            $exercises[$exercise->id] = $exercise;
        }

        return view('workouts', [
            'exercises' => $exercises,
            'workouts' => Workout::where('user_id', $request->user()->id)->get()
        ]);
    }

    public function store(Request $request)
    {        

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'difficulty' => 'required',
            'exercise0_id' => 'required',
            'exercise1_id'=>'required',
            'exercise2_id' => 'required',
            'exercise3_id' => 'required'
        ]);

        $workout = new Workout;

        $workout->name = $request->name;
        $workout->user_id = $request->user()->id;
        $workout->difficulty = $request->difficulty;
        $workout->exercise0_id = intval($request->exercise0_id);
        $workout->exercise1_id = intval($request->exercise1_id);
        $workout->exercise2_id = intval($request->exercise2_id);
        $workout->exercise3_id = intval($request->exercise3_id);
        
        $workout->save();

        // dd($request->all());
        return redirect('workouts')->with('message', 'Workout stored');

    }
}
