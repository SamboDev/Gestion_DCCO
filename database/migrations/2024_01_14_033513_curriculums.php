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
        Schema::create('curriculums', function (Blueprint $table) {
            $table->id();
            $table->char('institucion_cur', 50);
            $table->date('fecha_gra_cur');
            $table->char('titulo_cur', 75);
            $table->char('interes_inv_cur', 75);
            $table->char('premios_cur', 75);
            $table->char('cursos_cur', 75);
            $table->char('otras_responsabilidades_cur', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curriculums');
    }
};
