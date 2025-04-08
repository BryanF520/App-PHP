@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Editar Empresa</h1>
    <form method="POST" action="{{ route('empresas.update', $empresa->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nit" class="form-label">NIT:</label>
            <input type="text" id="nit" name="nit" class="form-control" value="{{ $empresa->nit }}" required>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $empresa->nombre }}" required>
            <div class="mb-3">
                <label for="area" class="form-label">Área:</label>
                <input type="text" id="area" name="area" class="form-control" value="{{ $empresa->area }}" required>
            </div>
            <div class="mb-3">
                <label for="contacto" class="form-label">Contacto:</label>
                <input type="text" id="contacto" name="contacto" class="form-control" value="{{ $empresa->contacto }}" required>
            </div>
            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación:</label>
                <input type="text" id="ubicacion" name="ubicacion" class="form-control" value="{{ $empresa->ubicacion }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Empresa</button>
    </form>
</div>
@endsection