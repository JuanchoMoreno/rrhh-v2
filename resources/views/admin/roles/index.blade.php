@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
<link rel="stylesheet" href="{{ asset('css/bounce.css') }}">
    <h1>Listado de roles</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Roles existentes</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/roles/create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="rolesTable" class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center">#</th>
                                <th scope="col">Nombre del Rol</th>
                                <th scope="col" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contadorRol = 1; ?>
                            @foreach ($roles as $rol)
                                <tr>
                                    <td style="text-align: center">{{ $contadorRol++ }}</td>
                                    <td>{{ $rol->name }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ url('/admin/roles', $rol->id) }}" class="btn btn-info btn-sm fas fa-eye"></a>
                                            <a href="{{ url('/admin/roles/' . $rol->id . '/edit') }}" class="btn btn-warning btn-sm fas fa-edit"></a>
                                            @if ($rol->id != 1)
                                                <form class="btn-group" action="{{ url('/admin/roles', $rol->id) }}" method="post" onclick="pregunta{{ $rol->id }}(event)" id="formDelete{{ $rol->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm fas fa-trash-alt btn-group" role="group"></button>
                                                </form>
                                            @else
                                                <button type="button" class="btn btn-danger btn-sm fas fa-trash-alt btn-group" role="group" disabled></button>
                                            @endif
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
            $('#rolesTable').DataTable({
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