@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear Empresa</h1>
    <form method="POST" action="{{ route('empresas.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nit" class="form-label">NIT:</label>
            <input type="text" id="nit" name="nit" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Área:</label>
            <input type="text" id="area" name="area" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="contacto" class="form-label">Contacto:</label>
            <input type="text" id="contacto" name="contacto" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación:</label>
            <input type="text" id="ubicacion" name="ubicacion" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Empresa</button>
    </form>
</div>
@endsection