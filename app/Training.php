<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'name',
        'language',
        'health',
        'publish',
        'due',
        'company'
    ];

protected $casts =[
    'company'=> 'array'
];
}
