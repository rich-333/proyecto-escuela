@extends('layouts.profesores')

@section('title', '{{Materias}}')

@section('header', 'Matematicas')

@push('styles')
    @vite(['resources/css/materias/style.css'])
@endpush

@section('content')
    <section class="section__tabla">
        <header class="header__tabla">
            <h4 class="header__text">Lista de Estudiantes</h4>
        </header>

        <table id="tabla">

            <thead>
                <tr id="encabezado">
                    <th>Estudiante</th>
                    <th>Trimestre</th>
                    <th>Nota</th>
                    <!--<th>Agregar</th>-->
                    <th>Editar</th>
                    <!--<th>Eliminar</th>-->
                    <th>Ver boletin</th>
                    <th>Descargar boletin</th>
                </tr>
            </thead>

            <tbody id="tbodyNotas">
                @foreach ($estudiantes as $estudiante)
                    <tr data-id-estudiante="{{ $estudiante->id_estudiante }}">
                        <td>{{ $estudiante->nombre }} {{ $estudiante->apellido }} </td>
                        <td>
                            @if($periodo_actual)
                                <span>{{ $periodo_actual->trimestre }}</span>
                                <input type="hidden" class="periodo-actual" value="{{ $periodo_actual->id_periodo }}">
                            @else
                                <span class="text-danger">Fuera de rango</span>
                            @endif
                        </td>
                        <td class="notas-container">
                            @php
                                $nota = $notas[$estudiante->id_estudiante]->nota ?? '';
                            @endphp
                            <input 
                                type="number" 
                                min="0" 
                                max="100" 
                                placeholder="Nota"
                                value="{{ $nota }}"
                                class="nota-input nota" 
                                data-id-estudiante="{{ $estudiante->id_estudiante }}" 
                                data-id-materia="{{ $materia->id_materia }}"
                                {{ $nota !== '' ? 'readonly' : '' }}
                            />
                        </td>
                        <!--
                        <td>
                            <button type="button" id="btnAgregarFila" class="agregar_nota">
                                <span class="material-icons-sharp icono__agregar icono">
                                    add
                                </span>
                            </button>
                        </td> -->
                        <td>
                            <a href="#">
                                <span class="material-icons-sharp icono__editar icono">
                                    edit
                                </span>
                            </a>
                        </td>
                        <td>
                            <a 
                                href="{{ route('boletin.ver', ['id_estudiante' => $estudiante->id_estudiante, 'id_periodo' => $periodo_actual->id_periodo ?? 0]) }}"
                                target="_blank"
                            >
                                <span class="material-icons-sharp icono__ver icono">visibility</span>
                            </a>
                        </td>
                        <td>
                            <a 
                                href="{{ route('boletin.descargar', ['id_estudiante' => $estudiante->id_estudiante, 'id_periodo' => $periodo_actual->id_periodo ?? 0]) }}"
                            >
                                <span class="material-icons-sharp icono__descargar icono">download</span>
                            </a>
                        </td>
                        <!--
                        <td>
                            <a href="#">
                                <span class="material-icons-sharp icono__eliminar icono">
                                    delete
                                </span>
                            </a>
                        </td> -->
                    </tr>
                @endforeach
            </tbody>

        </table>

    </section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    /*document.querySelectorAll('.agregar_nota').forEach(btn => {
        btn.addEventListener('click', function () {
            const fila = this.closest('tr');
            const id_estudiante = fila.dataset.idEstudiante;
            const id_materia = fila.querySelector('.nota-input').dataset.idMateria;
            const id_periodo = fila.querySelector(`select[data-id-estudiante="${id_estudiante}"]`).value;
            const encabezado = document.querySelector('#encabezado');

            const thNota = document.createElement('th');
            thNota.textContent = 'Nota';

            const thAgregar = encabezado.querySelector('th:nth-child(4)');
            encabezado.insertBefore(thNota, thAgregar)

            const celdaNueva = document.createElement('td');
            const input = document.createElement('input');
            input.type = 'number';
            input.min = 0;
            input.max = 100;
            input.placeholder = 'Nota';
            input.classList.add('nota-input');
            input.dataset.idEstudiante = id_estudiante;
            input.dataset.idMateria = id_materia;

            input.addEventListener('blur', function () {
                if (input.value === '') input.value = 0;
                guardarNota(input);
                input.readOnly = true;
            });

            celdaNueva.appendChild(input);
            const celdaAgregar = fila.querySelector('.agregar_nota').closest('td');
            fila.insertBefore(celdaNueva, celdaAgregar);
        });
    });*/

    document.querySelectorAll('.icono__editar').forEach(btn => {
        btn.addEventListener('click', function () {
            const fila = this.closest('tr');
            const inputs = fila.querySelectorAll('input.nota-input');
            inputs.forEach(input => {
                input.readOnly = false;
            });
        });
    });

    document.querySelectorAll('.nota-input').forEach(input => {
        input.addEventListener('blur', function () {
            if (!this.readOnly) {
                guardarNota(this);
            }
        });
    });

    function guardarNota(input) {
        let nota = input.value;
        const id_estudiante = input.dataset.idEstudiante;
        const id_materia = input.dataset.idMateria;
        const fila = input.closest('tr');
        const id_periodo_input = fila.querySelector('.periodo-actual');
        const id_periodo = id_periodo_input ? id_periodo_input.value : null;

        if (nota === '') nota = 0;

        fetch('{{ route("calificaciones.guardarAjax") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                nota,
                id_estudiante,
                id_materia,
                id_periodo
            })
        })
        .then(res => res.json())
        .then(data => {
            console.log(data.mensaje);
            input.readOnly = true; 
        })
        .catch(error => {
            console.error('Error al guardar nota:', error);
            alert('No se pudo guardar la nota. Intente nuevamente.');
        });
    }
});
</script>
@endpush