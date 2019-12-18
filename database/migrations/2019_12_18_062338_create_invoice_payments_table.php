<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_payments', function (Blueprint $table) {
            $table->bigIncrements('invoicePaymentsId');
            $table->bigInteger('invoiceID');
            $table->integer('paymentMethodId');
            $table->decimal('paymentAmount');
            $table->string('paymentBankAccount');
            $table->string('paymentBankName');
            $table->string('paymentCardNumber');
            $table->string('paymentTransactionNumber');
            $table->boolean('paymentStatus')->default(true);
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
        Schema::dropIfExists('invoice_payments');
    }
}
