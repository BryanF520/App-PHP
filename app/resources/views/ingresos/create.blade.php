@extends('layouts.app')

@section('title', 'Crear Ingreso')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Crear Nuevo Ingreso</h3>
        </div>
        <div class="card-body">
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ route('ingresos.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="tipo_doc" class="form-label">Tipo de Documento:</label>
                    <select name="tipo_doc" id="tipo_doc" class="form-control" required>
                        <option value="">Seleccione un tipo de documento</option>
                        @foreach ($tipodocs as $doc)
                        <option value="{{ $doc->id }}">{{ $doc->tipo_doc }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="num_doc" class="form-label">Número de Documento:</label>
                    <input type="text" id="num_doc" name="num_doc" class="form-control" value="{{ old('num_doc') }}" required>
                </div>
                <div class="mb-3">
                    <label for="nombre_uno" class="form-label">Primer Nombre:</label>
                    <input type="text" id="nombre_uno" name="nombre_uno" class="form-control" value="{{ old('nombre_uno') }}" required>
                </div>
                <div class="mb-3">
                    <label for="nombre_dos" class="form-label">Segundo Nombre:</label>
                    <input type="text" id="nombre_dos" name="nombre_dos" class="form-control" value="{{ old('nombre_dos') }}">
                </div>
                <div class="mb-3">
                    <label for="apellido_uno" class="form-label">Primer Apellido:</label>
                    <input type="text" id="apellido_uno" name="apellido_uno" class="form-control" value="{{ old('apellido_uno') }}" required>
                </div>
                <div class="mb-3">
                    <label for="apellido_dos" class="form-label">Segundo Apellido:</label>
                    <input type="text" id="apellido_dos" name="apellido_dos" class="form-control" value="{{ old('apellido_dos') }}">
                </div>
                <div class="mb-3">
                    <label for="rol_id" class="form-label">Rol:</label>
                    <select name="rol_id" id="rol_id" class="form-control" required>
                        <option value="" disabled selected>Seleccione un Rol</option>
                        @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
                </div>
                <div class="mb-3">
                    <label for="empresa_id" class="form-label">Empresa:</label>
                    <select name="empresa_id" id="empresa_id" class="form-control" required>
                        <option value="">Seleccione una empresa</option>
                        @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}" {{ old('empresa_id') == $empresa->id ? 'selected' : '' }}>{{ $empresa->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo</label>
                    <textarea id="motivo" name="motivo" class="form-control" rows="3" required>{{ old('motivo') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                    <input type="datetime-local" id="fecha_ingreso" name="fecha_ingreso" class="form-control" value="{{ now()->format('Y-m-d\TH:i:s') }}" required>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('ingresos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Crear Ingreso</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection