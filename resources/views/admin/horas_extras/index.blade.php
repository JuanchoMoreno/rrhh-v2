@extends('adminlte::page')

@section('title', 'Horas Extras')

@section('content_header')
<h1>Listado de Horas Extras</h1>
<hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-green">
            <div class="card-header">
                <h1 class="card-title">Notas:</h1><br>
                <h2 class="card-title badge-warning">Cálculo total || Horas extras + Recargos - Permisos</h2><br>
                <!-- <h2 class="card-title badge-warning">Recuerde que debe tener máximo 46 horas Mensuales</h2> -->
                <div class="card-tools">
                    <a href="{{ url('/admin/horas_extras/create') }}" class="btn btn-primary btn-sm"><i
                            class="fas fa-plus"></i> Nuevo</a>
                </div>
            </div>
            <div class="card-body">
                <table id="horasExtrasTable" class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center">#</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Nombre de Usuario</th>
                            <!-- <th scope="col">Departamento</th>
                            <th scope="col">Clase</th> -->
                            <th scope="col">Centro de Costo</th>
                            <th scope="col">Mes Reportado</th>
                            <th scope="col" class="badge-warning">Cálculo total</th>
                            <th scope="col">Aprobador</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Observaciones</th>
                            <th scope="col">Creación</th>
                            <th scope="col" style="text-align: center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contadorHoras = 1; ?>
                        @foreach ($listDatosGeneral as $hora_extraG)

                        <tr>
                            <td style="text-align: center">{{ $contadorHoras++ }}</td>
                            <td>{{ $hora_extraG->usuarioDocumento }}</td>
                            <td>{{ $hora_extraG->usuarioNombre }}</td>
                            {{-- <td>{{ $hora_extraG->departamentoNombre }}</td> --}}
                            {{-- <td>{{ $hora_extraG->claseNombre}}</td> --}}
                            <td>{{ $hora_extraG->ccostoNombre }}</td>
                            <td>{{ $hora_extraG->mes_reportado }}</td>
                            <td>{{ $hora_extraG->total_solicitud }}</td>
                            <td>{{ $hora_extraG->aprobadorNombre }}</td>
                            <td>
                                @if ($hora_extraG->estado == 'Pendiente')
                                <span class="badge badge-warning">{{ $hora_extraG->estado }}</span>
                                @elseif ($hora_extraG->estado == 'Rechazado')
                                <span class="badge badge-danger">{{ $hora_extraG->estado }}</span>
                                @elseif ($hora_extraG->estado == 'Aceptado')
                                <span class="badge badge-success">{{ $hora_extraG->estado }}</span>
                                @else
                                <span>{{ $hora_extraG->estado }}</span>
                                @endif
                            </td>
                            <td>{{ $hora_extraG->detalleEstado }}</td>
                            <td>{{ $hora_extraG->created_at}}</td>
                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ url('/admin/horas_extras', $hora_extraG->id) }}"
                                        class="btn btn-info btn-sm fas fa-eye"></a>
                                    <a href="{{ url('/admin/horas_extras/' . $hora_extraG->id . '/edit') }}"
                                        class="btn btn-warning btn-sm fas fa-edit"></a>
                                    {{-- @if ($hora_extraG->id != 1) --}}
                                    <form class="btn-group" action="{{ url('/admin/horas_extras', $hora_extraG->id) }}"
                                        method="post" onclick="pregunta{{ $hora_extraG->id }}(event)"
                                        id="formDelete{{ $hora_extraG->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fas fa-trash-alt btn-group"
                                            role="group"></button>
                                    </form>
                                    {{-- @else
                                        <button type="button" class="btn btn-danger btn-sm fas fa-trash-alt btn-group"
                                            role="group" disabled></button>
                                        @endif --}}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#horasExtrasTable').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/es_es.json',
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            },
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros por página",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "No hay registros disponibles",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            zeroRecords: "No se encontraron registros coincidentes",
            emptyTable: "No hay datos disponibles en la tabla",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            thousands: ",",
            decimal: ".",
            aria: {
                sortAscending: ": activar para ordenar la columna ascendente",
                sortDescending: ": activar para ordenar la columna descendente"
            }
        }
    });
});
</script>
@stop