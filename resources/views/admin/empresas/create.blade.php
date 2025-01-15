@extends('adminlte::master')

@php($dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home'))

@if (config('adminlte.use_route_url', false))
    @php($dashboard_url = $dashboard_url ? route($dashboard_url) : '')
@else
    @php($dashboard_url = $dashboard_url ? url($dashboard_url) : '')
@endif

@section('adminlte_css')
    @stack('css')
    <link rel="stylesheet" href="{{ asset('css/bounce.css') }}">
    @yield('css')
@stop

@section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{-- Card Box --}}
                <div class="card {{ config('Adminlte.classes_auth_card', 'card-outline card-primary') }}"
                    style="box-shadow: 5px 5px 5px 5px #cccccc">

                    {{-- Card Header --}}
                    <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                        <h3 class="card-title float-none text-center">
                            <b>Registro de una nueva empresa</b>
                        </h3>
                    </div>

                    {{-- Card Body --}}
                    <div
                        class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                        <form action="{{ 'crearEmpresa/create' }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" name="logo" id="file" class="form-control"
                                            accept=".jpg, .jpeg, .png">
                                        @error('logo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                        <br>
                                        <output id="list"></output>
                                        <script>
                                            function archivo(evt) {
                                                var files = evt.target.files; //file List objet
                                                //Obtenemos la imagen del campo "file"
                                                for (var i = 0, f; f = files[i]; i++) {
                                                    //solo admitimos imagenes
                                                    if (!f.type.match('image.*')) {
                                                        continue;
                                                    }
                                                    var reader = new FileReader();
                                                    reader.onload = (function(theFile) {
                                                        return function(e) {
                                                            //insertamos la imagen
                                                            document.getElementById("list").innerHTML = ['<img class="thumb thumbail" src="', e
                                                                .target.result, '" width="90%" title="', escape(theFile.name), '"/>'
                                                            ].join('');
                                                        };
                                                    })(f);
                                                    reader.readAsDataURL(f);

                                                }

                                            }
                                            document.getElementById('file').addEventListener('change', archivo, false);
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="pais">País</label>
                                                <select class="form-control" id="select_pais" name="pais">
                                                    @foreach ($paises as $pais)
                                                        <option value="{{ $pais->id }}">{{ $pais->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="departamentoEmpresa" name="departamento">Departamento</label>
                                                <div id="respuesta_pais"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="ciudadEmpresa" name="ciudad">Ciudad</label>
                                                <div id="respuesta_depto"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="codigoEmpresa">Código Postal</label>
                                                <select class="form-control" id="select_cpostal" name="codigo_postal">
                                                    @foreach ($paises as $pais)
                                                        <option value="{{ $pais->id }}">{{ $pais->phone_code }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="monedaEmpresa">Moneda</label>
                                                <select id="select_moneda" class="form-control" name="moneda">
                                                    @foreach ($monedas as $moneda)
                                                        <option value="{{ $moneda->id }}">{{ $moneda->code }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nombreImpuesto">Impuesto</label>
                                                <input type="text" class="form-control" id="nomImpuesto"
                                                    name="nombre_impuesto"
                                                    value="{{ old('nombre_impuesto') }}">
                                                @error('nombre_impuesto')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="cantidadImpuesto">%</label>
                                                <input type="number" class="form-control" id="valImpuesto"
                                                    name="cantidad_impuesto" 
                                                    value="{{ old('cantidad_impuesto') }}">
                                                @error('cantidad_impuesto')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="nit">NIT</label>
                                                <input type="text" class="form-control" id="nit" name="nit"
                                                    value="{{ old('nit') }}" required>
                                                @error('nit')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="nitCod">CodNit</label>
                                                <input type="number" class="form-control" id="nitCod" name="cod_nit"
                                                    value="{{ old('cod_nit') }}" required>
                                                @error('cod_nit')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nombreEmpresa">Razón social</label>
                                                <input type="text" class="form-control" id="nombreEmpresa"
                                                    name="nombre_empresa" value="{{ old('nombre_empresa') }}" required>
                                                @error('nombre_empresa')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tipoEmpresa">Tipo Empresa</label>
                                                <input type="text" class="form-control" id="tipoEmpresa"
                                                    name="tipo_empresa" value="{{ old('tipo_empresa') }}" required>
                                                @error('tipo_empresa')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="correoEmpresa">Correo</label>
                                                <input type="email" class="form-control" id="correoEmpresa"
                                                    name="correo" value="{{ old('correo') }}">
                                                @error('correo')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="direccionEmpresa">Dirección</label>
                                                <input type="address" class="form-control" id="pac-input"
                                                    name="direccion" value="{{ old('direccion') }}">
                                                @error('direccion')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="telefonoEmpresa">Teléfono</label>
                                                <input type="text" class="form-control" id="telefonoEmpresa"
                                                    name="telefono" value="{{ old('telefono') }}">
                                                @error('telefono')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary btn-sm">Crear Empresa</button>
                                            <button type="text" class="btn btn-secondary btn-sm" onclick="history.back()"><i class="fas fa-reply"></i> Volver</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- Card Footer --}}
                    @hasSection('auth_footer')
                        <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                            @yield('auth_footer')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @stop

    @section('adminlte_js')
        @stack('js')
        @yield('js')

        <script>
            $('#select_pais').on('change', function() {
                var id_pais = $('#select_pais').val();
                if (id_pais) {
                    $.ajax({
                        url: "{{ url('/crearEmpresa/depto') }}" + '/' + id_pais,
                        type: "GET",
                        success: function(data) {
                            $('#respuesta_pais').html(data);
                        }
                    });
                } else {
                    alert('Debe seleccionar un país')
                }
            });
        </script>
        <script>
            $(document).on('change', '#select_depar', function() {
                var id_depto = $(this).val();
                if (id_depto) {
                    $.ajax({
                        url: "{{ url('/crearEmpresa/ciudad') }}" + '/' + id_depto,
                        type: "GET",
                        success: function(data) {
                            $('#respuesta_depto').html(data);
                        }
                    });
                } else {
                    alert('Debe seleccionar un departamento')
                }
            });
        </script>
    @stop
