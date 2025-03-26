<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $fillable  = ['rol'];

    public function personas()
    {
        return $this->hasMany(Personas::class);
    }
}
