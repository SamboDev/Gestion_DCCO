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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->char('nombre_doc', 50);
            $table->char('apellido_doc', 50);
            $table->char('cedula_doc', 10);
            $table->date('fecha_nac_doc');
            $table->char('direccion_doc', 150);
            $table->char('correo_doc', 50);
            $table->char('telefono_doc', 10);
            $table->string('curriculum_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
