<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <title>@yield('title', 'Panel')</title>
    @vite(['resources/css/sidebar/style.css', 'resources/js/sidebar/script.js'])

    @stack('styles')
</head>
<body>
    <div class="contenedor">
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img class="img__logo" src="{{ asset('imagenes/EscudoSF.PNG') }}" alt="">
                    <h2 class="titulo">Niños del Futuro</h2>
                </div>
                <div class="cerrar" id="btn-cerrar">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>
            <div class="sidebar">
                <a href="#" class="active">
                    <img class="sidebar__icon" src="{{ asset('imagenes/profesor.png') }}" alt="Icono seccion profesores">
                    <h3 class="sidebar__seccion">Profesores</h3>
                </a>
                <a href="#">
                    <img class="sidebar__icon" src="{{ asset('imagenes/estudiante.png') }}" alt="Icono seccion estudiantes">
                    <h3 class="sidebar__seccion">Estudiantes</h3>
                </a>
                <a href="#">
                    <img class="sidebar__icon" src="{{ asset('imagenes/tutor.png') }}" alt="Icono seccion tutor">
                    <h3 class="sidebar__seccion">Tutores</h3>
                </a>
                <a href="#">
                    <img class="sidebar__icon" src="{{ asset('imagenes/inscripciones.png') }}" alt="Icono seccion inscripciones">
                    <h3 class="sidebar__seccion">Inscripciones</h3>
                </a>
                <a href="#">
                    <img class="sidebar__icon" src="{{ asset('imagenes/pensiones.png') }}" alt="Icono seccion pensiones">
                    <h3 class="sidebar__seccion">Pensiones</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3 class="sidebar__seccion">Cerrar Sesion</h3>
                </a>
            </div>
        </aside>

        <div>
            <header class="header">
                <div class="header__campos">
                    <a href="">
                        <span class="material-icons-sharp header__atras">
                            arrow_back
                        </span>
                    </a>
                    <input type="text" class="header__buscador" placeholder="Buscar">
                </div>
                <div class="header__campos">
                    <a href="">
                        <span class="material-icons-sharp header__campo">
                            settings
                        </span>
                    </a>
                    <a href="">
                        <img class="header__img" src="{{ asset('imagenes/usuario.jpeg') }}" alt="">
                    </a>
                </div>
            </header>
            <main>
                <div class="main__header">
                    <h1>@yield('header')</h1>
                    <div class="main__agregar">
                        <span class="agregar__texto">Agregar Nuevo</span>
                        <a href="{{ route('estudiante.create') }}">
                            <span class="material-icons-sharp agregar">
                                add
                            </span>
                        </a>
                    </div>
                </div>
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>