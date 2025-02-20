<?php

namespace App\Http\Controllers;

use App\Models\HoraExtraGeneral;
use Illuminate\Http\Request;

class HoraExtraGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.horas_extras_GenDet.index");
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
    public function show(HoraExtraGeneral $horaExtraGeneral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HoraExtraGeneral $horaExtraGeneral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HoraExtraGeneral $horaExtraGeneral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HoraExtraGeneral $horaExtraGeneral)
    {
        //
    }
}