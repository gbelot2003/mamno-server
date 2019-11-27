<?php

use Illuminate\Database\Seeder;

class ModelHasRolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('model_has_roles')->delete();
        
        \DB::table('model_has_roles')->insert(array (
            0 => 
            array (
                'role_id' => '1',
                'model_type' => 'App\\User',
                'model_id' => '7',
            ),
            1 => 
            array (
                'role_id' => '5',
                'model_type' => 'App\\User',
                'model_id' => '10',
            ),
            2 => 
            array (
                'role_id' => '3',
                'model_type' => 'App\\User',
                'model_id' => '9',
            ),
            3 => 
            array (
                'role_id' => '6',
                'model_type' => 'App\\User',
                'model_id' => '11',
            ),
            4 => 
            array (
                'role_id' => '2',
                'model_type' => 'App\\User',
                'model_id' => '8',
            ),
            5 => 
            array (
                'role_id' => '1',
                'model_type' => 'App\\User',
                'model_id' => '14',
            ),
            6 => 
            array (
                'role_id' => '6',
                'model_type' => 'App\\User',
                'model_id' => '15',
            ),
            7 => 
            array (
                'role_id' => '6',
                'model_type' => 'App\\User',
                'model_id' => '16',
            ),
            8 => 
            array (
                'role_id' => '6',
                'model_type' => 'App\\User',
                'model_id' => '17',
            ),
            9 => 
            array (
                'role_id' => '4',
                'model_type' => 'App\\User',
                'model_id' => '18',
            ),
            10 => 
            array (
                'role_id' => '4',
                'model_type' => 'App\\User',
                'model_id' => '19',
            ),
            11 => 
            array (
                'role_id' => '5',
                'model_type' => 'App\\User',
                'model_id' => '20',
            ),
            12 => 
            array (
                'role_id' => '8',
                'model_type' => 'App\\User',
                'model_id' => '12',
            ),
            13 => 
            array (
                'role_id' => '7',
                'model_type' => 'App\\User',
                'model_id' => '1',
            ),
            14 => 
            array (
                'role_id' => '5',
                'model_type' => 'App\\User',
                'model_id' => '13',
            ),
            15 => 
            array (
                'role_id' => '4',
                'model_type' => 'App\\User',
                'model_id' => '6',
            ),
        ));
        
        
    }
}