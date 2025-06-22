@extends('layouts.tutores')

@section('title', 'Boletin')

@section('header', 'Bademar Heredia Sosa')

@push('styles')
    @vite(['resources/css/tutor/boletin.css'])
@endpush

@section('content')
    <div class="cont">
        <div class="contenedor__info">
            <h2>Boletin 1er Trimestre</h2>
            <span>Del <span class="info__color">01/01/2015</span> Hata <span class="info__color">03/01/2025</span></span>
            <span>Si desea visulazar o descargar el boletin presione los iconos de la derecha</span>
        </div>

        <div class="contenedor__iconos">
            <span class="material-icons-sharp iconos__boletin">
                visibility
            </span>
            <span class="material-icons-sharp iconos__boletin">
                download
            </span>
        </div>
    </div>
@endsection