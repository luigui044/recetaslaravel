<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Configuración básica del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplicación de Recetas')</title> <!-- Título dinámico de la página -->

    <!-- Enlace al CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Logo o nombre de la aplicación -->
            <a class="navbar-brand" href="{{ url('/') }}">Recetas</a>

            <!-- Botón para mostrar/ocultar el menú en pantallas pequeñas -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Enlaces del menú de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('recetas.index') }}">Ver Recetas</a>
                        <!-- Enlace para ver el listado de recetas -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('recetas.create') }}">Crear Receta</a>
                        <!-- Enlace para crear una nueva receta -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal de la página -->
    <main class="py-4">
        @yield('content')
        <!-- Sección de contenido dinámico que será reemplazada por las vistas que extienden esta plantilla -->
    </main>

    <!-- Enlace al JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
