<?php

namespace App\Http\Controllers;

use App\Models\HoraExtraGeneral;
use App\Models\HoraExtraDetalle;
use App\Models\Departamento;
use App\Models\Clase;
use App\Models\CentroCosto;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
use Illuminate\Support\Facades\Auth;


class HoraExtraGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listDatosGeneral = HoraExtraGeneral::obtenerHorasExtrasGenerales();
        // $horasExtrasGen = HoraExtraGeneral::with(['usuario', 'departamento', 'clase', 'centroCosto', 'aprobador', 'detalles'])->get();
        return view('admin.horas_extras.index', compact('listDatosGeneral'));

    }

    public function create()
    {
        $departamentos = Departamento::all();
        $clases = Clase::all();
        $ccostos = CentroCosto::all();
        $listDatosGeneral = HoraExtraGeneral::obtenerHorasExtrasGenerales();
        return view('admin.horas_extras.create', compact('listDatosGeneral', 'departamentos', 'clases', 'ccostos'));
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
        // Validar y almacenar la nueva hora extra general
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horasExtrasConDetalles = HoraExtraGeneral::obtenerHorasExtrasConDetalles();
        $horaExtraGeneral = HoraExtraGeneral::with(['usuario', 'departamento', 'clase', 'centroCosto', 'aprobador', 'detalles'])->findOrFail($id);
        return view('admin.horas_extras.show', compact('horaExtraGeneral'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HoraExtraGeneral $horaExtraGeneral)
    {
        return view('admin.horas_extras.edit', compact('horaExtraGeneral'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HoraExtraGeneral $horaExtraGeneral)
    {
        // Validar y actualizar la hora extra general
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HoraExtraGeneral $horaExtraGeneral)
    {
        $horaExtraGeneral->delete();
        return redirect()->route('admin.horas_extras.index');
    }
}