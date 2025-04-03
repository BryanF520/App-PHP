<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_doc extends Model
{
    protected $fillable = ['tipo_doc'];

    public function personas()
    {
        return $this->hasMany(Personas::class);
    }
}
