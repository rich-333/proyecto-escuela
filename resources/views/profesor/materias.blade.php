@extends('layouts.profesores')

@section('title', 'Materias')

@section('header', 'Matematicas')

@push('styles')
    @vite(['resources/css/materias/style.css'])
@endpush

@section('content')
    <section class="section__tabla">
        <header class="header__tabla">
            <h4 class="header__text">Lista de Estudiantes</h4>
        </header>
        <table id="tabla">

            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Materia</th>
                    <th>Bimestre</th>
                    <th>Nota</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Baldemar Heredia</td>
                    <td>Matematicas</td>
                    <td>1</td>
                    <td>
                        <input class="nota" type="number" placeholder="100">
                    </td>
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
    </section>
@endsection