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

        Schema::create('payment_methods', function (Blueprint $table) {
            $table->bigIncrements('paymentMethodId');
            $table->string('paymentMethod');
            $table->text('paymentMethodDescription');
            $table->string('paymentMethodStatus');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('invoice_payments', function (Blueprint $table) {
            $table->increments('invoicePaymentsId');
            $table->integer('invoiceID');
            $table->integer('paymentMethodId');
            $table->decimal('paymentAmount');
            $table->string('paymentBankAccount');
            $table->string('paymentBankName');
            $table->string('paymentCardNumber');
            $table->string('paymentTransactionNumber');
            $table->string('paymentStatus')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('invoiceID')->references('invoiceId')->on('invoice_masters'); 
            $table->foreign('paymentMethodId')->references('paymentMethodId')->on('payment_methods'); 
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
        Schema::dropIfExists('payment_methods');
    }
}
