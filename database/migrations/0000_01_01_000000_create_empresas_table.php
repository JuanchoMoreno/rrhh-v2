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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('pais',50);
            $table->string('nombre_empresa');
            $table->string('tipo_empresa');
            $table->string('nit')->unique();//unique campo que no se puede repetir
            $table->integer('cod_nit');
            $table->string('telefono');
            $table->string('correo')->unique();
            $table->integer('cantidad_impuesto');
            $table->string('nombre_impuesto');
            $table->string('moneda');
            $table->string('direccion')->unique();
            $table->string('ciudad');
            $table->string('departamento');
            $table->string('codigo_postal');
            $table->text('logo');
            $table->timestamps();
        });

          // Insertar un registro de prueba
          DB::table('empresas')->insert([
            'pais' => 48, // ID del país en la tabla countries
            'departamento' => 784, // ID del estado en la tabla states
            'ciudad' => 19711, // ID de la ciudad en la tabla cities
            'nombre_empresa' => 'Empresa de Prueba S.A.',
            'tipo_empresa' => 'Privada',
            'nit' => '123456789',
            'cod_nit' => 1,
            'telefono' => '1234567890',
            'correo' => 'admin@admin.com',
            'cantidad_impuesto' => 19,
            'nombre_impuesto' => 'IVA',
            'moneda' => 'COP',
            'direccion' => 'Calle 123 #45-67',
            'codigo_postal' => '57',
            'logo' => 'logo.png',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
