<?php

namespace App\Http\Controllers;

use App\Models\Acceso;
use Illuminate\Http\Request;
use App\Contracts\AccesoServiceInterface;
use App\Contracts\PersonaServiceInterface;
use App\Models\Personas;
use App\Models\Empresa;
use app\Contracts\EmpresaServiceInterface;


class AccesoController extends Controller
{
    protected $accesoService;
    protected $personaService;



    public function __construct(AccesoServiceInterface $accesoService, PersonaServiceInterface $personaService)
    {
        $this->personaService = $personaService;
        $this->accesoService = $accesoService;
    }
    public function index()
    {
        $accesos = $this->accesoService->listarAccesos();
        return view('accesos.index', compact('accesos'));
    }


    public function create()
    {
        return view('accesos.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'persona_id' => 'required|unique:accesos',
            'motivo' => 'required',
            'fecha_ingreso' => 'required',
            'empresa_id' => 'required|unique:accesos',
        ]);
        
        $this->accesoService->crearAcceso($request->all());
        return redirect()->route('accesos.index')->with('success', 'Acceso creado correctamente');
    }


    public function show($id)
    {
        $acceso = $this->accesoService->obtenerAcceso($id);
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
            'persona_id' => 'required|unique:accesos,persona_id,' . $id,
            'motivo' => 'required',
            'fecha_ingreso' => 'required',
            'empresa_id' => 'required|unique:accesos,empresa_id,' . $id,
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

