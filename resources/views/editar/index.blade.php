@extends('layouts.app')

@section('title', 'Editar')

@section('header', 'Editar Estudiantes')

@push('styles')
    @vite(['resources/css/registrar/style.css'])
@endpush

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger" style="margin: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('estudiantes.actualizar', $estudiante->id_estudiante) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="seccion__titulo">
            <h3>Editar Estudiante</h3>
        </div>
        <div class="form__estudiante">
            <div class="campo campo__imagen">
                <label for="cargar-imagen" class="cargar__imagen">
                    <input name="ruta_imagen" id="cargar-imagen" type="file">
                    @if($estudiante->ruta_imagen)
                        <img src="{{ asset('storage/' . $estudiante->ruta_imagen) }}" alt="Imagen actual" width="100%" height="80%">
                    @endif
                </label>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Nombres *</label>
                <input name="nombre" value="{{ old('nombre', $estudiante->nombre) }}" class="campo__input" type="text" placeholder="Baldemar" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Apellidos *</label>
                <input name="apellido" value="{{ old('apellido', $estudiante->apellido) }}" class="campo__input" type="text" placeholder="Heredia Sosa" required>
            </div>
                <div class="campo">
                    <label for="" class="campo__titulo">Genero *</label>
                    <div class="contenedor__radio">
                        <label for="Masculino" class="campo__radio">
                            <input name="genero" value="M" id="Masculino" type="radio" placeholder="M" name="genero" required @checked($estudiante->genero == 'M')>
                            Masculino
                        </label>
                        <label for="Femenino" class="campo__radio">
                            <input name="genero" value="F" id="Femenino" type="radio" name="genero" required @checked($estudiante->genero == 'F')>
                            Femenino
                        </label>
                    </div>
                </div>
            <div class="campo">
                <label for="" class="campo__titulo">Fecha de nacimiento *</label>
                <input name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento) }}" class="campo__input" type="date" placeholder="AÑO-MES-DIA" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Direccion *</label>
                <input name="direccion" value="{{ old('direccion', $estudiante->direccion) }}" class="campo__input" type="text" placeholder="Zona Chimba Av.Ingavi" name="" id="" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Estado *</label>
                <div class="contenedor__radio">
                    <label for="activo" class="campo__radio">
                        <input name="estado" value="Activo" id="activo" type="radio" name="estado" @checked($estudiante->estado == 'Activo')>
                        Activo
                    </label>
                    <label for="retirado" class="campo__radio">
                        <input name="estado" value="Retirado" id="retirado" type="radio" name="estado" @checked($estudiante->estado == 'Retirado')>
                        Retirado
                    </label>
                    <label for="graduado" class="campo__radio">
                        <input name="estado" value="Graduado" id="graduado" type="radio" name="estado" @checked($estudiante->estado == 'Graduado')>
                        Graduado
                    </label>
                </div>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Carnet *</label>
                <input name="ci" value="{{ old('ci', $estudiante->ci) }}" class="campo__input" type="number" placeholder="45558" required>
            </div>
            <div class="campo">
                <label for="curso" class="campo__titulo">Curso</label>
                <select name="curso" id="curso" class="campo__input campo__select" required>
                    <option value="">Seleccion un curso y paralelo</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id_curso }}" @selected($curso->id_curso == $estudiante->id_curso)>
                            {{ $curso->grado }} - {{ $curso->paralelo }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="campo">
                <label for="tutor" class="campo__titulo">Tutor</label>
                <select name="tutor" id="tutor" class="campo__input" required>
                    <option value="">Seleccione un tutor</option>
                    @foreach ($tutores as $tutor) 
                        <option value="{{ $tutor->id_tutor }}" @selected($tutor->id_tutor == $estudiante->id_tutor)>
                            {{ $tutor->nombre }} {{ $tutor->apellido }} - {{ $tutor->ci }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="contenedor__btn">
            <a class="btn btn__cancelar" href="{{ route('estudiante.index') }}">Cancelar</a>
            <button class="btn btn__enviar" type="submit">Editar</button>
        </div>
    </form>
@endsection