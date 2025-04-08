@extends('layouts.app')

@section('title', 'Detalles del Ingreso')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Detalles del Ingreso</h3>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label fw-bold">ID:</label>
                <p>{{ $ingreso->id }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Persona:</label>
                <p>{{ $ingreso->persona->nombre_uno }} {{ $ingreso->persona->apellido_uno }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Motivo:</label>
                <p>{{ $ingreso->motivo }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Fecha de Ingreso:</label>
                <p>{{ $ingreso->fecha_ingreso }}</p>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Empresa:</label>
                <p>{{ $ingreso->empresa->nombre }}</p>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('ingresos.index') }}" class="btn btn-secondary me-2">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection