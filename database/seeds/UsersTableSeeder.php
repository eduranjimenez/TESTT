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
                'id' => 1,
                'name' => 'SGC',
                'lastname' => 'ANU-RD',
                'role' => 1,
                'institution_id' => 1,
                'email' => 'admin@admin.com',
                'email_verified_at' => '2005-08-23 11:57:10',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'phone' => '558.796.6155 x18638',
                'remember_token' => 'HBeX214MhRtYTnj4olw4rk4cM3rmcoaeZN1qACbiROoHHbQeBuvlc31yCKCN',
                'created_at' => '2018-10-05 03:33:34',
                'updated_at' => '2018-10-06 03:17:39',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'Colegio Santa Teresa',
                'lastname' => 'Olga Silvestre',
                'role' => 2,
                'institution_id' => 10,
                'email' => 'rvaldiviesoluna@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$MLnjV118J05gejF0QMGnqOqHnHCE9tVsbAcV0Ss9dVWRQdQ4COKfa',
                'phone' => '8298906016',
                'remember_token' => 'dNbNFVlZHXJNCp3QjWkZcHBnLrEZWvqLrE7iqzhNpfCfiGcI3I73dccnphG8',
                'created_at' => '2018-10-05 15:08:54',
                'updated_at' => '2018-10-06 02:29:10',
            ),
        ));
        
        
    }
}