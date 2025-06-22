<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <title>@yield('title', 'Panel')</title>

    @vite(['resources/css/sidebar/profesores.css', 'resources/js/sidebar/profesores.js'])
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
                <div>
                    <div class="accordion">
                        <button class="accordion-toggle">
                            <img class="sidebar__icon" src="{{ asset('imagenes/estudiante.png') }}" alt="">
                            Baldemar Heredia Sosa
                        </button>
                        <ul class="accordion-content">
                            <li>
                                <a href="/profesor/curso/1A">
                                    <img class="sidebar__icon" src="{{ asset('imagenes/boletin.png') }}" alt="">
                                    Boletin
                                </a>
                            </li>
                            <li>
                                <a href="/profesor/curso/2A">
                                    <img class="sidebar__icon" src="{{ asset('imagenes/pensiones.png') }}" alt="">
                                    Pensiones
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <a href="#" class="sidebar__logout">
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
                    @hasSection('agregar')
                    <div class="main__agregar">
                        <span class="agregar__texto">Agregar Nuevo</span>
                        <a href="">
                            <span class="material-icons-sharp agregar">
                                add
                            </span>
                        </a>
                    </div>
                    @endif
                </div>
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>