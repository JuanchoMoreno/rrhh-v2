@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('css/bounce.css') }}">
    <h1>Usuario/Detalle de Usuario</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-purple shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rol">Nombre del rol</label>
                                <p>{{ $usuario->roles->pluck('name')->implode(', ') }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombre del usuario</label>
                                <p>{{$usuario->name}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Tipo Documento</label>
                                <p>{{$usuario->tipo_doc}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">N° Documento</label>
                                <p>{{$usuario->documento}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="rol">Cargo</label>
                                <p>{{ $usuario->cargo->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <p>{{$usuario->email}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha de actualización</label>
                                <p>{{$usuario->updated_at}}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="email">Fecha de creación</label>
                                <p>{{$usuario->created_at}}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="text" class="btn btn-secondary btn-sm" onclick="history.back()"><i
                                        class="fas fa-reply"></i> Volver</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('css')
@stop

@section('js')

@stop
