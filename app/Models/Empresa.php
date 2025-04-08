<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['nit', 'nombre', 'area', 'contacto', 'ubicacion'];

    public function acceso()
    {
        return $this->hasMany(Acceso::class);
    }
}
