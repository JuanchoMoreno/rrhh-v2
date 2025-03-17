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
        Schema::create('horas_extras_general', function (Blueprint $table) {
            $table->id();
            $table->string('mes_reportado');
            $table->string('proyecto_asociado');
            $table->string('actividad');
            $table->string('estado');
            $table->string('detalle_estado');
            // Campos foraneos
            $table->foreignId('depart_id')->constrained('departamentos');
            $table->foreignId('clases_id')->constrained('clases');
            $table->foreignId('ccostos_id')->constrained('ccostos');
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('aprobador_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hora_extra_generals');
    }
};