@extends('layouts.tutores')

@section('title', 'Pension')

@section('header', 'Pensiones')

@push('styles')
    @vite(['resources/css/tutor/pension.css'])
@endpush

@push('scripts')
    @vite(['resources/js/tutor/pension.js'])
@endpush

@push('scripts')
<script>
    function abrirPension() {
        document.getElementById('modal').classList.add('activo');
    }

    function cerrarPension() {
        document.getElementById('modal').classList.remove('activo');
    }
</script>
@endpush

@section('content')
<section class="section__tabla">
    <header class="header__tabla">
        <h4 class="header__text">Informacion sobre las pensiones</h4>
    </header>
    <table id="tabla">

        <thead>
            <tr>
                <th>Enero</th>
                <th>Febrero</th>
                <th>Marzo</th>
                <th>Abril</th>
                <th>Mayo</th>
                <th>Junio</th>
                <th>Julio</th>
                <th>Agosto</th>
                <th>Septiembre</th>
                <th>Octubre</th>
                <th>Noviembre</th>
                <th>Diciembre</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <div class="tabla__celda">
                        <span>Pagado</span>
                        <button class="btn__abrirmodal" onclick="abrirPension()">
                            <span class="material-icons-sharp icono__info">
                                info
                            </span>
                        </button>
                    </div>
                </td>
                <td>Pendiente</td>
                <td>Pendiente</td>
                <td>Pendiente</td>
                <td>Pendiente</td>
                <td>Pendiente</td>
                <td>Pendiente</td>
                <td>Pendiente</td>
                <td>Pendiente</td>
                <td>Pendiente</td>
                <td>Pendiente</td>
                <td>Pendiente</td>
            </tr>
        </tbody>

    </table>
</section>

<div class="modal" id="modal">
    <div class="contenido__modal">
        <span class="cerrar" onclick="cerrarPension()">&times;</span>
        <h2 class="modal__titulo">Enero</h2>
        <span class="modal__gestion">Gestion 2025</span>
        <span class="modal__fecha">📅 Fecha limite <strong>14/02/2025</strong></span>
        <span class="modal__monto">💰 Monto: <strong>20 Bs.</strong></span>
        <span class="modal__estado pendiente pagado">⏳ Estado: Pendiente</span>
    </div>
</div>
@endsection