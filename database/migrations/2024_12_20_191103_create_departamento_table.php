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
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
         // Insertar registros iniciales
         DB::table('departamentos')->insert([
            ['name' => 'Administración'],
            ['name' => 'Comercial'],
            ['name' => 'Técnico Calibración'],
            ['name' => 'Técnico Certificación'],
            ['name' => 'Técnico Inspección'],
            ['name' => 'Técnico Otros'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};
