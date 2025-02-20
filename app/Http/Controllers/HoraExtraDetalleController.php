<?php

namespace App\Http\Controllers;

use App\Models\HoraExtraDetalle;
use Illuminate\Http\Request;
use App\Models\HoraExtraGenDet;
use App\Models\User;

class HoraExtraDetalleController extends Controller
{
    public function index()
    {
        $horas_extras = HoraExtraGenDet::with('usuario', 'centroCosto')->get();
        $aprobadores = User::where('role', 'aprobador')->get();

        return view('admin.horas_extras.index', compact('horas_extras', 'aprobadores'));
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