<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
       return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //   $datos = request()->all();
        // return response()->json($datos);

        $request->validate([
            'name'=>'required|unique:roles',
            
        ]);

        $rol= new Role();
        $rol->name = $request->name;
        $rol->description = $request->description;
        $rol->guard_name = "web";
        $rol->save();

        //retornar al inicio del administrador 
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Se registro el rol con éxito')
        ->with('icono','success');

       

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rol = Role::find($id);
        return view('admin.roles.show',compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rol = Role::find($id);
        return view('admin.roles.edit',compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|unique:roles,name,'.$id,
        ]);

        $rol= Role::find($id);
        $rol->name = $request->name;
        $rol->description = $request->description;
        $rol->guard_name = "web";
        $rol->save();

        //retornar al inicio del administrador 
        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Se modificó el rol con éxito')
        ->with('icono','success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       Role::destroy($id);
       return redirect()->route('admin.roles.index')
       ->with('mensaje', 'Se ha eliminado el rol con éxito')
       ->with('icono','success');

    }
}
