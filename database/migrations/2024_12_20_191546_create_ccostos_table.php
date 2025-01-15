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
        Schema::create('ccostos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('clases_id');
            $table->foreign('clases_id')->references('id')->on('clases')->onDelete('cascade');
            $table->timestamps();
        });

        // Insertar registros iniciales
            // Datos de Administración(Administración)
        DB::table('ccostos')->insert([
            ['clases_id' => 1, 'name' => 'Administración'],
            ['clases_id' => 2, 'name' => 'Calidad'],
            ['clases_id' => 3, 'name' => 'Gastos gerenciales'],
            ['clases_id' => 4, 'name' => 'Tecnología y desarrollo'],
            ['clases_id' => 5, 'name' => 'Seguridad y salud en el trabajo'],
            ['clases_id' => 6, 'name' => 'Servicio al cliente'],
            ['clases_id' => 7, 'name' => 'Innovación'],
            // Datos de Administración(Comercial) 
            ['clases_id' => 8, 'name' => 'Comercial administración'],
            ['clases_id' => 8, 'name' => 'Comercial mercadeo'],
            // Datos de Ascensores y escaleras(Comercial) 
            ['clases_id' => 9, 'name' => 'Comercial ascensores y escaleras Barranquilla'],
            ['clases_id' => 9, 'name' => 'Comercial ascensores y escaleras Bogotá'],
            ['clases_id' => 9, 'name' => 'Comercial ascensores y escaleras Bucaramanga'],
            ['clases_id' => 9, 'name' => 'Comercial ascensores y escaleras Cali'],
            ['clases_id' => 9, 'name' => 'Comercial ascensores y escaleras Cartagena'],
            ['clases_id' => 9, 'name' => 'Comercial ascensores y escaleras Ibagué'],
            ['clases_id' => 9, 'name' => 'Comercial ascensores y escaleras Medellín'],
            ['clases_id' => 9, 'name' => 'Comercial ascensores y escaleras Pereira'],
            // Datos de Agua,energia,volumetria metalico, vidrio y macromedidores(Comercial) 
            ['clases_id' => 10, 'name' => 'Comercial LMA'],
            ['clases_id' => 11, 'name' => 'Comercial LME'],
            ['clases_id' => 12, 'name' => 'Comercial LVM'],
            ['clases_id' => 13, 'name' => 'Comercial LVV'],
            ['clases_id' => 14, 'name' => 'Macros'],
            // Datos de Producto(Comercial) 
            ['clases_id' => 15, 'name' => 'Comercial producto certificación sello de bioseguridad'],
            ['clases_id' => 15, 'name' => 'Comercial producto juguetes'],
            ['clases_id' => 15, 'name' => 'Comercial producto RETIE-RETILAP'],
            ['clases_id' => 15, 'name' => 'Comercial producto Vajillas'],
            // Datos de RETIE(Comercial) 
            ['clases_id' => 16, 'name' => 'Comercial RETIE Barranquilla'],
            ['clases_id' => 16, 'name' => 'Comercial RETIE Bogotá'],
            ['clases_id' => 16, 'name' => 'Comercial RETIE Bucaramanga'],
            ['clases_id' => 16, 'name' => 'Comercial RETIE Cali'],
            ['clases_id' => 16, 'name' => 'Comercial RETIE Cartagena'],
            ['clases_id' => 16, 'name' => 'Comercial RETIE Ibagué'],
            ['clases_id' => 16, 'name' => 'Comercial RETIE Medellín'],
            ['clases_id' => 16, 'name' => 'Comercial RETIE Pereira'],
            ['clases_id' => 16, 'name' => 'Comercial RETIE Convenios'],
            // Datos de RETILAP(Comercial) 
            ['clases_id' => 17, 'name' => 'Comercial RETILAP Barranquilla'],
            ['clases_id' => 17, 'name' => 'Comercial RETILAP Bogotá'],
            ['clases_id' => 17, 'name' => 'Comercial RETILAP Bucaramanga'],
            ['clases_id' => 17, 'name' => 'Comercial RETILAP Cali'],
            ['clases_id' => 17, 'name' => 'Comercial RETILAP Cartagena'],
            ['clases_id' => 17, 'name' => 'Comercial RETILAP Ibagué'],
            ['clases_id' => 17, 'name' => 'Comercial RETILAP Medellín'],
            ['clases_id' => 17, 'name' => 'Comercial RETILAP Pereira'],
            ['clases_id' => 17, 'name' => 'Comercial RETILAP Convenios'],
            // Datos de RITEL,variables electricas,comercial sistemas de gestion,capacitación(Comercial)
            ['clases_id' => 18, 'name' => 'Comercial RITEL'],
            ['clases_id' => 19, 'name' => 'Comercial variables eléctricas'],
            ['clases_id' => 20, 'name' => 'Comercial administración: comercial sistemas de gestión'],
            ['clases_id' => 21, 'name' => 'Comercial capacitaciones'],
            // Datos de Macromedidores (Técnico Calibración)
            ['clases_id' => 22, 'name' => 'Calibración laboratorio'],
            ['clases_id' => 22, 'name' => 'Calibración sitio'],
            ['clases_id' => 22, 'name' => 'Calibración y medición de fluidos'],
            ['clases_id' => 22, 'name' => 'Canaletas parshal y aguas residuales'],
            ['clases_id' => 22, 'name' => 'Subcontratados LMAM'],
            // Datos de Agua (Técnico Calibración)
            ['clases_id' => 23, 'name' => 'Agua nuevos'],
            ['clases_id' => 23, 'name' => 'Agua usados'],
            ['clases_id' => 23, 'name' => 'Agua otros'],
            // Datos de Variables eléctricas (Técnico Calibración)
            ['clases_id' => 24, 'name' => 'Variables eléctricas'],
            // Datos de Volumetría metalico (Técnico Calibración)
            ['clases_id' => 25, 'name' => 'Laboratorios (Tanques y Rotametros)'],
            ['clases_id' => 25, 'name' => 'Recipientes metalicos'],
            ['clases_id' => 25, 'name' => 'Serafines'],
            ['clases_id' => 25, 'name' => 'Subcontratados LVM'],
            // Datos de Energía (Técnico Calibración)
            ['clases_id' => 26, 'name' => 'Energía nuevos'],
            ['clases_id' => 26, 'name' => 'Energía usados'],
            ['clases_id' => 26, 'name' => 'Energía otros'],
            // Datos de Volumetría vidrio (Técnico Calibración)
            ['clases_id' => 27, 'name' => 'Recipientes vidrio'],
            ['clases_id' => 27, 'name' => 'Material volumétrico'],
            ['clases_id' => 27, 'name' => 'Subcontratados LVV'],
            // Datos de Sistemas de gestión (Técnico certificación)
            ['clases_id' => 28, 'name' => 'Sistemas de gestión Colombia'],
            ['clases_id' => 28, 'name' => 'Sistemas de gestión Ecuador'],
            ['clases_id' => 28, 'name' => 'Sistemas de gestión Panamá'],
            ['clases_id' => 28, 'name' => 'Sistemas de gestión Perú'],
            // Datos de Producto (Técnico certificación)
            ['clases_id' => 29, 'name' => 'Vajillas pruebas'],
            ['clases_id' => 29, 'name' => 'Vajillas certificación'],
            ['clases_id' => 29, 'name' => 'RETILAP pruebas'],
            ['clases_id' => 29, 'name' => 'RETILAP certificación'],
            ['clases_id' => 29, 'name' => 'RETIE pruebas'],
            ['clases_id' => 29, 'name' => 'RETIE certificación'],
            ['clases_id' => 29, 'name' => 'Otros pruebas'],
            ['clases_id' => 29, 'name' => 'Otros certificación'],
            ['clases_id' => 29, 'name' => 'Juguetes pruebas'],
            ['clases_id' => 29, 'name' => 'Juguetes certificación'],
            ['clases_id' => 29, 'name' => 'Certificación sello de bioseguridad'],
            ['clases_id' => 29, 'name' => 'Certificación sello de bioseguridad pruebas'],
            ['clases_id' => 29, 'name' => 'Certificación cascos'],
            ['clases_id' => 29, 'name' => 'Cascos pruebas'],
            ['clases_id' => 29, 'name' => 'Carrocería'],
            // Datos de Ascensores y escaleras (Técnico inspección)
            ['clases_id' => 30, 'name' => 'Ascensores y escaleras Barranquilla'],
            ['clases_id' => 30, 'name' => 'Ascensores y escaleras Bogotá'],
            ['clases_id' => 30, 'name' => 'Ascensores y escaleras Bucaramanga'],
            ['clases_id' => 30, 'name' => 'Ascensores y escaleras Cali'],
            ['clases_id' => 30, 'name' => 'Ascensores y escaleras Cartagena'],
            ['clases_id' => 30, 'name' => 'Ascensores y escaleras Ibagué'],
            ['clases_id' => 30, 'name' => 'Ascensores y escaleras Medellín'],
            ['clases_id' => 30, 'name' => 'Ascensores y escaleras Pereira'],
            ['clases_id' => 30, 'name' => 'Ascensores y escaleras convenios'],
            // Datos de Medición (Técnico inspección)
            ['clases_id' => 32, 'name' => 'Medición Barranquilla'],
            ['clases_id' => 31, 'name' => 'Medición Bogotá'],
            ['clases_id' => 31, 'name' => 'Medición Bucaramanga'],
            ['clases_id' => 31, 'name' => 'Medición Cali'],
            ['clases_id' => 31, 'name' => 'Medición Cartagena'],
            ['clases_id' => 31, 'name' => 'Medición Ibagué'],
            ['clases_id' => 31, 'name' => 'Medición Medellín'],
            ['clases_id' => 31, 'name' => 'Medición Pereira'],
            ['clases_id' => 31, 'name' => 'Medición convenios'],
            // Datos de RETIE (Técnico inspección)
            ['clases_id' => 32, 'name' => 'RETIE Barranquilla'],
            ['clases_id' => 32, 'name' => 'RETIE Bogotá'],
            ['clases_id' => 32, 'name' => 'RETIE Bucaramanga'],
            ['clases_id' => 32, 'name' => 'RETIE Cali'],
            ['clases_id' => 32, 'name' => 'RETIE Cartagena'],
            ['clases_id' => 32, 'name' => 'RETIE Ibagué'],
            ['clases_id' => 32, 'name' => 'RETIE Medellín'],
            ['clases_id' => 32, 'name' => 'RETIE Pereira'],
            ['clases_id' => 32, 'name' => 'RETIE Montería'],
            ['clases_id' => 32, 'name' => 'RETIE Valledupar'],
            ['clases_id' => 32, 'name' => 'RETIE Villavicencio'],
            ['clases_id' => 32, 'name' => 'RETIE convenios'],
            ['clases_id' => 32, 'name' => 'Generación y transmisión'],
            ['clases_id' => 32, 'name' => 'Certificación de competencias 17024'],
            ['clases_id' => 32, 'name' => 'Técnico administración'],
            // Datos de RETILAP (Técnico inspección)
            ['clases_id' => 33, 'name' => 'RETILAP Barranquilla'],
            ['clases_id' => 33, 'name' => 'RETILAP Bogotá'],
            ['clases_id' => 33, 'name' => 'RETILAP Bucaramanga'],
            ['clases_id' => 33, 'name' => 'RETILAP Cali'],
            ['clases_id' => 33, 'name' => 'RETILAP Cartagena'],
            ['clases_id' => 33, 'name' => 'RETILAP Ibagué'],
            ['clases_id' => 33, 'name' => 'RETILAP Medellín'],
            ['clases_id' => 33, 'name' => 'RETILAP Pereira'],
            ['clases_id' => 33, 'name' => 'RETILAP Montería'],
            ['clases_id' => 33, 'name' => 'RETILAP Valledupar'],
            ['clases_id' => 33, 'name' => 'RETILAP Villavicencio'],
            ['clases_id' => 33, 'name' => 'RETILAP convenios'],
            // Datos de RITEL (Técnico inspección)
            ['clases_id' => 34, 'name' => 'RITEL Barranquilla'],
            ['clases_id' => 34, 'name' => 'RITEL Bogotá'],
            ['clases_id' => 34, 'name' => 'RITEL Bucaramanga'],
            ['clases_id' => 34, 'name' => 'RITEL Cali'],
            ['clases_id' => 34, 'name' => 'RITEL Cartagena'],
            ['clases_id' => 34, 'name' => 'RITEL Ibagué'],
            ['clases_id' => 34, 'name' => 'RITEL Medellín'],
            ['clases_id' => 34, 'name' => 'RITEL Pereira'],
            ['clases_id' => 34, 'name' => 'RITEL Montería'],
            ['clases_id' => 34, 'name' => 'RITEL Valledupar'],
            ['clases_id' => 34, 'name' => 'RITEL Villavicencio'],
            ['clases_id' => 34, 'name' => 'RITEL convenios'],
            // Datos de Servicios complementarios (Técnico inspección)
            ['clases_id' => 35, 'name' => 'Fronteras comerciales'],
            ['clases_id' => 35, 'name' => 'Energía reactiva (CREG 015)'],
            // Datos de Riesgo eléctrico (Técnico inspección)
            ['clases_id' => 36, 'name' => 'Riesgo eléctrico'],
            // Datos de Capacitación (Técnico otros)
            ['clases_id' => 37, 'name' => 'Capacitación Bogotá'],
            ['clases_id' => 37, 'name' => 'Capacitación Cali'],
            ['clases_id' => 37, 'name' => 'Capacitación Medellín'],
            ['clases_id' => 37, 'name' => 'Capacitación Pereira'],
            ['clases_id' => 37, 'name' => 'Capacitación Barranquilla'],
            ['clases_id' => 37, 'name' => 'Capacitación Bucaramanga'],
            ['clases_id' => 37, 'name' => 'Capacitación Cartagena'],
            ['clases_id' => 37, 'name' => 'Capacitación Ibagué'],
            ['clases_id' => 37, 'name' => 'Capacitación convenios'],
            // Datos de Innovación (Técnico otros)
            ['clases_id' => 38, 'name' => 'Certificado prod-insp-transp vertical'],
            ['clases_id' => 38, 'name' => 'Centro de control RETIE'],
            ['clases_id' => 38, 'name' => 'Proyecto RETILAP'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ccosto');
    }
};
