<!-- filepath: /c:/xampp/htdocs/sistemas_sm/resources/views/admin/horas_extras/create.blade.php -->
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('css/bounce.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <h1>Horas Extras/Creación de registro</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-green shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <b>
                        <h3 class="card-title">Información General</h3>
                    </b>
                </div>
                <div class="card-body">
                    <form id="horasExtrasForm" action="{{ url('/admin/horas_extras') }}" method="post">
                        @csrf
                        {{-- Fila de datos autenticados por el usuario --}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <input type="text" class="form-control" name="usuario"
                                        value="{{ Auth::user()->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="documento"># Identificación</label>
                                    <input type="text" class="form-control" name="documento"
                                        value="{{ Auth::user()->documento }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <input type="text" class="form-control" name="cargo"
                                        value="{{ Auth::user()->cargo->name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="correo">Correo</label>
                                    <input type="text" class="form-control" name="correo"
                                        value="{{ Auth::user()->email }}" readonly>
                                </div>
                            </div>
                        </div>
                        {{-- Fila de datos anidados entre departamento, clase y centros de costo --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="departamento">Departamento</label>
                                    <select class="form-control" id="select_depart" name="departamento">
                                        @foreach ($departamentos as $depart)
                                            <option value="{{ $depart->id }}">{{ $depart->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="clase">Clase</label>
                                    <select class="form-control" id="select_clase" name="clases">
                                        {{-- @foreach ($clases as $clase)
                                            <option value="{{ $clase->id }}">{{ $clase->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="centro_costo">Centro de Costo</label>
                                    <select class="form-control" id="select_ccosto" name="centro_costos">
                                        {{-- @foreach ($ccostos as $ccosto)
                                            <option value="{{ $ccosto->id }}">{{ $ccosto->name }}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Fila de datos generales para el registro de las horas extras --}}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mes_reportado">Mes Reportado</label>
                                    <select class="form-control" name="mes_reportado" required>
                                        <option value="" disabled>Seleccione un mes</option>
                                        <option value="Enero">Enero</option>
                                        <option value="Febrero">Febrero</option>
                                        <option value="Marzo">Marzo</option>
                                        <option value="Abril">Abril</option>
                                        <option value="Mayo">Mayo</option>
                                        <option value="Junio">Junio</option>
                                        <option value="Julio">Julio</option>
                                        <option value="Agosto">Agosto</option>
                                        <option value="Septiembre">Septiembre</option>
                                        <option value="Octubre">Octubre</option>
                                        <option value="Noviembre">Noviembre</option>
                                        <option value="Diciembre">Diciembre</option>
                                    </select>
                                    @error('mes_reportado')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="proyecto_asociado">Proyecto asociado</label>
                                    <input type="text" class="form-control" name="proyecto_asociado"
                                        value="{{ old('proyecto_asociado') }}" required>
                                    @error('proyecto_asociado')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="estado">Estado</label>
                                    <select class="form-control" name="estado" disabled>
                                        <option value="Pendiente" selected>Pendiente</option>
                                        <option value="Rechazado">Rechazado</option>
                                        <option value="Aceptado">Aceptado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    {{-- <label for="estado">Estado</label> --}}
                                    <a type="submit" class="btn btn-primary btn-sm" id=""><i
                                            class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        {{-- Fila de datos de fecha de inicio y fin de las horas extras --}}
                        <table id="horasExtrasTable" class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align: center">#</th>
                                    <th scope="col">Actividad</th>
                                    <th scope="col" style="padding: 0px 130px 0px 40px;">Fecha de reporte</th>
                                    <th scope="col">Horas Ex Diurnas ordinario</th>
                                    <th scope="col">Horas Ex Nocturnas ordinario</th>
                                    <th scope="col">Horas Ex Diurnas fest/dom</th>
                                    <th scope="col">Horas Ex Nocturnas fest/dom</th>
                                    <th scope="col">Recargo Nocturno ordinario</th>
                                    <th scope="col">Recargo Diurno festivo</th>
                                    <th scope="col">Recargo Nocturno festivo</th>
                                    <th scope="col">Recargo Ord Nocturno festivo</th>
                                    <th scope="col">Permisos</th>
                                </tr>
                            </thead>

                            <tbody class="display-none" id="section_hrp1">
                                <?php $cantidadHE = 1; ?>
                                {{-- @foreach ($horas_extras as $hora_extra) --}}
                                <tr>
                                    <td style="text-align: center">{{ $cantidadHE++ }}</td>
                                    <td><input type="text" class="form-control" name="actividad"
                                            value="{{ old('actividad') }}" required>
                                        @error('actividad')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td class="col-md-2"><input type="date" class="form-control" name="fecha"
                                            id="fecha" value="{{ old('fecha') }}" required>
                                        @error('fecha')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td> <input type="number" class="form-control suma_horasExtras" name="ex_diur_ord"
                                            placeholder="0" id="ex_diur_ord" value="{{ old('ex_diur_ord') }}">
                                        @error('ex_diur_ord')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td><input type="number" class="form-control suma_horasExtras" name="ex_noct_ord"
                                            placeholder="0" id="ex_noct_ord" value="{{ old('ex_noct_ord') }}">
                                        @error('ex_noct_ord')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td><input type="number" class="form-control suma_horasExtras"
                                            name="ex_diur_festdomin" placeholder="0" id="ex_diur_festdomin"
                                            value="{{ old('ex_diur_festdomin') }}">
                                        @error('ex_diur_festdomin')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td><input type="number" class="form-control suma_horasExtras"
                                            name="ex_noct_festdomin" placeholder="0" id="ex_noct_festdomin"
                                            value="{{ old('ex_noct_festdomin') }}">
                                        @error('ex_noct_festdomin')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td><input type="number" class="form-control suma_recargos" name="recargo_noct"
                                            placeholder="0" id="recargo_noct" value="{{ old('recargo_noct') }}">
                                        @error('recargo_noct')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td><input type="number" class="form-control suma_recargos" name="recargo_diur_fest"
                                            placeholder="0" id="recargo_diur_fest"
                                            value="{{ old('recargo_diur_fest') }}">
                                        @error('recargo_diur_fest')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td><input type="number" class="form-control suma_recargos" name="recargo_noct_fest"
                                            placeholder="0" id="recargo_noct_fest"
                                            value="{{ old('recargo_noct_fest') }}">
                                        @error('recargo_noct_fest')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td><input type="number" class="form-control suma_recargos"
                                            name="recargo_ord_fest_noct" placeholder="0" id="recargo_ord_fest_noct"
                                            value="{{ old('recargo_ord_fest_noct') }}">
                                        @error('recargo_ord_fest_noct')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </td>
                                    <td><input type="number" class="form-control suma_permisos" name="permisos"
                                            id="permisos" placeholder="0">
                                        @error('permisos')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                        <div id="section_hrp" class="table table-striped table-hover table-sm">
                        </div>
                        {{-- </table> --}}
                        <br>
                        {{-- Fila de sumatoria --}}
                        <div class="col-md-12">
                            <div class="card card-outline card-green p-3 mb-5 mt-0 bg-body rounded">
                                <div class="card-header">
                                    <h3 class="card-title align-center">Sumatoria</h3>
                                </div><br>
                                {{-- Fila de sumatoria --}}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="suma_horasextras">Horas Extras</label>
                                            <input type="number" class="form-control suma_hextras" id="suma_horasextras"
                                                name="suma_horasextras" placeholder="0"
                                                value="{{ old('suma_horasextras') }}" disabled>
                                            @error('suma_horasextras')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="suma_recargos">Recargos</label>
                                            <input type="number" class="form-control total_suma" id="suma_recargos"
                                                name="suma_recargos" placeholder="0" value="{{ old('suma_recargos') }}"
                                                disabled>
                                            @error('suma_recargos')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="suma_permisos">Permisos</label>
                                            <input type="number" class="form-control total_suma" id="suma_permisos"
                                                name="suma_permisos" placeholder="0" value="{{ old('suma_permisos') }}"
                                                disabled>
                                            @error('suma_permisos')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div><br>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="suma_total">Total</label>
                                            <input type="number" class="form-control total_suma" id="suma_total"
                                                name="suma_total" disabled>
                                            @error('suma_total')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card card-outline card-green p-3 mb-5 mt-0 bg-body rounded">
                                <div class="card-header">
                                    <h3 class="card-title align-center">Autorización y aprobación</h3>
                                </div><br>
                                {{-- Fila de sumatoria --}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jefe">Jefe</label>
                                            <select class="form-control" id="jefe" name="jefe">
                                                @foreach ($jefes as $jefe)
                                                    <option value="{{ $jefe->id }}">{{ $jefe->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('jefe')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gerente">Gerente</label>
                                            <select class="form-control" id="gerente" name="gerente">
                                                @foreach ($gerentes as $gerente)
                                                    <option value="{{ $gerente->id }}">{{ $gerente->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('gerente')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm"><i
                                            class="fas fa-save"></i>Guardar</button>
                                    <button type="button" class="btn btn-secondary btn-sm" onclick="history.back()"><i
                                            class="fas fa-reply"></i> Volver</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <style>
        .mt-n1 {
            margin-top: 1rem !important;
        }
    </style>
@stop

@section('js')
    <script src="../../js/functions.js"></script>
@stop
