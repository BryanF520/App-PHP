<?php

namespace App\Services;

use App\Contracts\EmpresaServiceInterface;
use App\Models\Empresa;

class EmpresaService implements EmpresaServiceInterface
{

    public function listarEmpresas()
    {
        return Empresa::all();
    }

    public function crearEmpresa(array $data)
    {
        return Empresa::create($data);
    }

    public function obtenerEmpresa(int $id)
    {
        return Empresa::find($id);
    }

    public function actualizarEmpresa(int $id, array $data)
    {
        $empresa = Empresa::find($id);
        $empresa->update($data);
        return $empresa;
    }

    public function desactivarEmpresa(int $id)
    {
        $empresa = Empresa::find($id);
        $empresa->delete();
        return $empresa;
    }
}
