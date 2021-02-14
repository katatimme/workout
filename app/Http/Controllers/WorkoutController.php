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

        return redirect('workouts')->with('message', 'Workout stored');

    }

    public function show(Request $request, $id) 
    {
        $workout = Workout::find(intval($id));

        if ($workout != null && $request->user()->id == $workout->user_id) {
            return view('workouts/edit', [
                'exercises' => Exercise::all(),
                'workout' => $workout
            ]);
        } else {
            return redirect('workouts');
        }
    
    }

    public function update(Request $request, $id)
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

        $workout = Workout::find(intval($id));

        if ($request->user()->id == $workout->user_id) {
            $workout->name = $request->name;
            $workout->user_id = $request->user()->id;
            $workout->difficulty = $request->difficulty;
            $workout->exercise0_id = intval($request->exercise0_id);
            $workout->exercise1_id = intval($request->exercise1_id);
            $workout->exercise2_id = intval($request->exercise2_id);
            $workout->exercise3_id = intval($request->exercise3_id);
            
            $workout->save();
            return redirect('workouts')->with('message', 'Workout updated');
        }

        return redirect('workouts')->with('message', 'Workout not updated');

    }

    public function delete(Request $request, $id)
    {
        $workout = Workout::find(intval($id));
        if ($request->user()->id == $workout->user_id) {
            $workout->delete();
            return redirect('workouts')->with('message', 'Workout deleted');
        } else {

            return redirect('workouts')->with('message', 'Workout could not be deleted');
        }


    }
}
