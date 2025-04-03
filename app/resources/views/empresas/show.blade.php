@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Detalles de la Empresa</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>NIT:</strong>
                    <p class="text-muted">{{ $empresa->nit }}</p>
                </div>
                <div class="col-md-6">
                    <p class="text-muted">{{ $empresa->nombre}}</p>
                </div>
                <div class="col-md-6">
                    <strong>Área:</strong>
                    <p class="text-muted">{{ $empresa->area }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Contacto:</strong>
                    <p class="text-muted">{{ $empresa->contacto }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Ubicación:</strong>
                    <p class="text-muted">{{ $empresa->ubicacion }}</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('empresas.index') }}" class="btn btn-primary">Volver a la lista</a>
            </div>
        </div>
    </div>
</div>
@endsection