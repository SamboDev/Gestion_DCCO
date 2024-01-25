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
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_are')->constrained('area_conocimientos')->cascadeOnDelete();
            $table->char('codigo_mat',10);
            $table->char('nombre_mat',50);
            $table->text('requisito_doc_mat');
            $table->integer('horas_trabAuto_mat');
            $table->integer('horas_doc_mat');
            $table->integer('horas_invest_mat');
            $table->integer('horas_total');
            $table->text('descripcion_mat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
