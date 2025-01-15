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
        Schema::create('tipodocs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
         // Insertar registros iniciales
         DB::table('tipodocs')->insert([
            ['name' => 'No asignado'],
            ['name' => 'Cédula de ciudadanía'],
            ['name' => 'Cédula de Extranjería'],
            ['name' => 'Pasaporte'],
            ['name' => 'Tarjeta de Identidad'],
            ['name' => 'Registro Civil'],
            ['name' => 'NIT'],
            ['name' => 'RUT'],
            ['name' => 'PEP'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipodocs');
    }
};
