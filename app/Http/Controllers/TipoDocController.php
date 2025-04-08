<?php

namespace App\Http\Controllers;

use App\Models\Tipo_doc;
use Illuminate\Http\Request;
use App\Contracts\TipodocServiceInterface;

class TipoDocController extends Controller
{

    protected $tipodocService;

    public function __construct(TipodocServiceInterface $tipodocService)
    {
        $this->tipodocService = $tipodocService;
    }
    public function index()
    {
        $tipodocs = $this->tipodocService->listarTipodocs();
        return view('tipodocs.index', compact('tipodocs'));
    }

    public function create()
    {
        return view('tipodocs.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'tipo_doc' => 'required'
        ]);

        $this->tipodocService->crearTipodoc($request->all());
        return redirect()->route('tipodocs.index')->with('success', 'Tipo de documento creado correctamente');
    }

    public function show($id)
    {
        $tipodoc = $this->tipodocService->obtenerTipodoc($id);
        return view('tipodocs.show', compact('tipodoc'));
    }

    public function edit($id)
    {
        $tipodoc = $this->tipodocService->obtenerTipodoc($id);
        return view('tipodocs.edit', compact('tipodoc'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_doc' => 'required'
        ]);

        $this->tipodocService->actualizarTipodoc($id, $request->all());
        return redirect()->route('tipodocs.index')->with('success', 'Tipo de documento actualizado correctamente');
    }

    public function destroy($id)
    {
        $this->tipodocService->desactivarTipodoc($id);
        return redirect()->route('tipodocs.index')->with('success', 'Tipo de documento desactivado correctamente');
    }
}
