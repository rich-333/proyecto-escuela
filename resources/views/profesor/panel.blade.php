@extends('layouts.profesores')

@section('title', 'Panel')

@section('header')
    Hola {{ $profesor->nombre }} {{ $profesor->apellido }} !
@endsection

@push('styles')
    @vite(['resources/css/panel/profesor.css'])
@endpush

@section('content')
<div class="panel__profesor">
    <h1>Selecciona una materia y curso desde el menu lateral</h1>
</div>
@endsection