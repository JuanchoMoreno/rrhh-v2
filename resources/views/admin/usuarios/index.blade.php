@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Listado de usuarios</h1>
    <link rel="stylesheet" href="{{ asset('css/bounce.css') }}">
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-purple shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h2 class="card-title">Usuarios existentes</h2>
                    <div class="card-tools">
                        <a href="{{ url('/admin/usuarios/create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="usuariosTable" class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center">#</th>
                                <th scope="col">Documento</th>
                                <th scope="col">Nombre de Usuario</th>
                                <th scope="col">Correo</th>
                                {{-- <th scope="col">Tipo Documento</th> --}}
                                <th scope="col">Cargo</th>
                                <th scope="col">Rol Asignado</th>
                                <th scope="col" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $contadorUsu = 1; ?>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td style="text-align: center">{{ $contadorUsu++ }}</td>
                                    <td>{{ $usuario->documento }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    {{-- <td>{{ $usuario->tipo_doc }}</td> --}}
                                    <td>{{ $usuario->cargo->name }}</td>
                                    <td>{{ $usuario->roles->pluck('name')->implode(', ') }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <a href="{{ url('/admin/usuarios', $usuario->id) }}" class="btn btn-info btn-sm fas fa-eye"></a>
                                            <a href="{{ url('/admin/usuarios/' . $usuario->id . '/edit') }}" class="btn btn-warning btn-sm fas fa-edit"></a>
                                            @if ($usuario->id != 1)
                                                <form class="btn-group" action="{{ url('/admin/usuarios', $usuario->id) }}" method="post" onclick="pregunta{{ $usuario->id }}(event)" id="formDelete{{ $usuario->id }}">
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
            $('#usuariosTable').DataTable({
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