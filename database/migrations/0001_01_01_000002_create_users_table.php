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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tipo_doc');
            $table->string('documento')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //asignar foranea con Empresa, eliminar de manera cascada
            $table->unsignedBigInteger('empresa_id');
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            //asignar foranea con Cargos, sin eliminar en cascada
            $table->foreignId('cargo_id')->constrained('cargos');
            //fin de foranea
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'Admin',
            'tipo_doc' => 'Cédula de ciudadanía',
            'documento' => '123456789',
            'email' => 'pruebas@pruebas.com',
            'password' => Hash::make('password'),
            'empresa_id' => 1, // ID de la empresa en la tabla empresas
            'cargo_id' => 1, // ID del cargo en la tabla cargos
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('documento')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
