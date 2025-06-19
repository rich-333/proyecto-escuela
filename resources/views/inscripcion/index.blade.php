@extends('layouts.app')

@section('title', 'Inscripciones')

@section('header', 'Inscripciones')

@push('styles')
    @vite(['resources/css/administracion/style.css'])
@endpush

@section('content')
    <section class="section__tabla">
        <header class="header__tabla">
            <h4 class="header__text">Lista de Inscripciones</h4>
            <div class="section__filtrar">
                <input class="buscador" type="text" placeholder="Buscar por nombre">
                <select name="" id="" class="categoria">
                    <option value="">Curso</option>
                    <option value="">Primero</option>
                    <option value="">Segundo</option>
                    <option value="">Tercero</option>
                    <option value="">Cuarto</option>
                    <option value="">Quinto</option>
                    <option value="">Sexto</option>
                </select>
                <select name="" id="" class="categoria">
                    <option value="">Paralelo</option>
                    <option value="">A</option>
                    <option value="">B</option>
                </select>
            </div>
        </header>

        <table id="tabla">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre/Apellidos Estudiante</th>
                    <th>Año</th>
                    <th>Fecha De Inscripcion</th>
                    <th>Curso</th>
                    <th>Paralelo</th>
                    <th>Nombre/Apellidos Tutor</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Baldemar Heredia Sosa</td>
                    <td>2001</td>
                    <td>21/2/1989</td>
                    <td>Primero</td>
                    <td>B</td>
                    <td>Ariana Heredia Sosa</td>
                    <td>
                        <a href="#">
                            <span class="material-icons-sharp icono__editar icono">
                                edit
                            </span>
                        </a>
                    </td>
                    <td>
                        <a href="#">
                            <span class="material-icons-sharp icono__eliminar icono">
                                delete
                            </span>
                        </a>
                    </td>
                </tr>
            </tbody>

        </table>

        <div class="contenedor__paginacion" id="pagina">
            <span>Mostrando <span class="resaltar">1-10</span> de <span class="resaltar">100</span> datos</span>
            <div class="paginacion">
                <button class="flecha">
                    <span class="material-icons-sharp">
                        chevron_left
                    </span>
                </button>
                <button class="pagina active">1</button>
                <button class="pagina">2</button>
                <button class="pagina">3</button>
                <button class="flecha">
                    <span class="material-icons-sharp">
                        chevron_right
                    </span>
                </button>
            </div>
        </div>
    </section>
@endsection