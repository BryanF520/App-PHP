@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Detalles del Acceso</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Persona</strong>
                    <p class="text-muted">{{ $acceso->persona_id }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Motivo:</strong>
                    <p class="text-muted">{{ $acceso->motivo }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Ingreso</strong>
                    <p class="datetime-local">{{ $acceso->fecha_ingreso }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Empresa</strong>
                    <p class="text-muted">{{ $acceso->empresa->nit }}</p>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('accesos.index') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
                    