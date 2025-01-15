<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Cargo;
use Storage;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paises = DB::table('countries')->get();
        $departamentos = DB::table('states')->get();
        $ciudades = DB::table('cities')->get();
        $monedas = DB::table('currencies')->get();
        return view('admin.empresas.create', compact('paises', 'departamentos', 'ciudades', 'monedas'));


    }
    public function buscar_depto($id_pais)
    {
        try {
            $departamentos = DB::table('states')->where('country_id', $id_pais)->get();
            return view('admin.empresas.cargar_deptos', compact('departamentos'));
            //code...
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'ERROR']);
            //throw $th;
        }
    }
    public function buscar_ciudad($id_depto)
    {
        try {
            $ciudades = DB::table('cities')->where('state_id', $id_depto)->get();
            return view('admin.empresas.cargar_ciudades', compact('ciudades'));
            //code...
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'ERROR']);
            //throw $th;
        }
    }
    public function store(Request $request)
    {
        //prueba de envio de datos en JSON
        // $datos = request()->all();
        // return response()->json($datos);

        $request->validate([
            'nombre_empresa' => 'required',
            'tipo_empresa' => 'required',
            'nit' => 'required|unique:empresas',
            'telefono' => 'required',
            'correo' => 'required|unique:empresas',
            'cantidad_impuesto' => 'required',
            'nombre_impuesto' => 'required',
            'direccion' => 'required|unique:empresas',
            'codigo_postal' => 'required',
            'logo' => 'required|image|mimes:jpg,jpeg,png',
            'cod_nit' => 'required',
        ]);

        $empresa = new Empresa();
        $empresa->pais = $request->pais;
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->tipo_empresa = $request->tipo_empresa;
        $empresa->cod_nit = $request->cod_nit;
        $empresa->nit = $request->nit;
        $empresa->telefono = $request->telefono;
        $empresa->correo = $request->correo;
        $empresa->cantidad_impuesto = $request->cantidad_impuesto;
        $empresa->nombre_impuesto = $request->nombre_impuesto;
        $empresa->moneda = $request->moneda;
        $empresa->direccion = $request->direccion;
        $empresa->ciudad = $request->ciudad;
        $empresa->departamento = $request->departamento;
        $empresa->codigo_postal = $request->codigo_postal;

        $empresa->logo = $request->file('logo')->store('logos', 'public');
        $empresa->save();


        //crea un usuario administrador por cada empresa creada - isuario=correo - pass=nit
        $usuario = new User();
        $usuario->name = 'Admin';
        $usuario->tipo_doc = 'No establecido';
        $usuario->documento = 1;
        $usuario->email = $request->correo;
        $usuario->password = hash::make($request['nit']);
        $usuario->empresa_id = $empresa->id;
        $usuario->cargo_id = 1;
        $usuario->save();

        //asigna el rol creado
        $usuario->assignRole('Admin');
        

        //loguear usuario creado por la empresa
        Auth::login($usuario);

        //retornar al inicio del administrador 
        return redirect()->route('admin.index')
            ->with('mensaje', 'Se registro la empresa y su usuario Admin con éxito');


    }



    /**
     * Display the specified resource.
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresa $empresa)
    {
        $paises = DB::table('countries')->get();
        $departamentos = DB::table('states')->get();
        $ciudades = DB::table('cities')->get();
        $monedas = DB::table('currencies')->get();
        $empresa_id = Auth::user()->empresa_id;
        $empresa = Empresa::where('id', $empresa_id)->first();
        $departamentoSelected = DB::table('states')->where('country_id', $empresa->pais)->get();
        $ciudadSelected = DB::table('cities')->where('state_id', $empresa->departamento)->get();
        // $monedaSelected = DB::table('currencies')->where('country_id',$empresa->moneda)->get();

        return view('admin.configuraciones.edit', compact('paises', 'departamentos', 'ciudades', 'monedas', 'empresa_id', 'empresa', 'departamentoSelected', 'ciudadSelected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_empresa' => 'required',
            'tipo_empresa' => 'required',
            'nit' => 'required|unique:empresas,nit,' . $id,
            'telefono' => 'required',
            // 'correo'=>'required|unique:empresas,correo'.$id,
            'cantidad_impuesto' => 'required',
            'nombre_impuesto' => 'required',
            'direccion' => 'required',
            'codigo_postal' => 'required',
            'logo' => 'image|mimes:jpg,jpeg,png',
            'cod_nit' => 'required',
        ]);
        $empresa = Empresa::find($id);
        $empresa->pais = $request->pais;
        $empresa->nombre_empresa = $request->nombre_empresa;
        $empresa->tipo_empresa = $request->tipo_empresa;
        $empresa->cod_nit = $request->cod_nit;
        $empresa->nit = $request->nit;
        $empresa->telefono = $request->telefono;
        $empresa->correo = $request->correo;
        $empresa->cantidad_impuesto = $request->cantidad_impuesto;
        $empresa->nombre_impuesto = $request->nombre_impuesto;
        $empresa->moneda = $request->moneda;
        $empresa->direccion = $request->direccion;
        $empresa->ciudad = $request->ciudad;
        $empresa->departamento = $request->departamento;
        $empresa->codigo_postal = $request->codigo_postal;

        if ($request->hasFile('logo')) {
            Storage::delete('public/' . $empresa->logo);
            $empresa->logo = $request->file('logo')->store('logos', 'public');
        }

        $empresa->save();

        //actualiza un usuario administrador por cada empresa creada - isuario=correo - pass=nit
        $usuario_id = Auth::user()->id;
        $usuario = User::find($usuario_id);
        $usuario->name = 'Admin';
        $usuario->email = $request->correo;
        $usuario->password = hash::make($request['nit']);
        $usuario->empresa_id = $empresa->id;
        $usuario->save();


        //retornar al inicio del administrador 
        return redirect()->route('admin.index')
            ->with('mensaje', 'Se modificaron los datos de la empresa con éxito')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
