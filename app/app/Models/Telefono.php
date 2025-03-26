<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $fillable = ['id_persona', 'telefono'];

    public function persona()
    {
        return $this->belongsTo(Personas::class);
    }
}
