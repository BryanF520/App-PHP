@extends('layouts.app')

@section('title', 'Detalles del Acceso')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Detalles del Acceso</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-bold">ID:</label>
                <p>{{ $acceso->id }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Persona:</label>
                <p>{{ $acceso->persona->nombre_completo }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Motivo:</label>
                <p>{{ $acceso->motivo }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Fecha de Ingreso:</label>
                <p>{{ $acceso->fecha_ingreso }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Empresa:</label>
                <p>{{ $acceso->empresa->nombre }}</p>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('accesos.index') }}" class="btn btn-secondary me-2">Volver</a>
                <a href="{{ route('accesos.edit', $acceso->id) }}" class="btn btn-warning me-2">Editar</a>
            </div>
        </div>
    </div>
</div>
@endsection