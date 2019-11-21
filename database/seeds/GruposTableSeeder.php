<?php

use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('grupos')->delete();
        
        \DB::table('grupos')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'et',
                'created_at' => '2019-11-21 20:22:30',
                'updated_at' => '2019-11-21 20:22:30',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'perspiciatis',
                'created_at' => '2019-11-21 20:22:30',
                'updated_at' => '2019-11-21 20:22:30',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'voluptatem',
                'created_at' => '2019-11-21 20:22:30',
                'updated_at' => '2019-11-21 20:22:30',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'occaecati',
                'created_at' => '2019-11-21 20:22:30',
                'updated_at' => '2019-11-21 20:22:30',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'enim',
                'created_at' => '2019-11-21 20:22:30',
                'updated_at' => '2019-11-21 20:22:30',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'provident',
                'created_at' => '2019-11-21 20:22:30',
                'updated_at' => '2019-11-21 20:22:30',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'harum',
                'created_at' => '2019-11-21 20:22:30',
                'updated_at' => '2019-11-21 20:22:30',
            ),
            7 => 
            array (
                'id' => '8',
                'name' => 'facere',
                'created_at' => '2019-11-21 20:22:30',
                'updated_at' => '2019-11-21 20:22:30',
            ),
            8 => 
            array (
                'id' => '9',
                'name' => 'quia',
                'created_at' => '2019-11-21 20:22:30',
                'updated_at' => '2019-11-21 20:22:30',
            ),
            9 => 
            array (
                'id' => '10',
                'name' => 'tenetur',
                'created_at' => '2019-11-21 20:22:30',
                'updated_at' => '2019-11-21 20:22:30',
            ),
        ));
        
        
    }
}