@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('css/bounce.css') }}">
    <h1>Usuarios/Creación de Usuario</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-purple shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class="card-title">Crear usuario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/usuarios/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rol">Nombre del rol</label>
                                    <select name="rol" id="" class="form-control">
                                        @foreach ($roles as $rol)
                                            <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="rol">Cargo</label>
                                    <select name="cargo" id="" class="form-control">
                                        @foreach ($cargos as $cargo)
                                            <option value="{{ $cargo->id }}">{{ $cargo->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombre Completo</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                        required>
                                    @error('name')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tipo_doc">Tipo Documento</label>
                                    <select name="tipo_doc" id="" class="form-control">
                                        @foreach ($tipodocs as $tipo_doc)
                                            <option value="{{ $tipo_doc->name }}">{{ $tipo_doc->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Documento</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="documento"
                                        required>
                                    @error('documento')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Correo</label>
                                    <input type="email" class="form-control" value="{{ old('email') }}" name="email"
                                        required>
                                    @error('email')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" value="{{ old('password') }}" name="password"
                                        required>
                                    @error('password')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmación de contraseña</label>
                                    <input type="password" class="form-control" value="{{ old('password_confirmation') }}"
                                        name="password_confirmation" required>
                                </div>
                            </div>
                        </div>

                        

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>
                                        Guardar</button>
                                    <button type="text" class="btn btn-secondary btn-sm" onclick="history.back()"><i
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
@stop

@section('js')

@stop
