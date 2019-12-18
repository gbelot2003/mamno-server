<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_masters', function (Blueprint $table) {
            $table->bigIncrements('invoiceId');
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_masters');
    }
}


/**

  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
 */