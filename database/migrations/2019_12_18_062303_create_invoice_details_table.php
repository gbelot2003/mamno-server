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

        Schema::create('invoice_masters', function (Blueprint $table) {
            $table->increments('invoiceId');
            $table->date('invoiceDate');
            $table->integer('invoiceClient');
            $table->integer('invoiceSARConfigId');
            $table->string('invoiceRTN');
            $table->string('invoiceCAI');
            $table->string('invoiceNumber');
            $table->boolean('invoiceStatus')->default(true); // Cambie este por boolean
            $table->string('invoiceExemptNumber');
            $table->decimal('invoiceExemptAmount')->default(0,00);
            $table->string('invoiceConstancyExeptedRecords');
            $table->decimal('invoiceExoneratedAmount')->default(0,00);
            $table->string('invoiceSAGNumber');
            $table->decimal('invoiceAliquot')->default(0,00);
            $table->decimal('invoiceTaxedAmount15')->default(0,00);
            $table->decimal('invoiceTaxedAmount18')->default(0,00);
            $table->decimal('invoiceSalesTax15')->default(0,00);
            $table->decimal('invoiceSalesTax18')->default(0,00);
            $table->decimal('invoiceSubtotal')->default(0,00);
            $table->decimal('invoiceTotal')->default(0,00);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('invoice_details', function (Blueprint $table) {
            $table->increments('invoiceDetailId');
            $table->integer('invoiceId')->unsigned()->index();
            $table->integer('productId')->unsigned()->index();
            $table->integer('productPriceId')->unsigned()->index();
            $table->decimal('productPrice');
            $table->decimal('productQuantity');
            $table->decimal('productDiscount');
            $table->decimal('productTotal');
            $table->string('detailStatus')->default(true);
            $table->timestamps();

            $table->foreign('invoiceId')->references('invoiceId')->on('invoice_masters'); 
            $table->foreign('productId')->references('productId')->on('products');
            $table->foreign('productPriceId')->references('productPriceId')->on('product_prices');
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
        Schema::dropIfExists('invoice_masters');
    }
}
