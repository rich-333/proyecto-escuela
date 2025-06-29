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
            </tr>
        </thead>

        <tbody>
            <tr>
                @foreach(['Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre'] as $mes)
                    @php
                        $pensionMes = $pensionesPorMes[$mes]->first() ?? null;
                    @endphp
                    <td class="celdaEstado">
                        @if($pensionMes)
                            <div class="tabla__celda">
                                <span class="estado">{{ $pensionMes->estado }}</span>
                                <button class="btn__abrirmodal" onclick="abrirPension('{{ $mes }}', '{{ $pensionMes->anio }}', '{{ $pensionMes->fecha_pago }}', '{{ $pensionMes->monto }}', '{{ $pensionMes->estado }}')">
                                    <span class="material-icons-sharp icono__info">
                                        info
                                    </span>
                                </button>
                            </div>
                        @else
                            <span class="estado">Pendiente</span>
                        @endif
                    </td>
                @endforeach
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const estados = document.querySelectorAll('.estado');
        const celdas = document.querySelectorAll('.celdaEstado');

        estados.forEach((estado, index) => {
            const texto = estado.textContent.trim().toLowerCase();

            if (texto === 'pendiente') {
                celdas[index].style.backgroundColor = '#FDEDED';
            } else if (texto === 'pagado') {
                celdas[index].style.backgroundColor = '#EDFBF2';
            }
        });
    });
    function abrirPension(mes, anio, fecha, monto, estado) {
        document.querySelector('.modal__titulo').textContent = mes;
        document.querySelector('.modal__gestion').innerHTML = `Gestion ${anio}`;
        document.querySelector('.modal__fecha').innerHTML = `📅 Fecha pago: <strong>${fecha}</strong>`;
        document.querySelector('.modal__monto').innerHTML = `💰 Monto: <strong>${monto} Bs.</strong>`;
        document.querySelector('.modal__estado').innerHTML = `⏳ Estado: ${estado}`;
        document.getElementById('modal').classList.add('activo');
    }

    function cerrarPension() {
        document.getElementById('modal').classList.remove('activo');
    }

</script>
@endpush