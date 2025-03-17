<?php

namespace App\Http\Controllers;

use App\Models\HoraExtraGeneral;
use App\Models\HoraExtraDetalle;
use Illuminate\Http\Request;

class HoraExtraDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horasExtrasConDetalles = HoraExtraDetalle::obtenerHorasExtrasConDetalles();
        return view('admin.horas_extras.index', compact('horasExtrasConDetalles', ''));
    }

    public function create()
    {
        return view('admin.horas_extras.create');
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
    public function show(HoraExtraGeneral $horaExtraGeneral)
    {
        $horasExtrasConDetalles = HoraExtraGeneral::obtenerHorasExtrasConDetalles();
        $horaExtraGeneral->load('detalles');
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
        return redirect()->route('admin.horas_extras_gen.index');
    }
}