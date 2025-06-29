@extends('layouts.profesores')

@section('title', 'Panel')

@section('header', 'Panel')

@push('styles')
    @vite(['resources/css/materias/style.css'])
@endpush

@section('content')
    <h1>Seleccione una materia y curso desde el paner lateral</h1>
@endsection