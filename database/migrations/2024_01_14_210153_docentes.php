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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_curri')->unsigned();
            $table->char('nombre_doc',50);
            $table->char('apellido_doc',50);
            $table->char('cedula_doc',10);
            $table->date('fecha_nac_doc');
            $table->char('direccion_doc',150);
            $table->char('correo_doc',50);
            $table->char('telefono_doc',10);
            $table->timestamps();
            $table->foreign('id_curri')->references('id')->on('curriculums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('docentes');
    }
};
