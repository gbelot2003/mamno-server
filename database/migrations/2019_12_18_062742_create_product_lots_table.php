<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductLotsTable extends Migration
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_lots');
    }
}
