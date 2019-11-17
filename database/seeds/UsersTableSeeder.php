<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => '1',
                'name' => 'Gerardo Belot',
                'email' => 'gerardobelot@outlook.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$a0D3Yc8xJkwPHMD5sTxFx./Rmp.aUitvkk3B7nObHtJnfUbsm.ejy',
                'remember_token' => '4sUywDcAp2SZ1nReBur1A0DS4OPOsXahj6ce1JIjatLsfMKAe9gRjh37wH2H',
                'created_at' => '2019-11-17 07:13:20',
                'updated_at' => '2019-11-17 07:20:59',
                'status' => true,
            ),
        ));


    }
}
