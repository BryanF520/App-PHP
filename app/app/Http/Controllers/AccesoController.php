<?php

namespace App\Http\Controllers;

use App\Models\Acceso;
use App\Models\Empresa;
use App\Models\Personas;
use Illuminate\Http\Request;
use App\Contracts\AccesoServiceInterface;
use App\Contracts\EmpresaServiceInterface;
use App\Contracts\PersonaServiceInterface;
use Faker\Provider\ar_EG\Person;

class AccesoController extends Controller
{
    protected $accesoService;
    protected $empresaService;
    protected $personaService;

    public function __construct(AccesoServiceInterface $accesoService, EmpresaServiceInterface $empresaService, PersonaServiceInterface $personaService)
    {
        $this->empresaService = $empresaService;
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
        $personas = Personas::all();
        $empresas = Empresa::all();
        return view('accesos.create', compact('personas', 'empresas'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'persona_id' => 'required',
            'motivo' => 'required',
            'fecha_ingreso' => 'required',
            'empresa_id' => 'required'
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
            'persona_id' => 'required',
            'motivo' => 'required',
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

    public function buscar(Request $request)
    {
        // Validar que se haya proporcionado una fecha válida
        $request->validate([
            'fecha_ingreso' => 'required|date',
        ]);

        // Obtener la fecha de ingreso desde el formulario
        $fechaIngreso = $request->input('fecha_ingreso');

        // Usar el servicio para buscar accesos por fecha
        $accesos = $this->accesoService->buscarPorFecha($fechaIngreso);

        // Retornar una vista con los resultados
        return view('accesos.resultados', compact('accesos', 'fechaIngreso'));
    }
}


