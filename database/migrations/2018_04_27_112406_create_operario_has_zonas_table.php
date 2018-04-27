<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperarioHasZonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operario_has_zonas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('zona_id')->unsigned();
            $table->integer('persona_id')->unsigned()->unique();
            
            $table->foreign('zona_id')->references('id')->on('zonas');
            $table->foreign('persona_id')->references('id')->on('personas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operario_has_zonas');
    }
}
