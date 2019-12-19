<?php

use Illuminate\Database\Seeder;

class InvoiceMastersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('invoice_masters')->delete();
        
        \DB::table('invoice_masters')->insert(array (
            0 => 
            array (
                'invoiceId' => 1,
                'invoiceDate' => '2019-12-14',
                'invoiceClient' => 1,
                'invoiceSARConfigId' => 1,
                'invoiceRTN' => NULL,
                'invoiceCAI' => NULL,
                'invoiceNumber' => '1',
                'invoiceStatus' => true,
                'invoiceExemptNumber' => NULL,
                'invoiceExemptAmount' => '0.00',
                'invoiceConstancyExeptedRecords' => NULL,
                'invoiceExoneratedAmount' => '0.00',
                'invoiceSAGNumber' => NULL,
                'invoiceAliquot' => '0.00',
                'invoiceTaxedAmount15' => '0.00',
                'invoiceTaxedAmount18' => '0.00',
                'invoiceSalesTax15' => '0.00',
                'invoiceSalesTax18' => '0.00',
                'invoiceSubtotal' => '150.00',
                'invoiceTotal' => '150.00',
                'deleted_at' => '2019-12-14 22:17:03',
                'created_at' => '2019-12-14 22:17:21',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}