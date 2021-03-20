<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vuelo_id');
            $table->unsignedBigInteger('cabina_id');
            $table->decimal('tarifa');
            $table->integer('asiento');
            $table->timestamps();

            //fk
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('vuelo_id')->references('id')->on('vuelos');
            $table->foreign('cabina_id')->references('id')->on('cabinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
