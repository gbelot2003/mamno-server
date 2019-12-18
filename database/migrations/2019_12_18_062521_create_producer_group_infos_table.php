<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducerGroupInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producer_group_infos', function (Blueprint $table) {
            $table->bigIncrements('producerGroupId');
            $table->string('producerGroupName');
            $table->text('producerGroupDoc'); // cambie este a text
            $table->boolean('producerGroupStatus')->default(true);
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
        Schema::dropIfExists('producer_group_infos');
    }
}
