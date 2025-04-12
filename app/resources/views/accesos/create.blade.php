@extends('layouts.app')

@section('title', 'Crear Acceso')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Crear Nuevo Acceso</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('accesos.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="persona_id" class="form-label">Persona</label>
                    <select id="persona_id" name="persona_id" class="form-control" required>
                        <option value="" disabled selected>Seleccione una persona</option>
                        @foreach ($personas as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombre_uno }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="motivo" class="form-label">Motivo</label>
                    <textarea id="motivo" name="motivo" class="form-control" rows="3" required>{{ old('motivo') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="fecha_ingreso" class="form-label">Fecha de Ingreso</label>
                    <input type="datetime-local" id="fecha_ingreso" name="fecha_ingreso" class="form-control" value="{{ now()->format('Y-m-d\TH:i') }}" required>
                </div>
                <div class="mb-3">
                    <label for="empresa_id" class="form-label">Empresa</label>
                    <select id="empresa_id" name="empresa_id" class="form-control" required>
                        <option value="" disabled selected>Seleccione una empresa</option>
                        @foreach ($empresas as $empresa)
                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('accesos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Crear Acceso</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection