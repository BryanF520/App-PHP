<?php

namespace App\Contracts;

use App\Models\Persona;

interface PersonaServiceInterface
{

    public function listarPersonas();
    public function crearPersona(array $data);
    public function obtenerPersona(int $id);
    public function actualizarPersona(int $id, array $data);
    public function desactivarPersona(int $id);
}
