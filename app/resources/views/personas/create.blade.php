@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Crear Persona</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('personas.store') }}">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="tipo_doc" class="form-label">Tipo de Documento:</label>
                        <select name="tipo_doc" id="tipo_doc" class="form-control" required>
                            <option value="">Seleccione un tipo de documento</option>
                            @foreach ($tipodocs as $doc)
                            <option value="{{ $doc->id }}">{{ $doc->tipo_doc }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="num_doc" class="form-label">Número de Documento:</label>
                        <input type="text" id="num_doc" name="num_doc" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nombre_uno" class="form-label">Primer Nombre:</label>
                        <input type="text" id="nombre_uno" name="nombre_uno" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nombre_dos" class="form-label">Segundo Nombre:</label>
                        <input type="text" id="nombre_dos" name="nombre_dos" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="apellido_uno" class="form-label">Primer Apellido:</label>
                        <input type="text" id="apellido_uno" name="apellido_uno" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="apellido_dos" class="form-label">Segundo Apellido:</label>
                        <input type="text" id="apellido_dos" name="apellido_dos" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Telefono:</label>
                        <input type="text" id="telefono" name="telefono" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="rol_id" class="form-label">Rol:</label>
                        <select name="rol_id" id="rol_id" class="form-control" required>
                            <option value="" disabled selected>Seleccione un Rol</option>
                            @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">Crear Persona</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection