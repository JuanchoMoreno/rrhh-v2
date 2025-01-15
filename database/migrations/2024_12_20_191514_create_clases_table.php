<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clases', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('depart_id');
            $table->foreign('depart_id')->references('id')->on('departamentos')->onDelete('cascade');
            $table->timestamps();
        });
         // Insertar registros iniciales
            // Datos de Administración
         DB::table('clases')->insert([
            ['depart_id' => 1, 'name' => 'Administración'],
            ['depart_id' => 1, 'name' => 'Calidad'],
            ['depart_id' => 1, 'name' => 'Gastos gerenciales'],
            ['depart_id' => 1, 'name' => 'Tecnología'],
            ['depart_id' => 1, 'name' => 'SST'],
            ['depart_id' => 1, 'name' => 'Servicio al cliente'],
            ['depart_id' => 1, 'name' => 'Innovación'],
            // Datos de Comercial  
            ['depart_id' => 2, 'name' => 'Administración'],
            ['depart_id' => 2, 'name' => 'Ascensores y escaleras'],
            ['depart_id' => 2, 'name' => 'Agua'],
            ['depart_id' => 2, 'name' => 'Energía'],
            ['depart_id' => 2, 'name' => 'Volumetría metalico'],
            ['depart_id' => 2, 'name' => 'Volumetría vidrio'],
            ['depart_id' => 2, 'name' => 'Macromedidores'],
            ['depart_id' => 2, 'name' => 'Producto'],
            ['depart_id' => 2, 'name' => 'RETIE'],
            ['depart_id' => 2, 'name' => 'RETILAP'],
            ['depart_id' => 2, 'name' => 'RITEL'],
            ['depart_id' => 2, 'name' => 'Variables eléctricas'],
            ['depart_id' => 2, 'name' => 'Comercial sistemas de gestión'],
            ['depart_id' => 2, 'name' => 'Capacitación'],
            // Datos de Técnico Calibración 
            ['depart_id' => 3, 'name' => 'Macromedidores'],
            ['depart_id' => 3, 'name' => 'Volumetría vidrio'],
            ['depart_id' => 3, 'name' => 'Agua'],
            ['depart_id' => 3, 'name' => 'Variables eléctricas'],
            ['depart_id' => 3, 'name' => 'Volumetría metalico'],
            ['depart_id' => 3, 'name' => 'Energía'],
            ['depart_id' => 3, 'name' => 'Macromedidores'],
            // Datos de Técnico Certificación
            ['depart_id' => 4, 'name' => 'Sistemas de gestión'],
            ['depart_id' => 4, 'name' => 'Producto'],
             // Datos de Técnico Inspección
            ['depart_id' => 5, 'name' => 'Ascensores y escaleras'],
            ['depart_id' => 5, 'name' => 'Medición'],
            ['depart_id' => 5, 'name' => 'RETIE'],
            ['depart_id' => 5, 'name' => 'RETILAP'],
            ['depart_id' => 5, 'name' => 'RITEL'],
            ['depart_id' => 5, 'name' => 'Servicios complementarios'],
            ['depart_id' => 5, 'name' => 'Riesgo eléctrico'],
            // Datos de Técnico Otros
            ['depart_id' => 6, 'name' => 'Capacitación'],
            ['depart_id' => 6, 'name' => 'Innovación'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};
