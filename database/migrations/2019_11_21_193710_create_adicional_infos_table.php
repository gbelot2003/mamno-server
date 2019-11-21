<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdicionalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicional_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('identidad');
            $table->string('rtn')->nullable();
            $table->string('rtn_image')->nullable();
            $table->integer('grupo_id')->nullable();
            $table->string('cuanta_image')->nullable();
            $table->text('descripcion_vehiculos')->nullable();
            $table->string('contrato')->nullable();
            $table->dateTime('fvencimiento')->nullable();
            $table->dateTime('fautorizacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adicional_infos');
    }
}
