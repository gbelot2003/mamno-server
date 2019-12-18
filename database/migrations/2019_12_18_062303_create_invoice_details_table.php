<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->bigIncrements('invoiceDetailId');
            $table->bigInteger('invoiceId');
            $table->bigInteger('productId');
            $table->bigInteger('productPriceId');
            $table->decimal('productPrice');
            $table->decimal('productQuantity');
            $table->decimal('productDiscount');
            $table->decimal('productTotal');
            $table->boolean('detailStatus')->default(true);
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
        Schema::dropIfExists('invoice_details');
    }
}
