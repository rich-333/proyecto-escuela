@extends('layouts.app')

@section('title', 'Estudiantes')

@section('header', 'Estudiantes')

@push('styles')
    @vite(['resources/css/administracion/style.css'])
@endpush

@section('content')
    <section class="section__tabla">
        <header class="header__tabla">
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
        <table id="tabla">

            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Tutor</th>
                    <th>Foto</th>
                    <th>Fecha De Nacmiento</th>
                    <th>Genero</th>
                    <th>Direccion</th>
                    <th>Curso</th>
                    <th>Paralelo</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($estudiantes as $estudiante) 
                <tr>
                    <td>{{ $estudiante->ci }}</td>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->apellido }}</td>
                    <td>{{ $estudiante->tutor->nombre }} {{ $estudiante->tutor->apellido }}</td>
                    <td>{{ $estudiante->ruta_imagen }}</td>
                    <td>{{ $estudiante->fecha_nacimiento }}</td>
                    <td>{{ $estudiante->genero}}</td>
                    <td>{{ $estudiante->direccion }}</td>
                    <td>{{ $estudiante->curso->grado }}</td>
                    <td>{{ $estudiante->curso->paralelo }}</td>
                    <td>{{ $estudiante->estado }}</td>
                    <td>
                        <a href="#">
                            <span class="material-icons-sharp icono__editar icono">
                                edit
                            </span>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('estudiantes.eliminar', $estudiante->id_estudiante) }}" method="post" onsubmit="return confirm('¿Estás seguro de eliminar este estudiante?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn__eliminar">    
                                <span class="material-icons-sharp icono__eliminar icono">
                                    delete
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
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