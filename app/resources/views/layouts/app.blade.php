<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Mi Aplicación</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @if (session()->has('rol') && !request()->is('login') && !request()->is('home'))
                    @if (!request()->routeIs(['personas.index', 'personas.create', 'personas.edit', 'personas.show']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('personas.index') }}">Personas</a>
                    </li>
                    @endif
                    @if (!request()->routeIs(['empresas.index', 'empresas.create', 'empresas.edit', 'empresas.show']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('empresas.index') }}">Empresas</a>
                    </li>
                    @endif
                    @if (!request()->routeIs(['accesos.index', 'accesos.create', 'accesos.edit', 'accesos.show']))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('accesos.index') }}">Accesos</a>
                    </li>
                    @endif
                    @endif
                </ul>
                @if (session()->has('rol') && !request()->is('login'))
                <!-- Formulario de Búsqueda -->
                <form method="GET" action="{{ route('accesos.buscar') }}" class="d-flex me-3">
                    <input class="form-control me-2" type="date" name="fecha_ingreso" placeholder="Buscar por fecha" aria-label="Buscar">
                    <button class="btn btn-outline-light" type="submit">Buscar</button>
                </form>
                <!-- Botón de Cerrar Sesión -->
                <form method="POST" action="{{ route('logout') }}" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">Cerrar sesión</button>
                </form>
                @endif
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; {{ date('Y') }} Mi Aplicación - Todos los derechos reservados.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>