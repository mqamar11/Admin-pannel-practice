<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company', 'link', 'image'];


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
