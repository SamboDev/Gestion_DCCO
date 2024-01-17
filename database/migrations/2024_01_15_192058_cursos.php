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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_mat')->unsigned();
            $table->bigInteger('id_sem')->unsigned();
            $table->bigInteger('id_car')->unsigned();
            $table->bigInteger('id_dm')->unsigned();
            $table->timestamps();
            $table->foreign('id_mat')->references('id')->on('materias');
            $table->foreign('id_sem')->references('id')->on('semestres');
            $table->foreign('id_car')->references('id')->on('carreras');
            $table->foreign('id_dm')->references('id')->on('docentesMaterias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};