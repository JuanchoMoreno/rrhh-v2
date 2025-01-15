<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cargo;
use App\Models\TipoDoc;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresa_id = Auth::user()->empresa_id;
        $cargos = Cargo::all();
        $tipodocs = TipoDoc::all();
        $usuarios = User::where('empresa_id', $empresa_id)->get();
        return view('admin.usuarios.index', compact('usuarios', 'cargos', 'tipodocs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $cargos = Cargo::all();
        $tipodocs = TipoDoc::all();
        return view('admin.usuarios.create', compact('roles', 'tipodocs', 'cargos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //  $datos = request()->all();
        // return response()->json($datos);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|confirmed|min:8',
            'tipo_doc' => [
                'required',
                function ($attribute, $value, $error) use ($request) {
                    if ($value === 'cedula' && !preg_match('/^[a-zA-Z0-9]{1,10}$/', $request->input('documento'))) {
                        $error('El campo documento debe tener máximo 10 caracteres y solo contener letras y números cuando el tipo de documento es cédula.');
                    } elseif ($value === 'nit' && !preg_match('/^[a-zA-Z0-9]{1,9}$/', $request->input('documento'))) {
                        $error('El campo documento debe tener máximo 9 caracteres y solo contener letras y números cuando el tipo de documento es NIT.');
                    }
                },
            ],
            'documento' => 'required|string|max:20',
        ]);

        try {
            $usuario = new User();
            $usuario->name = $request->name;
            $usuario->tipo_doc = $request->tipo_doc;
            $usuario->documento = $request->documento;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->cargo = $request->cargo;
            $usuario->empresa_id = Auth::user()->empresa_id;
            // $usuario->cargo_id = $request->cargo_id;
            $usuario->save();

            $usuario->assignRole($request->rol);

            return redirect()->route('admin.usuarios.index')
                ->with('mensaje', 'Se registró el usuario con éxito')
                ->with('icono', 'success');
        } catch (\Exception $e) {
            return redirect()->route('admin.usuarios.index')
                ->with('mensaje', 'Hubo un error al registrar el usuario: ' . $e->getMessage())
                ->with('icono', 'error');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuario = User::find($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::find($id);
        $roles = Role::all();
        $cargos = Cargo::all();
        $tipodocs = TipoDoc::all();
        return view('admin.usuarios.edit', compact('usuario', 'roles', 'cargos', 'tipodocs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
        ]);

        $usuario = User::find($id);
        $usuario->name = $request->name;
        $usuario->tipo_doc = $request->tipo_doc;
        $usuario->documento = $request->documento;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->documento);
        }
        $usuario->cargo = $request->cargo;
        // $usuario->cargo_id = $request->cargo_id;
        $usuario->save();

        // $usuario->syncRoles([]); 
        // $newRole = Role::findByName($request->rol); 
        // $usuario->assignRole($newRole);

        $usuario->syncRoles([]); // Crear o obtener el nuevo rol 
        $newRole = Role::findByName($request->rol); // Cambia 'nuevo-rol' por el nombre del rol que deseas asignar // Asignar el nuevo rol 
        $usuario->assignRole($newRole);


        //retornar al inicio del administrador 
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Se modificó el Usuario con éxito')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'Se ha eliminado el usuario con éxito')
            ->with('icono', 'success');
    }
}
