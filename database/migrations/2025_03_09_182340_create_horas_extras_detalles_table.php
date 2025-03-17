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
        Schema::create('horas_extras_detalles', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_reporte');
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
            $table->float('suma_horas_extras');
            $table->float('suma_recargos');
            $table->float('total_hrex_recargos');
            $table->float('total_solicitud');
            $table->foreignId('horas_extras_general_id')->constrained('horas_extras_general')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hora_extra_detalles');
    }
};