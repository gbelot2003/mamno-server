<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producer_infos', function (Blueprint $table) {
            $table->bigIncrements('producerID');
            $table->bigInteger('userID')->unsigned()->index();
            $table->string('producerType')->default('Individual');
            $table->bigInteger('producerGroupId')->unsigned()->index();
            $table->string('producerIdentity');
            $table->string('producerRTN');
            $table->string('producerAgent');
            $table->text('producerAgentDoc'); // Cambie esto a texto
            $table->string('producerBankAccount'); 
            $table->boolean('producerStatus')->default(true); // Cambie esto a bool
            $table->softDeletes();
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
        Schema::dropIfExists('producer_infos');
    }
}
