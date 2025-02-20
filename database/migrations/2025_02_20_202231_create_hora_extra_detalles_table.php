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
        Schema::create('horas_extras_det', function (Blueprint $table) {
            $table->id();
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