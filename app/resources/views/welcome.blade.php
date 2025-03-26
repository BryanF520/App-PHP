@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="container">
    <h1>Bienvenido a la Aplicación de Facturación</h1>
    <p>Seleccione una de las siguientes opciones para comenzar:</p>
    <div class="list-group">
        <a href="{{ route('listas.index') }}" class="list-group-item list-group-item-action">Listas</a>
        <a href="{{ route('usuarios.index') }}" class="list-group-item list-group-item-action">Usuarios</a>
    </div>
</div>
@endsection