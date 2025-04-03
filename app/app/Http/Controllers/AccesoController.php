<?php

namespace App\Http\Controllers;

use App\Models\Acceso;
use Illuminate\Http\Request;
use App\Contracts\AccesoServiceInterface;

class AccesoController extends Controller
{
    protected $accesoService;

    public function __construct(AccesoServiceInterface $accesoService)
    {
        $this->accesoService = $accesoService;
    }
    public function index()
    {
        $this->accesoService->listarAccesos();
        return view('accesos.index', compact('accesos'));
    }


    public function create()
    {
        return view('accesos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'persona_id' => 'required',
            'motivo' => 'required',
            'estado' => 'required',
            'fecha_ingreso' => 'required',
            'empresa_id' => 'required'
        ]);

        $this->accesoService->crearAcceso($request->all());
        return redirect()->route('accesos.index')->with('success', 'Acceso creado correctamente');
    }


    public function show($id)
    {
        $persona = $this->accesoService->obtenerAcceso($id);
        return view('accesos.show', compact('acceso'));
    }


    public function edit($id)
    {
        $acceso = $this->accesoService->obtenerAcceso($id);
        return view('accesos.edit', compact('acceso'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'persona_id' => 'required',
            'motivo' => 'required',
            'estado' => 'required',
            'fecha_ingreso' => 'required',
            'empresa_id' => 'required'
        ]);

        $this->accesoService->actualizarAcceso($id, $request->all());
        return redirect()->route('accesos.index')->with('success', 'Acceso actualizado correctamente');
    }


    public function destroy($id)
    {
        $this->accesoService->desactivarAcceso($id);
        return redirect()->route('accesos.index')->with('success', 'Acceso eliminado correctamente');
    }
}
