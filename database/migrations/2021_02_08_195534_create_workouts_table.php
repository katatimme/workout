<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('user_id')->constrained('users');
            $table->string('difficulty');
            $table->foreignId('exercise0_id')->constrained('exercises');
            $table->foreignId('exercise1_id')->constrained('exercises');
            $table->foreignId('exercise2_id')->constrained('exercises');
            $table->foreignId('exercise3_id')->constrained('exercises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workouts');
    }
}
