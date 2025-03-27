@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">Detalles de la Persona</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Tipo de Documento:</strong>
                    <p class="text-muted">{{ $persona->tipo_doc }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Número de Documento:</strong>
                    <p class="text-muted">{{ $persona->num_doc }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Primer Nombre:</strong>
                    <p class="text-muted">{{ $persona->nombre_uno }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Segundo Nombre:</strong>
                    <p class="text-muted">{{ $persona->nombre_dos }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Primer Apellido:</strong>
                    <p class="text-muted">{{ $persona->apellido_uno }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Segundo Apellido:</strong>
                    <p class="text-muted">{{ $persona->apellido_dos }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Edad:</strong>
                    <p class="text-muted">{{ $persona->edad }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Fecha de Nacimiento:</strong>
                    <p class="text-muted">{{ $persona->fecha_nacimiento }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <strong>Email:</strong>
                    <p class="text-muted">{{ $persona->email }}</p>
                </div>
                <div class="col-md-6">
                    <strong>Rol:</strong>
                    <p class="text-muted">{{ $persona->rol_id }}</p>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ route('personas.index') }}" class="btn btn-primary">Volver a la lista</a>
            </div>
        </div>
    </div>
</div>
@endsection