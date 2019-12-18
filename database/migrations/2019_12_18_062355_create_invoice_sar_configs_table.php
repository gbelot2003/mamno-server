<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceSarConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_sar_configs', function (Blueprint $table) {
            $table->bigIncrements('SARConfigId');
            $table->string('establishment')->default(001);
            $table->string('emissionPoint')->default(001);
            $table->string('documentType')->default(01);
            $table->integer('initialValue');
            $table->integer('finalValue');
            $table->dateTime('validationDate');
            $table->boolean('configStatus')->default(true); // cambie este a boolean
            $table->dateTime('warningDate');
            $table->integer('warningNumber');
            $table->string('configCAI');
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
        Schema::dropIfExists('invoice_sar_configs');
    }
}
