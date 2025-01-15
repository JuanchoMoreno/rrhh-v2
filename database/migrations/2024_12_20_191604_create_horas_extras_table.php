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
        Schema::create('horas_extras', function (Blueprint $table) {
            $table->id();
            //Campos de información general
            $table->string('departamento');
            $table->string('clase');
            $table->string('ccosto');
            $table->string('mes_reportado');
            $table->string('proyecto_asociado');
            $table->date('fecha');
            $table->string('actividad');
            $table->string('estado');
            //Campos de permisos
            $table->float('permisos');
            //Campos de horas extras
            $table->float('ex_diur_ord');
            $table->float('ex_noct_ord');
            $table->float('ex_diur_festdomin');
            $table->float('ex_noct_festdomin');
            //Campos de recargos
            $table->float('recargo_noct');
            $table->float('recargo_diur_fest');
            $table->float('recargo_noct_fest');
            $table->float('recargo_ord_fest_noct');
            //Constraints
            $table->foreignId('usuario_id')->constrained('users');
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
        Schema::dropIfExists('horas_extras');
    }
};
