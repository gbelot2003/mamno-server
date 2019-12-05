<?php

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('configurations')->delete();
        
        \DB::table('configurations')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Debe contener al menos una letra minuscula',
                'value' => 'regex:/[a-z]/',
                'display' => '1',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Debe contener al menos una letra mayuscula',
                'value' => 'regex:/[A-Z]/',
                'display' => '1',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Debe contener al menos un numero',
                'value' => 'regex:/[0-9]/',
                'display' => '1',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Debe contener al menos un caracter especial',
                'value' => 'regex:/[@$!%*#?&]/',
                'display' => '1',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'Debe contener al menos el numero de caracteres',
                'value' => '5',
                'display' => '1',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'Puede intentar login al menos el numero de veces',
                'value' => '3',
                'display' => '1',
            ),
        ));
        
        
    }
}