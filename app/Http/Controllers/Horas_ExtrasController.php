<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\support\facades\DB;
use App\Models\User;
use App\Models\Departamentos;
use App\Models\Clases;
use App\Models\Ccostos;
use App\Models\Cargo;
use App\Models\TipoDoc;
use App\Models\HorasExtra;
class Horas_ExtrasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargar las relaciones necesarias
        $horas_extras = HorasExtra::with(['usuario', 'departamento', 'clase', 'centroCosto'])->get();

        // Obtener usuarios con roles de Jefe o Gerente
        $aprobadores = User::role(['Jefe','Gerente'])->get();

        return view('admin.horas_extras.index', compact('horas_extras', 'aprobadores'));
    }

    public function create()
    {
        $usuario = Auth::user();
        $cargos = DB::table('cargos')->get();
        $tipodocs = TipoDoc::all();
        $departamentos = DB::table('departamentos')->get();
        $clases = DB::table('clases')->get();
        $ccostos = DB::table('ccostos')->get();
        $horas_extras = HorasExtra::with(['usuario', 'departamento', 'clase', 'centroCosto'])->get();
        $aprobadores = User::role(['Jefe','Gerente'])->get();
        // Obtener usuarios con roles de Jefe y Gerente
        $jefes = User::role('Jefe')->get();
        $gerentes = User::role('Gerente')->get();

        return view('admin.horas_extras.create', compact('departamentos', 'clases', 'ccostos', 'usuario', 'cargos', 'tipodocs', 'jefes', 'gerentes','horas_extras','aprobadores'));

    }

    public function buscar_clase($id_depto)
    {
        try {
            $clases = DB::table('clases')->where('depart_id', $id_depto)->get();
            return view('admin.horas_extras.cargar_clases', compact('clases'));
            //code...
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'ERROR']);
            //throw $th;
        }
    }

    public function buscar_ccosto($id_clase)
    {
        try {
            $ccostos = DB::table('ccostos')->where('clases_id', $id_clase)->get();
            return view('admin.horas_extras.cargar_ccostos', compact('ccostos'));
            //code...
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'ERROR']);
            //throw $th;
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
