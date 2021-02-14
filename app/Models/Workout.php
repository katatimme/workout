<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'difficulty',
        'exercise0_id',
        'exercise1_id',
        'exercise2_id',
        'exercise3_id'
    ];

    public $timestamps = false;
}
