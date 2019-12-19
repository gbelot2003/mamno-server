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

        Schema::create('product_lots', function (Blueprint $table) {
            $table->bigIncrements('productLotId');
            $table->bigInteger('productLotProductorId')->default(1);
            $table->bigInteger('productPriceId')->default(1);
            $table->float('productLotQuantityInventory')->unsigned();
            $table->float('productLotQuantity')->unsigned();
            $table->date('productLotAvailableDate');
            $table->date('productLotExpirationDate');
            $table->string('productLotCultivatedArea');
            $table->string('productLotCultivatedAreaAddress');
            $table->float('productLotCultivatedPerformance');
            $table->string('productLotProductionMode');
            $table->string('productLotSaleType');
            $table->float('productLotSalePrice');
            $table->text('productLotPickupAddress');
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('product_mass_measurements', function (Blueprint $table){
            $table->bigIncrements('productMassMeasurementId')->unsigned()->index();
            $table->string('productMassMeasurement');
            $table->string('productMassMeasurementStatus');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_prices', function (Blueprint $table) {
            $table->increments('productPriceId');
            $table->integer('productId')->unsigned()->index();
            $table->integer('productMassMeasurementId')->unsigned()->index();
            $table->integer('productQualityId')->unsigned()->index();
            $table->float('productLowPrice')->unsigned();
            $table->float('productAvgPrice')->unsigned();
            $table->float('productHighPrice')->unsigned();
            $table->float('productPriceStatus')->unsigned();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('productMassMeasurementId')->references('productMassMeasurementId')->on('product_mass_measurements');

        });

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
        Schema::dropIfExists('product_prices');
        Schema::dropIfExists('product_mass_measurements');
        Schema::dropIfExists('product_lots');
    }
}
