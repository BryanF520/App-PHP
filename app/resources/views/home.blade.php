@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="mb-4">Bienvenido al Sistema de Control de Acceso</h1>
        <p class="lead">Seleccione la opción a la cual desea ingresar:</p>
    </div>

    <div class="d-flex flex-wrap justify-content-center gap-4 mt-4">
        <div class="card shadow-sm" style="width: 16rem;">
            <div class="card-header bg-primary text-white text-center">
                <h5>Accesos</h5>
            </div>
            <div class="card-body text-center">
                <p>Gestione los accesos de personas a las empresas.</p>
                <a href="{{ route('accesos.index') }}" class="btn btn-primary">Ver Accesos</a>
            </div>
        </div>

        <div class="card shadow-sm" style="width: 16rem;">
            <div class="card-header bg-success text-white text-center">
                <h5>Personas</h5>
            </div>
            <div class="card-body text-center">
                <p>Administre la información de las personas registradas.</p>
                <a href="{{ route('personas.index') }}" class="btn btn-success">Ver Personas</a>
            </div>
        </div>

        <div class="card shadow-sm" style="width: 16rem;">
            <div class="card-header bg-info text-white text-center">
                <h5>Empresas</h5>
            </div>
            <div class="card-body text-center">
                <p>Gestione las empresas registradas en el sistema.</p>
                <a href="{{ route('empresas.index') }}" class="btn btn-info">Ver Empresas</a>
            </div>
        </div>

        <div class="card shadow-sm" style="width: 16rem;">
            <div class="card-header bg-warning text-white text-center">
                <h5>Ingresos</h5>
            </div>
            <div class="card-body text-center">
                <p>Administre los ingresos registrados en el sistema.</p>
                <a href="{{ route('ingresos.index') }}" class="btn btn-warning">Ver Ingresos</a>
            </div>
        </div>

        <div class="card shadow-sm" style="width: 16rem;">
            <div class="card-header bg-secondary text-white text-center">
                <h5>Reportes</h5>
            </div>
            <div class="card-body text-center">
                <p>Genere y consulte reportes basados en los accesos registrados.</p>
                <a href="{{ route('reportes.index') }}" class="btn btn-secondary">Ver Reportes</a>
            </div>
        </div>
    </div>
</div>
@endsection