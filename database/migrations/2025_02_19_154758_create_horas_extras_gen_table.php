<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('horas_extras_gen', function (Blueprint $table) {
            $table->id();
            $table->string('departamento');
            $table->string('clase');
            $table->string('ccosto');
            $table->string('mes_reportado');
            $table->string('proyecto_asociado');
            $table->date('fecha');
            $table->string('actividad');
            $table->string('estado');
            // Campos foraneos
            $table->foreignId('depart_id')->constrained('departamentos');
            $table->foreignId('clases_id')->constrained('clases');
            $table->foreignId('ccostos_id')->constrained('ccostos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horas_extras_gen');
    }
};