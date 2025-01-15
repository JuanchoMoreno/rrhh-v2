<!-- filepath: /c:/xampp/htdocs/sistemas_sm/resources/views/admin/horas_extras/index.blade.php -->
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
                    <h2 class="card-title">Horas Extras</h2>
                    <div class="card-tools">
                        <a href="{{ url('/admin/horas_extras/create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="horasExtrasTable" class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center">#</th>
                                <th scope="col">Documento</th>
                                <th scope="col">Nombre de Usuario</th>
                                {{-- <th scope="col">Departamento</th> --}}
                                {{-- <th scope="col">Clase</th> --}}
                                <th scope="col">Centro de Costo</th>
                                <th scope="col">Mes Reportado</th>
                                <th scope="col">Aprobador</th>
                                <th scope="col">Estado</th>
                                <th scope="col" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contadorHoras = 1; ?>
                            @foreach ($horas_extras as $hora_extra)
                                <tr>
                                    <td style="text-align: center">{{ $contadorHoras++ }}</td>
                                    <td>{{ $hora_extra->usuario->documento }}</td>
                                    <td>{{ $hora_extra->usuario->name }}</td>
                                    {{-- <td>{{ $hora_extra->departamento->name }}</td> --}}
                                    {{-- <td>{{ $hora_extra->clase->name }}</td> --}}
                                    <td>{{ $hora_extra->centroCosto->name }}</td>
                                    <td>{{ $hora_extra->mes_reportado }}</td>
                                    <td>
                                        @foreach ($aprobadores as $aprobador)
                                            @if ($hora_extra->aprobador_id == $aprobador->id)
                                                {{ $aprobador->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($hora_extra->estado == 'Pendiente')
                                            <span class="badge badge-warning">{{ $hora_extra->estado }}</span>
                                        @elseif ($hora_extra->estado == 'Rechazado')
                                            <span class="badge badge-danger">{{ $hora_extra->estado }}</span>
                                        @elseif ($hora_extra->estado == 'Aceptado')
                                            <span class="badge badge-success">{{ $hora_extra->estado }}</span>
                                        @else
                                            <span>{{ $hora_extra->estado }}</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ url('/admin/horas_extras', $hora_extra->id) }}" class="btn btn-info btn-sm fas fa-eye"></a>
                                            <a href="{{ url('/admin/horas_extras/' . $hora_extra->id . '/edit') }}" class="btn btn-warning btn-sm fas fa-edit"></a>
                                            {{-- @if ($hora_extra->id != 1) --}}
                                                <form class="btn-group" action="{{ url('/admin/horas_extras', $hora_extra->id) }}" method="post" onclick="pregunta{{ $hora_extra->id }}(event)" id="formDelete{{ $hora_extra->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm fas fa-trash-alt btn-group" role="group"></button>
                                                </form>
                                            {{-- @else
                                                <button type="button" class="btn btn-danger btn-sm fas fa-trash-alt btn-group" role="group" disabled></button>
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