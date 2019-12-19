<?php

use Illuminate\Database\Seeder;

class AuditsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('audits')->delete();
        
        \DB::table('audits')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_type' => 'App\\\\User',
                'user_id' => 1,
                'event' => 'Logged In',
                'auditable_type' => 'Logged In',
                'auditable_id' => 1,
                'old_values' => NULL,
                'new_values' => NULL,
                'url' => 'http://localhost/mamno-server/public/api/v1/login',
                'ip_address' => '::1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2019-12-10 15:07:48',
                'updated_at' => '2019-12-10 15:07:48',
            ),
            1 => 
            array (
                'id' => 2,
                'user_type' => 'App\\\\User',
                'user_id' => 1,
                'event' => 'Logged In',
                'auditable_type' => 'Logged In',
                'auditable_id' => 1,
                'old_values' => NULL,
                'new_values' => NULL,
                'url' => 'http://localhost/mamno-server/public/api/v1/login',
                'ip_address' => '::1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2019-12-10 15:07:48',
                'updated_at' => '2019-12-10 15:07:48',
            ),
            2 => 
            array (
                'id' => 3,
                'user_type' => 'App\\\\User',
                'user_id' => 1,
                'event' => 'Logout',
                'auditable_type' => 'Logout',
                'auditable_id' => 1,
                'old_values' => NULL,
                'new_values' => NULL,
                'url' => 'http://localhost/mamno-server/public/api/v1/logout',
                'ip_address' => '::1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2019-12-10 15:12:55',
                'updated_at' => '2019-12-10 15:12:55',
            ),
            3 => 
            array (
                'id' => 4,
                'user_type' => 'App\\\\User',
                'user_id' => 1,
                'event' => 'Logged In',
                'auditable_type' => 'Logged In',
                'auditable_id' => 1,
                'old_values' => NULL,
                'new_values' => NULL,
                'url' => 'http://localhost/mamno-server/public/api/v1/login',
                'ip_address' => '::1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2019-12-10 15:52:39',
                'updated_at' => '2019-12-10 15:52:39',
            ),
            4 => 
            array (
                'id' => 5,
                'user_type' => 'App\\\\User',
                'user_id' => 1,
                'event' => 'updated',
                'auditable_type' => 'App\\\\User',
                'auditable_id' => 19,
                'old_values' => '{\\"password\\":\\"$2y$10$tztomVdqSRLwGYoYWRn0ietBq\\\\/soh39iNACI2SXHRaxo2Y6DCyRsu\\",\\"status\\":0,\\"nuevo\\":1,\\"passwordAttempt\\":0}',
                'new_values' => '{\\"password\\":\\"$2y$10$PlS929l7hLHYj0VHh1rOUeipbo1lE4AYS16otXxIsQ4Uhx8xYtFpm\\",\\"status\\":true,\\"nuevo\\":false,\\"passwordAttempt\\":true}',
                'url' => 'http://localhost/mamno-server/public/api/v1/configuraciones/attempt/19',
                'ip_address' => '::1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2019-12-10 16:30:28',
                'updated_at' => '2019-12-10 16:30:28',
            ),
            5 => 
            array (
                'id' => 6,
                'user_type' => 'App\\\\User',
                'user_id' => 1,
                'event' => 'updated',
                'auditable_type' => 'App\\\\User',
                'auditable_id' => 19,
                'old_values' => '{\\"password\\":\\"$2y$10$PlS929l7hLHYj0VHh1rOUeipbo1lE4AYS16otXxIsQ4Uhx8xYtFpm\\"}',
                'new_values' => '{\\"password\\":\\"$2y$10$ApXFd0yr8\\\\/yorGij9M8\\\\/F.obh1\\\\/wrF0\\\\/O0m8QqffJGDgPP5.MqmoW\\"}',
                'url' => 'http://localhost/mamno-server/public/api/v1/configuraciones/attempt/19',
                'ip_address' => '::1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2019-12-10 16:30:56',
                'updated_at' => '2019-12-10 16:30:56',
            ),
            6 => 
            array (
                'id' => 7,
                'user_type' => 'App\\\\User',
                'user_id' => 1,
                'event' => 'Logout',
                'auditable_type' => 'Logout',
                'auditable_id' => 1,
                'old_values' => NULL,
                'new_values' => NULL,
                'url' => 'http://localhost/mamno-server/public/api/v1/logout',
                'ip_address' => '::1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2019-12-10 16:32:33',
                'updated_at' => '2019-12-10 16:32:33',
            ),
            7 => 
            array (
                'id' => 8,
                'user_type' => 'App\\\\User',
                'user_id' => 19,
                'event' => 'Logged In',
                'auditable_type' => 'Logged In',
                'auditable_id' => 19,
                'old_values' => NULL,
                'new_values' => NULL,
                'url' => 'http://localhost/mamno-server/public/api/v1/login',
                'ip_address' => '::1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2019-12-10 16:33:23',
                'updated_at' => '2019-12-10 16:33:23',
            ),
            8 => 
            array (
                'id' => 9,
                'user_type' => 'App\\\\User',
                'user_id' => 19,
                'event' => 'updated',
                'auditable_type' => 'App\\\\User',
                'auditable_id' => 19,
                'old_values' => '{\\"password\\":\\"$2y$10$ApXFd0yr8\\\\/yorGij9M8\\\\/F.obh1\\\\/wrF0\\\\/O0m8QqffJGDgPP5.MqmoW\\",\\"passwordAttempt\\":1}',
                'new_values' => '{\\"password\\":\\"$2y$10$A09IwIZCEAflp3vTWlDave97Ga6Yeo\\\\/MrAuE\\\\/6iBcR.M0V5bo0H\\\\/2\\",\\"passwordAttempt\\":false}',
                'url' => 'http://localhost/mamno-server/public/api/v1/configuraciones/password-confirmation/19',
                'ip_address' => '::1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2019-12-10 16:34:04',
                'updated_at' => '2019-12-10 16:34:04',
            ),
            9 => 
            array (
                'id' => 10,
                'user_type' => 'App\\\\User',
                'user_id' => 19,
                'event' => 'updated',
                'auditable_type' => 'App\\\\User',
                'auditable_id' => 19,
                'old_values' => '{\\"password\\":\\"$2y$10$A09IwIZCEAflp3vTWlDave97Ga6Yeo\\\\/MrAuE\\\\/6iBcR.M0V5bo0H\\\\/2\\"}',
                'new_values' => '{\\"password\\":\\"$2y$10$9RxBkHCMkvuo11vLIJVgyetdOrjsF0tRzoqxhxYBG6p298cci2kLO\\"}',
                'url' => 'http://localhost/mamno-server/public/api/v1/configuraciones/password-confirmation/19',
                'ip_address' => '::1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36',
                'tags' => NULL,
                'created_at' => '2019-12-10 16:35:20',
                'updated_at' => '2019-12-10 16:35:20',
            ),
        ));
        
        
    }
}