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
                        @if(isset($materiasConCursos))
                            @foreach ($materiasConCursos as $item)
                                <div class="accordion">
                                    <button class="accordion-toggle">
                                        <img class="sidebar__icon" src="{{ asset('imagenes/materias.png') }}" alt="">
                                        {{ $item['materia']->nombre }}
                                    </button>
                                    <ul class="accordion-content">
                                        @foreach ($item['cursos'] as $curso)
                                            <li>
                                                <a href="{{ route('profesor.materia.curso', 
                                                    ['id_materia' => $item['materia']->id_materia,
                                                    'id_curso' => $curso->id_curso]) }}">
                                                    {{ $curso->grado }}° {{ $curso->paralelo }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        @endif
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
                        @hasSection('btn-agregar')
                            <div class="main__agregar">
                                @yield('btn-agregar')
                            </div>
                        @endif
                    </div>
                    @yield('content')
                </main>
            </div>
        </div>
    </body>
    @stack('scripts')
    </html>