<?php

namespace App\Services;

use App\Contracts\AccesoServiceInterface;
use App\Models\Acceso;
use DateTime;

class AccesoService implements AccesoServiceInterface
{

    public function listarAccesos()
    {
        return Acceso::all();
    }

    public function crearAcceso(array $data)
    {
        return Acceso::create($data);
    }

    public function obtenerAcceso(int $id)
    {
        return Acceso::find($id);
    }

    public function actualizarAcceso(int $id, array $data)
    {
        $acceso = Acceso::find($id);
        $acceso->update($data);
        return $acceso;
    }

    public function desactivarAcceso(int $id)
    {
        $acceso = Acceso::find($id);
        $acceso->delete();
        return $acceso;
    }

    public function buscarPorFecha(string $fechaIngreso)
    {
        return Acceso::whereDate('fecha_ingreso', $fechaIngreso)->get();
    }
}
