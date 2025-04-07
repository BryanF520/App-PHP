<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    protected $fillable = ['persona_id', 'motivo', 'fecha_ingreso', 'empresa_id'];

    public function persona()
    {
        return $this->belongsTo(Personas::class, 'persona_id', 'id');
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }
}
