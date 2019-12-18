<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_infos', function (Blueprint $table) {
            $table->bigIncrements('buyerId');
            $table->integer('userId');
            $table->string('buyerIdentity');
            $table->string('buyerIdentityImage');
            $table->string('buyerRTN');
            $table->string('buyerRTNImage');
            $table->string('buyerStatus')->default('true');
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
        Schema::dropIfExists('buyer_infos');
    }
}
