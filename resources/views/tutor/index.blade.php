@extends('layouts.app')

@section('title', 'Tutores')

@section('header', 'Tutores')

@push('styles')
    @vite(['resources/css/administracion/style.css'])
@endpush

@section('content')
    <section class="section__tabla">
        <header class="header__tabla">
            <h4 class="header__text">Lista de Tutores</h4>
            <div class="section__filtrar">
                <input class="buscador" type="text" placeholder="Buscar por nombre">
            </div>
        </header>

        <table id="tabla">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Carnet</th>
                    <th>Fecha De Nacimiento</th>
                    <th>Parentesco</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Estudiante Asociado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Baldemar</td>
                    <td>Heredia</td>
                    <td>3434434</td>
                    <td>21/2/1989</td>
                    <td>Padre</td>
                    <td>baldemar@gmail.com</td>
                    <td>7889222</td>
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