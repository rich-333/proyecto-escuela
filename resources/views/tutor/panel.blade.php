@extends('layouts.tutores')

@section('title', 'Panel Tutor')

@section('header')
    Hola {{ $tutor->nombre }} {{ $tutor->apellido }} !
@endsection

@push('styles')
    @vite(['resources/css/panel/tutor.css'])
@endpush

@section('content')
<div class="panel__tutor">
    <h1>Selecciona una materia y curso desde el menu lateral</h1>
</div>
@endsection