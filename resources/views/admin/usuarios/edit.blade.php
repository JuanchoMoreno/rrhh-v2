<!-- filepath: /c:/xampp/htdocs/sistemas_sm/resources/views/admin/usuarios/edit.blade.php -->
@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-purple shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Editar Usuario</h3>
                </div>
                <div class="card-body col-md-4">
                    <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $usuario->name) }}" required>
                            @error('name')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $usuario->email) }}" required>
                            @error('email')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tipo_doc">Tipo de Documento</label>
                            <select class="form-control" id="tipo_doc" name="tipo_doc">
                                @foreach ($tipodocs as $tipodoc)
                                    <option value="{{ $tipodoc->id }}" {{ $usuario->tipo_doc == $tipodoc->id ? 'selected' : '' }}>{{ $tipodoc->name }}</option>
                                @endforeach
                            </select>
                            @error('tipo_doc')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="documento">Documento</label>
                            <input type="text" class="form-control" id="documento" name="documento" value="{{ old('documento', $usuario->documento) }}" required>
                            @error('documento')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cargo">Cargo</label>
                            <select class="form-control" id="cargo" name="cargo">
                                @foreach ($cargos as $cargo)
                                    <option value="{{ $cargo->id }}" {{ $usuario->cargo_id == $cargo->id ? 'selected' : '' }}>{{ $cargo->name }}</option>
                                @endforeach
                            </select>
                            @error('cargo')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-control" id="rol" name="rol">
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->name }}" {{ $usuario->roles->first()->name == $rol->name ? 'selected' : '' }}>{{ $rol->name }}</option>
                                @endforeach
                            </select>
                            @error('rol')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña (dejar en blanco para no cambiar)</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <small style="color: red">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
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