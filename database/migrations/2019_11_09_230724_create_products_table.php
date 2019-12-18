<?php

use App\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('productId');
            $table->string('productName');
            $table->bigInteger('productClassId')->unsigned();
            $table->bigInteger('productTypeId')->unsigned();
            $table->bigInteger('productQualityId')->unsigned();
            $table->string('productStatus')->default(Product::PRODUCT_ACTIVE);
            $table->timestamps();

            $table->foreign('productClassId')->references('productClassId')->on('product_classes');
            $table->foreign('productTypeId')->references('productTypeId')->on('product_types');
            $table->foreign('productQualityId')->references('productQualityId')->on('product_qualities');
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_prices');
        Schema::dropIfExists('products');
    }
}
