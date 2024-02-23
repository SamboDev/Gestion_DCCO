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
        Schema::create('nrcs', function (Blueprint $table) {
            $table->id();
            $table->char('codigo_nrc',10);
            $table->foreignId('id_mat')->constrained('materias')->cascadeOnDelete();
            $table->foreignId('id_sem')->constrained('semestres')->cascadeOnDelete();
            $table->foreignId('id_car')->constrained('carreras')->cascadeOnDelete();
            $table->foreignId('id_dm')->constrained('docente_materias')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nrcs');
    }
};
