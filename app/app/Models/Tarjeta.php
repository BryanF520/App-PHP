<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    protected $fillable = ['id_persona', 'estado'];

    public function persona()
    {
        return $this->belongsTo(Personas::class);
    }
}
