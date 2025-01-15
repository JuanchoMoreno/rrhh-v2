@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('css/bounce.css') }}">
    <h1>Cargos/Editar registro</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-purple shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class="card-title">Editar</h3>
                </div>
                <div class="card-body">
                    <form action="{{url('/admin/cargos',$cargo->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nombre del cargo</label>
                                    <input type="text" class="form-control" value="{{$cargo->name}}" name="name" required>
                                    @error('name')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Descripción del cargo</label>
                                    <input type="text" class="form-control" value="{{$cargo->description}}" name="description">
                                    @error('description')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning btn-sm" ><i class="fas fa-pencil-alt"></i> Modificar</button>
                                    <button type="text" class="btn btn-secondary btn-sm" onclick="history.back()"><i class="fas fa-reply"></i> Volver</button>
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
@stop

@section('js')

@stop
