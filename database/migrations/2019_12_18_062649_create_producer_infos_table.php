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
            $table->integer('userID')->unsigned()->index();
            $table->string('producerType')->default('Individual');
            $table->integer('producerGroupId')->unsigned()->index();
            $table->string('producerIdentity');
            $table->string('producerRTN');
            $table->string('producerAgent');
            $table->text('producerAgentDoc'); // Cambie esto a texto
            $table->string('producerBankAccount'); 
            $table->string('producerStatus')->default(true); // Cambie esto a bool
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('producerGroupId')->references('producerGroupId')->on('producer_group_infos'); 

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
