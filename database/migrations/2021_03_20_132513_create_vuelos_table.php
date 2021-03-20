<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->string('nro_vuelo');
            $table->unsignedBigInteger('origen_id');
            $table->unsignedBigInteger('destino_id');
            $table->dateTime('fecha_salida');
            $table->dateTime('fecha_llegada');
            $table->unsignedBigInteger('estado_id');
            $table->timestamps();
            //fk
            $table->foreign('origen_id')->references('id')->on('lugars');
            $table->foreign('destino_id')->references('id')->on('lugars');
            $table->foreign('estado_id')->references('id')->on('estados');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vuelos');
    }
}
