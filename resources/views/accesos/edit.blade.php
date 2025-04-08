@extends('layouts.app')

@section('title', 'Editar Acceso')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Editar Acceso</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('accesos.update', $acceso->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="persona_id" class="form-label">Persona</label>
                    <input type="text" id="persona_id" name="persona_id" class="form-control" value="{{ $acceso->persona_id }}" required>
                </div>
                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo</label>
                    <input type="text" id="motivo" name="motivo" class="form-control" value="{{ $acceso->motivo }}" required>
                </div>
                <div class="mb-3">
                    <label for="fecha_ingreso" class="form-label">Fecha Ingreso</label>
                    <input type="datetime" id="fecha_ingreso" name="fecha_ingreso" class="form-control" value="{{ $acceso->fecha_ingreso }}" required>
                </div>
                <div class="mb-3">
                    <label for="empresa_id" class="form-label">Empresa</label>
                    <input type="text" id="empresa_id" name="empresa_id" class="form-control" value="{{ $acceso->empresa_id }}" required>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('accesos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection