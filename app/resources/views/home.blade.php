@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="mb-4">Bienvenido al Sistema de Control de Acceso</h1>
        <p class="lead">Seleccione una de las siguientes opciones para gestionar el acceso y los usuarios:</p>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h5>Accesos</h5>
                </div>
                <div class="card-body text-center">
                    <p>Gestione los accesos de personas a las empresas.</p>
                    <a href="{{ route('accesos.index') }}" class="btn btn-primary">Ver Accesos</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white text-center">
                    <h5>Personas</h5>
                </div>
                <div class="card-body text-center">
                    <p>Administre la información de las personas registradas.</p>
                    <a href="{{ route('personas.index') }}" class="btn btn-success">Ver Personas</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white text-center">
                    <h5>Empresas</h5>
                </div>
                <div class="card-body text-center">
                    <p>Gestione las empresas registradas en el sistema.</p>
                    <a href="{{ route('empresas.index') }}" class="btn btn-info">Ver Empresas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection