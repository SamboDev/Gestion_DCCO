<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentesMaterias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_doc')->unsigned();
            $table->bigInteger('id_mat')->unsigned();
            $table->timestamps();
            $table->foreign('id_doc')->references('id')->on('docentes');
            $table->foreign('id_mat')->references('id')->on('materias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes_materias');
    }
};
