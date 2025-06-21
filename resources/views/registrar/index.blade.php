@extends('layouts.app')

@section('title', 'Inscribir Nuevo Estudiante')

@section('header', 'Inscribir Nuevo Estudiante')

@push('styles')
    @vite(['resources/css/registrar/style.css'])
@endpush

@section ('content')
    <div class="seccion__titulo">
        <h3>Detalles Estudiante</h3>
    </div>
    <form action="" class="form__estudiante">
        <div class="campo">
            <label for="" class="campo__titulo">Nombres *</label>
            <input class="campo__input" type="text" placeholder="Baldemar" required>
        </div>
        <div class="campo">
            <label for="" class="campo__titulo">Apellidos *</label>
            <input class="campo__input" type="text" placeholder="Heredia Sosa" required>
        </div>
        <div class="campo">
            <label for="" class="campo__titulo">Fecha de nacimiento *</label>
            <input class="campo__input" type="text" placeholder="DIA/MES/AÑO" required>
        </div>
        <div class="campo">
            <label for="" class="campo__titulo">Genero *</label>
            <input class="campo__input" type="text" placeholder="M" required>
        </div>
        <div class="campo">
            <label for="" class="campo__titulo">Direccion *</label>
            <input class="campo__input" type="text" placeholder="Zona Chimba Av.Ingavi" name="" id="" required>
        </div>
        <div class="campo" class="campo__titulo">
            <label for="">Foto *</label>
            <input type="file" placeholder="cccccc" required>
        </div>
    </form>

    <div class="contenedor__form">
        <div class="seccion__titulo">
            <h3>Detalles Tutor</h3>
        </div>
        <form action="" class="form__tutor">
            <div class="campo">
                <label for="" class="campo__titulo">Nombres *</label>
                <input class="campo__input" type="text" placeholder="Baldemar" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Apellidos *</label>
                <input class="campo__input" type="text" placeholder="Heredia Sosa" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Fecha de nacimiento *</label>
                <input class="campo__input" type="text" placeholder="DIA/MES/AÑO" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Carnet *</label>
                <input class="campo__input" type="number" placeholder="45558" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Parentesco *</label>
                <input class="campo__input" type="text" placeholder="Padre" name="" id="" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Correo *</label>
                <input class="campo__input" type="email" placeholder="padre@gmail.conm" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Telefono *</label>
                <input class="campo__input" type="number" placeholder="7960344" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Nombre De Usuario *</label>
                <input class="campo__input" type="text" placeholder="JuanPadre123" required>
            </div>
            <div class="campo">
                <label for="" class="campo__titulo">Contrasena *</label>
                <input class="campo__input" type="text" placeholder="Juan23565" required>
            </div>
        </form> 
    </div>

    <div class="contenedor__btn">
        <a class="btn btn__cancelar" href="#">Cancelar</a>
        <button class="btn btn__enviar" type="submit">Enviar</button>
    </div>
@endsection