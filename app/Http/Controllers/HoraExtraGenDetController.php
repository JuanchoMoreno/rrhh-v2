<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\HoraExtraGenDet;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Clases;
use App\Models\Ccostos;
use App\Models\Cargo;
use App\Models\TipoDoc;
use App\Models\HoraExtraDetalle;
use App\Models\HoraExtraGeneral;

class HoraExtraGenDetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horas_extras_gen = HoraExtraGeneral::with(['usuario', 'departamento', 'clase', 'centroCosto'])->get();
        $horas_extras_det = HoraExtraDetalle::with(['permisos', 'departamento', 'clase', 'centroCosto'])->get();

        // Obtener usuarios con roles de Jefe o Gerente
        $aprobadores = User::role(['Jefe', 'Gerente'])->get();

        return view(
            "admin.horas_extras_GenDet.index",
            compact(
                "horas_extras_det",
                "horas_extras_gen",
                "usuarios",
                "departamentos",
                "clases",
                "ccostos",
                "cargos",
                "tipos_doc",
                "aprobadores"
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(HoraExtraGenDet $horaExtraGenDet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HoraExtraGenDet $horaExtraGenDet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HoraExtraGenDet $horaExtraGenDet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HoraExtraGenDet $horaExtraGenDet)
    {
        //
    }
}