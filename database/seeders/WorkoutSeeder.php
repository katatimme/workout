<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WorkoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('workouts')->insert([
            'name' => 'Casual Abs',
            'user_id' => '-1',
            'difficulty' => 'easy',
            'exercise0_id' => '1',
            'exercise1_id' => '6',
            'exercise2_id' => '8',
            'exercise3_id' => '9'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Killing It Legs',
            'user_id' => '-1',
            'difficulty' => 'hard',
            'exercise0_id' => '2',
            'exercise1_id' => '5',
            'exercise2_id' => '15',
            'exercise3_id' => '11'
        ]);
    }
}
