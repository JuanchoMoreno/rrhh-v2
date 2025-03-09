@extends('adminlte::page')

@section('title', 'Horas Extras')

@section('content_header')


<h1>Listado de Horas Extras</h1>
<hr>
@stop

@section('content')
<div class="container">
    <h1>Horas Extras Generales</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Departamento</th>
                <th>Clase</th>
                <th>Centro de Costo</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horasExtras as $horaExtra)
            <tr>
                <td>{{ $horaExtra->id }}</td>
                <td>{{ $horaExtra->departamentoNombre }}</td>
                <td>{{ $horaExtra->claseNombre }}</td>
                <td>{{ $horaExtra->ccostoNombre }}</td>
                <td>{{ $horaExtra->fecha }}</td>
                <td>
                    <a href="{{ route('admin.horas_extras_gen.show', $horaExtra->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('admin.horas_extras_gen.edit', $horaExtra->id) }}"
                        class="btn btn-warning">Editar</a>
                    <form action="{{ route('admin.horas_extras_gen.destroy', $horaExtra->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
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