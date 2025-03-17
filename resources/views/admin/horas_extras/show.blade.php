@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<link rel="stylesheet" href="sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('css/bounce.css') }}">
<h1>Horas Extras / Detalle</b></h1>
<hr>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-green">
            <!-- <div class="card-header">
                                                                                                                    <h2 class="card-title">Detalle de solicitud</h2>
                                                                                                                    <div class="card-tools">
                                                                                                                        <a href="{{ url('/admin/horas_extras/') }}" class="btn btn-secondary btn-sm"><i
                                                                                                                        class="fas fa-reply"></i> Volver</a>
                                                                                                                    </div>
                                                                                                                </div> -->
            <div class="card-body">
                <h1 class="card-title">Detalle de solicitud #
                    <strong>
                        {{ $horaExtraGeneral->id }}
                    </strong>
                </h1>
                <br>
                <table id="horasExtrasTable" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Documento</th>
                            <th>Departamento</th>
                            <th>Clase</th>
                            <th>Centro de Costo</th>
                            <th>Mes Reportado</th>
                            <th>Proyecto Asociado</th>
                            <th>Actividad</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <hr>
                    <tbody>
                        <tr>
                            <td>{{ $horaExtraGeneral->id }}</td>
                            <td>{{ $horaExtraGeneral->usuario ? $horaExtraGeneral->usuario->name : 'No disponible' }}
                            </td>
                            <td>{{ $horaExtraGeneral->usuario ? $horaExtraGeneral->usuario->documento : 'No disponible' }}
                            </td>
                            <td>{{ $horaExtraGeneral->departamento_name }}</td>
                            <td>{{ $horaExtraGeneral->clase_name }}</td>
                            <td>{{ $horaExtraGeneral->ccosto_name }}</td>
                            <td>{{ $horaExtraGeneral->mes_reportado }}</td>
                            <td>{{ $horaExtraGeneral->proyecto_asociado }}</td>
                            <td>{{ $horaExtraGeneral->actividad }}</td>
                            <td>
                                @if ($horaExtraGeneral->estado == 'Pendiente')
                                <span class="badge badge-warning">{{ $horaExtraGeneral->estado }}</span>
                                @elseif ($horaExtraGeneral->estado == 'Rechazado')
                                <span class="badge badge-danger">{{ $horaExtraGeneral->estado }}</span>
                                @elseif ($horaExtraGeneral->estado == 'Aceptado')
                                <span class="badge badge-success">{{ $horaExtraGeneral->estado }}</span>
                                @else
                                <span>{{ $horaExtraGeneral->estado }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    <thead>
                        <tr>
                            <th>Fecha Reporte</th>
                            <th>Permisos</th>
                            <th>Horas Extras Diurnas Ordinarias</th>
                            <th>Horas Extras Nocturnas Ordinarias</th>
                            <th>Horas Extras Diurnas Festivas/Domingo</th>
                            <th>Horas Extras Nocturnas Festivas/Domingo</th>
                            <th>Recargo Nocturno</th>
                            <th>Recargo Diurno Festivo</th>
                            <th>Recargo Nocturno Festivo</th>
                            <th>Recargo Ordinario Festivo Nocturno</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horasExtrasConDetalles as $detalle)
                        <td>{{ $detalle->fecha_reporte }}</td>
                        <td>{{ $detalle->permisos }}</td>
                        <td>{{ $detalle->ex_diur_ord }}</td>
                        <td>{{ $detalle->ex_noct_ord }}</td>
                        <td>{{ $detalle->ex_diur_festdomin }}</td>
                        <td>{{ $detalle->ex_noct_festdomin }}</td>
                        <td>{{ $detalle->recargo_noct }}</td>
                        <td>{{ $detalle->recargo_diur_fest }}</td>
                        <td>{{ $detalle->recargo_noct_fest }}</td>
                        <td>{{ $detalle->recargo_ord_fest_noct }}</td>
                        @endforeach
                    </tbody>
                    <thead>
                        <tr>
                            <th>Suma Horas Extras</th>
                            <th>Suma Recargos</th>
                            <th>Total Horas Extras y Recargos</th>
                            <th>Total Solicitud</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horasExtrasConDetalles as $detalle)
                        <tr>
                            <td>{{ $detalle->suma_horas_extras }}</td>
                            <td>{{ $detalle->suma_recargos }}</td>
                            <td>{{ $detalle->total_hrex_recargos }}</td>
                            <td>{{ $detalle->total_solicitud }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table><br>
                <div class="card-tools">
                    <a href="{{ url('/admin/horas_extras/') }}" class=" btn btn-secondary btn-sm"><i
                            class="fas fa-reply"></i> Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
@stop

@section('js')

@stop