@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')
<link rel="stylesheet" href="{{ asset('css/bounce.css') }}">
<h1>Listado de cargos</h1>
<hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-purple shadow p-3 mb-5 bg-body rounded">
            <div class="card-header">
                <h3 class="card-title">Cargos existentes</h3>
                <div class="card-tools">
                    <a href="{{ url('/admin/cargos/create') }}" class="btn btn-primary btn-sm"><i
                            class="fas fa-plus"></i> Nuevo</a>
                </div>
            </div>
            <div class="card-body">
                <table id="cargosTable" class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center">#</th>
                            <th scope="col">Nombre del cargo</th>
                            <th scope="col">Descripcion del cargo</th>
                            <th scope="col" style="text-align: center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contadorCargo = 1; ?>
                        @foreach ($cargos as $cargo)
                        <tr>
                            <td style="text-align: center">{{ $contadorCargo++ }}</td>
                            <td>{{ $cargo->name }}</td>
                            {{-- <td>{{ $cargo->description }}</td> --}}
                            <td style="text-align: center">
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ url('/admin/cargos', $cargo->id) }}"
                                        class="btn btn-info btn-sm fas fa-eye"></a>
                                    <a href="{{ url('/admin/cargos/' . $cargo->id . '/edit') }}"
                                        class="btn btn-warning btn-sm fas fa-edit"></a>
                                    @if ($cargo->id != 1)
                                    <form action="{{ url('/admin/cargos', $cargo->id) }}" class="btn-group"
                                        method="post" onclick="pregunta{{ $cargo->id }}(event)"
                                        id="formDelete{{ $cargo->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm fas fa-trash-alt"
                                            role="group"></button>
                                    </form>
                                    @else
                                    <button type="button" class="btn btn-danger btn-sm fas fa-trash-alt btn-group"
                                        role="group" disabled></button>
                                    @endif
                                    <script>
                                    function pregunta {
                                        {
                                            $cargo - > id
                                        }
                                    }(event) {
                                        event.preventDefault();
                                        Swal.fire({
                                            title: "¿Está seguro de eliminar este cargo?",
                                            text: "",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonColor: "#3085d6",
                                            cancelButtonColor: "#d33",
                                            confirmButtonText: "Sí, eliminar",
                                            cancelButtonText: "Cancelar"
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                document.getElementById('formDelete{{ $cargo->id }}').submit();
                                            }
                                        });
                                    }
                                    </script>
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
    $('#cargosTable').DataTable({
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
            lengthMenu: "Mostrar _MENU_ por página",
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