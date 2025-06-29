@extends('layouts.tutores')

@section('title', 'Boletin')

@section('header', 'Bademar Heredia Sosa')

@push('styles')
    @vite(['resources/css/tutor/boletin.css'])
@endpush

@section('content')
    @foreach($periodos as $periodo)
        <div class="cont">
            <div class="contenedor__info">
                <h2>Boletin {{ $periodo->trimestre }}</h2>
                <span>Del <span class="info__color">{{ \Carbon\Carbon::parse($periodo->fecha_inicio)->format('d/m/Y') }}</span> hasta <span class="info__color">{{ \Carbon\Carbon::parse($periodo->fecha_fin)->format('d/m/Y') }}</span></span>
                <span>Si desea visulazar o descargar el boletin presione los iconos de la derecha</span>
            </div>

            <div class="contenedor__iconos">
                <a href="{{ route('boletin.tutor.ver', ['id_estudiante' => $estudiante->id_estudiante, 'id_periodo' => $periodo->id_periodo]) }}" target="_blank">
                    <span class="material-icons-sharp iconos__boletin">
                        visibility
                    </span>
                </a>
                <a  href="{{  route('boletin.tutor.descargar', ['id_estudiante' => $estudiante->id_estudiante, 'id_periodo' => $periodo->id_periodo]) }}">
                    <span class="material-icons-sharp iconos__boletin">
                        download
                    </span>
                </a>
            </div>
        </div>
    @endforeach
@endsection