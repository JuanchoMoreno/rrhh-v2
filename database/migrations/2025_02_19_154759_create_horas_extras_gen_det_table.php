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
        Schema::create('horas_extras_gen_det', function (Blueprint $table) {
            $table->id();
            $table->foreignId('horas_extras_gen_id')->constrained('horas_extras_gen')->onDelete('cascade');
            $table->foreignId('horas_extras_det_id')->constrained('horas_extras_det')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horas_extras_gen_det');
    }
};