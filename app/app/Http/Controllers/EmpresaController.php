<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Contracts\EmpresaServiceInterface;

class EmpresaController extends Controller
{
    protected $empresasService;

    public function __construct(EmpresaServiceInterface $empresaService)
    {
        $this->empresasService = $empresaService;
    }

    public function index()
    {
        $empresas = $this->empresasService->listarEmpresas();
        return view('empresas.index', compact('empresas'));
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nit' => 'required|unique:empresas',
            'nombre' => 'required',
            'area' => 'required',
            'contacto' => 'required',
            'ubicacion' => 'required',
        ]);

        $this->empresasService->crearEmpresa($request->all());
        return redirect()->route('empresas.index')->with('success', 'Empresa creada correctamente');
    }

    public function show($id)
    {
        $empresa = $this->empresasService->obtenerEmpresa($id);
        return view('empresas.show', compact('empresa'));
    }

    public function edit($id)
    {
        $empresa = $this->empresasService->obtenerEmpresa($id);
        return view('empresas.edit', compact('empresa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nit' => 'required|unique:empresas,nit,' . $id,
            'nombre' => 'required',
            'area' => 'required',
            'contacto' => 'required',
            'ubicacion' => 'required',
        ]);

        $empresa = $this->empresasService->actualizarEmpresa($id, $request->all());
        return redirect()->route('empresas.index')->with('success', 'Empresa actualizada correctamente');
    }

    public function destroy($id)
    {
        $this->empresasService->desactivarEmpresa($id);
        return redirect()->route('empresas.index')->with('success', 'Empresa eliminada correctamente');
    }
}
