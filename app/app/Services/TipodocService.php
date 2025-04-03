<?php

namespace App\Services;

use App\Contracts\TipodocServiceInterface;
use App\Models\Tipo_doc;

class TipodocService implements TipodocServiceInterface
{
    public function listarTipodocs()
    {
        return Tipo_doc::all();
    }

    public function crearTipodoc(array $data)
    {
        return Tipo_doc::create($data);
    }

    public function obtenerTipodoc(int $id)
    {
        return Tipo_doc::find($id);
    }

    public function actualizarTipodoc(int $id, array $data)
    {
        $tipodoc = Tipo_doc::find($id);
        $tipodoc->update($data);
        return $tipodoc;
    }

    public function desactivarTipodoc(int $id)
    {
        $tipodoc = Tipo_doc::find($id);
        $tipodoc->delete();
        return $tipodoc;
    }
}
