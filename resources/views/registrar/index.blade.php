@extends('layouts.app')

@section('title', 'Inscribir Nuevo Estudiante')

@section('header', 'Inscribir Nuevo Estudiante')

@push('styles')
    @vite(['resources/css/registrar/style.css'])
@endpush

@section ('content')
    @if ($errors->any())
        <div class="alert alert-danger" style="margin: 20px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="seccion__titulo">
        <h3>Detalles Estudiante</h3>
    </div>
    <form action="{{ route('estudiantes.agregar') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form__estudiante">
            <div class="campo campo__imagen">
                <label for="cargar-imagen" class="cargar__imagen">
                    <span>Imagen</span>
                    <input name="ruta_imagen" id="cargar-imagen" type="file" placeholder="cccccc" required>
                </label>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Nombres *</label>
                <input name="nombre" class="campo__input" type="text" placeholder="Baldemar" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Apellidos *</label>
                <input name="apellido" class="campo__input" type="text" placeholder="Heredia Sosa" required>
            </div>
                <div class="campo">
                    <label for="" class="campo__titulo">Genero *</label>
                    <div class="contenedor__radio">
                        <label for="Masculino" class="campo__radio">
                            <input name="genero" value="M" id="Masculino" type="radio" placeholder="M" name="genero" required checked>
                            Masculino
                        </label>
                        <label for="Femenino" class="campo__radio">
                            <input name="genero" value="F" id="Femenino" type="radio" name="genero" required>
                            Femenino
                        </label>
                    </div>
                </div>
            <div class="campo">
                <label for="" class="campo__titulo">Fecha de nacimiento *</label>
                <input name="fecha_nacimiento" class="campo__input" type="date" placeholder="AÑO-MES-DIA" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Direccion *</label>
                <input name="direccion" class="campo__input" type="text" placeholder="Zona Chimba Av.Ingavi" name="" id="" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Estado *</label>
                <div class="contenedor__radio">
                    <label for="activo" class="campo__radio">
                        <input name="estado" value="Activo" id="activo" type="radio" name="estado" checked>
                        Activo
                    </label>
                    <label for="retirado" class="campo__radio">
                        <input name="estado" value="Retirado" id="retirado" type="radio" name="estado">
                        Retirado
                    </label>
                    <label for="graduado" class="campo__radio">
                        <input name="estado" value="Graduado" id="graduado" type="radio" name="estado">
                        Graduado
                    </label>
                </div>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Carnet *</label>
                <input name="ci" class="campo__input" type="number" placeholder="45558" required>
            </div>
            <div class="campo">
                <label for="curso" class="campo__titulo">Curso</label>
                <select name="curso" id="curso" class="campo__input campo__select" required>
                    <option value="">Seleccion un curso y paralelo</option>
                    @foreach ($cursos as $curso)
                        <option value=" {{ $curso->id_curso }}">
                            {{ $curso->grado }} - {{ $curso->paralelo }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="campo" id="campoTutor">
                <label for="tutor" class="campo__titulo">Tutor</label>
                <select name="tutor" id="tutor" class="campo__input" required>
                    <option value="">Seleccione un tutor</option>
                    @foreach ($tutores as $tutor) 
                        <option value="{{ $tutor->id_tutor }}">
                            {{ $tutor->nombre }} {{ $tutor->apellido }} - {{ $tutor->ci }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="campo__check">
            <label class="lbl__check campo__titulo">
                <input type="checkbox" id="toggleNuevoTutor" name="nuevo_tutor">
                ¿Registrar nuevo tutor?
            </label>
        </div>

        <div class="contenedor__form contenedor__form--disabled" id="formularioTutor" >
            <div class="seccion__titulo">
                <h3>Detalles Tutor</h3>
            </div>
            <div class="form__tutor">
                <div class="campo">
                    <label for="tutorNombre" class="campo__titulo">Nombres *</label>
                    <input id="tutorNombre" name="tutor_nombre" class="campo__input" type="text" placeholder="Baldemar">
                </div>
                <div class="campo">
                    <label for="tutorApellido" class="campo__titulo">Apellidos *</label>
                    <input id="tutorApellido" name="tutor_apellido" class="campo__input" type="text" placeholder="Heredia Sosa">
                </div>
                <div class="campo">
                    <label for="tutorFechaNacimiento" class="campo__titulo">Fecha de nacimiento *</label>
                    <input id="tutorFechaNacimiento" name="tutor_fecha_nacimiento" class="campo__input" type="date" placeholder="DIA/MES/AÑO">
                </div>
                <div class="campo">
                    <label for="tutorCi" class="campo__titulo">Carnet *</label>
                    <input id="tutorCi" name="tutor_ci" class="campo__input" type="number" placeholder="45558">
                </div>
                <div class="campo">
                    <label for="tutorParentesco" class="campo__titulo">Parentesco *</label>
                    <input id="tutorParentesco" name="tutor_parentesco" class="campo__input" type="text" placeholder="Padre" name="" id="">
                </div>
                <div class="campo">
                    <label for="" class="campo__titulo">Direccion *</label>
                    <input name="tutor_direccion" class="campo__input" type="text" placeholder="Zona Chimba Av.Ingavi">
                </div>
                <div class="campo">
                    <label for="tutorTelefono" class="campo__titulo">Telefono *</label>
                    <input id="tutorTelefono" name="tutor_telefono" class="campo__input" type="number" placeholder="7960344">
                </div>
                <div class="campo">
                    <label for="tutorCorreo" class="campo__titulo">Correo *</label>
                    <input id="tutorCorreo" name="correo" class="campo__input" type="email" placeholder="padre@gmail.conm">
                </div>
                <div class="campo">
                    <label for="tutorNombreUsuario" class="campo__titulo">Nombre De Usuario *</label>
                    <input id="tutorNombreUsuario" name="nombre_usuario" class="campo__input" type="text" placeholder="JuanPadre123">
                </div>
                <div class="campo">
                    <label for="tutorContrasena" class="campo__titulo">Contrasena *</label>
                    <input id="tutorContrasena" name="contrasena" class="campo__input" type="text" placeholder="Juan23565">
                </div>
            </div> 
        </div>

        <div class="contenedor__btn">
            <a class="btn btn__cancelar" href="{{ route('estudiante.index') }}">Cancelar</a>
            <button class="btn btn__enviar" type="submit">Enviar</button>
        </div>
    </form>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkbox = document.getElementById('toggleNuevoTutor');
        const formularioTutor = document.getElementById('formularioTutor');
        const inputsTutor = formularioTutor.querySelectorAll('input');
        const tutor = document.getElementById('tutor');
        const campoTutor = document.getElementById('campoTutor');

        function toggleTutorForm() {
            if (checkbox.checked) {
                formularioTutor.style.display = 'grid';
                inputsTutor.forEach(input => input.required = true);
                tutor.required = false;
                campoTutor.style.display = 'none';
            } else {
                formularioTutor.style.display = 'none';
                inputsTutor.forEach(input => input.required = false);
                tutor.required = true;
                campoTutor.style.display = 'flex';
            }
        }
        checkbox.addEventListener('change', toggleTutorForm);
        toggleTutorForm();
    });
</script>
@endpush