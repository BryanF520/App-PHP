<?php

namespace App\Services;

use App\Contracts\TelefonoServiceInterface;
use App\Models\Telefono;

class TelefonoService implements TelefonoServiceInterface
{

    public function listarTelefonos()
    {
        return Telefono::all();
    }

    public function crearTelefono(array $data)
    {
        return Telefono::create($data);
    }

    public function obtenerTelefono(int $id)
    {
        return Telefono::find($id);
    }

    public function actualizarTelefono(int $id, array $data)
    {
        $telefono = Telefono::find($id);
        $telefono->update($data);
        return $telefono;
    }

    public function desactivarTelefono(int $id)
    {
        $telefono = Telefono::find($id);
        $telefono->delete();
        return $telefono;
    }
}
