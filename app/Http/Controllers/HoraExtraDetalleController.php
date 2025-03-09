<?php

namespace App\Http\Controllers;

use App\Models\HoraExtraDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HoraExtraGenDet;
use App\Models\User;

class HoraExtraDetalleController extends Controller
{
    public function index()
    {
        //Permisos
        $permisos = DB::table('permisos')->get();
        //Horas Extras
        $extraDiurnaOrdinaria = DB::table('ex_diur_ord')->get();
        $extraNocturnaOrdinaria = DB::table('ex_noct_ord')->get();
        $extraDiurnaFestiva = DB::table('ex_diur_festdomin')->get();
        $extraNocturnaFestiva = DB::table('ex_noct_festdomin')->get();
        //Recargos
        $recargoNocturno = DB::table('recargo_noct')->get();
        $recargoDiurnoFestivo = DB::table('recargo_diur_fest')->get();
        $recargoNocturnoFestivo = DB::table('recargo_noct_fest')->get();
        $recargoOrdinarioFestivoNocturno = DB::table('recargo_ord_fest_noct')->get();
        //SUMAS
        //Suma de horas extras
        $sumaHorasExtras = $extraDiurnaOrdinaria + $extraNocturnaOrdinaria + $extraDiurnaFestiva + $extraNocturnaFestiva;
        //Suma de recargos 
        $sumaRecargos = $recargoNocturno + $recargoDiurnoFestivo + $recargoNocturnoFestivo + $recargoOrdinarioFestivoNocturno;
        //Suma total
        $sumaHorasRecargos = $sumaHorasExtras + $sumaRecargos;
        $sumaTotal = $sumaHorasRecargos - $permisos;

        var_dump($sumaTotal);


        return view('admin.horas_extras.index', compact(
            'permisos',
            'extraDiurnaOrdinaria',
            'extraNocturnaOrdinaria',
            'extraDiurnaFestiva',
            'extraNocturnaFestiva',
            'recargoNocturno',
            'recargoDiurnoFestivo',
            'recargoNocturnoFestivo',
            'recargoOrdinarioFestivoNocturno',
            'sumaHorasExtras',
            'sumaRecargos',
            'sumaHorasRecargos',
            'sumaTotal',
        ));
    }

    // Otros métodos...


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
    public function show(HoraExtraDetalle $horaExtraDetalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HoraExtraDetalle $horaExtraDetalle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HoraExtraDetalle $horaExtraDetalle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HoraExtraDetalle $horaExtraDetalle)
    {
        //
    }
}