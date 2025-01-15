<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::all();
       return view('admin.cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cargos.create');    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    $datos = request()->all();
        // return response()->json($datos);

        $request->validate([
            'name'=>'required|unique:cargos',
            
        ]);

        $cargo= new Cargo();
        $cargo->name = $request->name;
        $cargo->description = $request->description;
        $cargo->save();

        //retornar al inicio del administrador 
        return redirect()->route('admin.cargos.index')
        ->with('mensaje', 'Se registro el cargo con éxito')
        ->with('icono','success');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cargo = Cargo::find($id);
        return view('admin.cargos.show',compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cargo = Cargo::find($id);
        return view('admin.cargos.edit',compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:cargos,name,'.$id,
        ]);

        $cargo= Cargo::find($id);
        $cargo->name = $request->name;
        if ($request->filled('description')) {
            $cargo->description = $request->description;
        }
        $cargo->save();

        //retornar al inicio del administrador 
        return redirect()->route('admin.cargos.index')
        ->with('mensaje', 'Se modificó el cargo con éxito')
        ->with('icono','success');

    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cargo::destroy($id);
        return redirect()->route('admin.cargos.index')
        ->with('mensaje', 'Se ha eliminado el cargo con éxito')
        ->with('icono','success');
    }
}
