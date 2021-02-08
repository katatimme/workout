<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exercises')->insert([
            'name' => 'Ab bikes',
            'easy' => '24',
            'medium' => '40',
            'hard' => '60'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Burpees',
            'easy' => '10',
            'medium' => '15',
            'hard' => '20'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Commandos',
            'easy' => '16',
            'medium' => '24',
            'hard' => '30'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Leg raises with hip lift',
            'easy' => '15',
            'medium' => '20',
            'hard' => '30'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Medicine ball squat press',
            'easy' => '15',
            'medium' => '20',
            'hard' => '30'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Mountain climbers',
            'easy' => '40',
            'medium' => '50',
            'hard' => '60'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Push ups',
            'easy' => '10',
            'medium' => '15',
            'hard' => '20'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Sciccor kicks',
            'easy' => '20',
            'medium' => '40',
            'hard' => '60'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Sit ups',
            'easy' => '15',
            'medium' => '20',
            'hard' => '30'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Squats',
            'easy' => '15',
            'medium' => '20',
            'hard' => '30'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Step ups',
            'easy' => '16',
            'medium' => '24',
            'hard' => '30'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Straight leg jacknifes',
            'easy' => '10',
            'medium' => '15',
            'hard' => '20'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Triceps dips',
            'easy' => '15',
            'medium' => '20',
            'hard' => '30'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Tuck jumps',
            'easy' => '10',
            'medium' => '15',
            'hard' => '20'
        ]);
        DB::table('exercises')->insert([
            'name' => 'Walking lunges',
            'easy' => '24',
            'medium' => '30',
            'hard' => '40'
        ]);
    }
}
