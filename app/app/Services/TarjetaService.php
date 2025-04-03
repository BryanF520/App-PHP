<?php

namespace App\Services;

use App\Contracts\TarjetaServiceInterface;
use App\Models\Tarjeta;

class TarjetaService implements TarjetaServiceInterface
{

    public function listarTarjetas()
    {
        return Tarjeta::all();
    }

    public function crearTarjeta(array $data)
    {
        return Tarjeta::create($data);
    }

    public function obtenerTarjeta(int $id)
    {
        return Tarjeta::find($id);
    }

    public function actualizarTarjeta(int $id, array $data)
    {
        $tarjeta = Tarjeta::find($id);
        $tarjeta->update($data);
        return $tarjeta;
    }

    public function desactivarTarjeta(int $id)
    {
        $tarjeta = Tarjeta::find($id);
        $tarjeta->delete();
        return $tarjeta;
    }
}
