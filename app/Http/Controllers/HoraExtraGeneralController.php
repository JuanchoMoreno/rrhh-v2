<?php

namespace App\Http\Controllers;
use App\Models\HoraExtraGeneral;
use Illuminate\Http\Request;

class HoraExtraGeneralController
{

    public function index()
    {
        return view("admin.horas_extras.index");
    }


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
    public function show(HoraExtraGeneral $HoraExtraGeneral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HoraExtraGeneral $HoraExtraGeneral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HoraExtraGeneral $HoraExtraGeneral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HoraExtraGeneral $HoraExtraGeneral)
    {
        //
    }
}