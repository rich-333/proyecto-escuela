@extends('layouts.app')

@section('title', 'Estudiantes')

@section('header', 'Estudiantes')

@push('styles')
    @vite(['resources/css/estudiante/style.css'])
@endpush

@section('content')
    <section class="section__estudiantes">
        <header class="header__estudiantes">
            <h4 class="header__text">Lista de Estudiantes</h4>
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
        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Foto</th>
                    <th>Fecha De Nacmiento</th>
                    <th>Genero</th>
                    <th>Direccion</th>
                    <th>Curso</th>
                    <th>Paralelo</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Baldemar</td>
                    <td>Heredia</td>
                    <td>sssssss</td>
                    <td>24/30/2001</td>
                    <td>M</td>
                    <td>Av. Ingavi Zona Chimba</td>
                    <td>Segundo</td>
                    <td>B</td>
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