<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_doc extends Model
{
    protected $table = 'tipo_docs';
    protected $fillable = ['tipo_docs'];
    

    public function personas()
    {
        return $this->hasMany(Personas::class, 'tipo_doc');
    }
}
