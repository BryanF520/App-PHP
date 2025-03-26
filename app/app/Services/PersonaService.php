<?php

namespace App\Services;

use App\Contracts\PersonaServiceInterface;
use App\Models\Personas;

class PersonaService implements PersonaServiceInterface
{

    public function listarPersonas()
    {
        return Personas::all();
    }

    public function crearPersona(array $data)
    {
        return Personas::create($data);
    }

    public function obtenerPersona(int $id)
    {
        return Personas::find($id);
    }

    public function actualizarPersona(int $id, array $data)
    {
        $persona = Personas::find($id);
        $persona->update($data);
        return $persona;
    }

    public function desactivarPersona(int $id)
    {
        $persona = Personas::find($id);
        $persona->delete();
        return $persona;
    }
}
