<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        $data = [];
        for($i = 0; $i < 100; $i++)
        {
        		$data[] = [
        			'name' =>str_random(10),
        			'password' => encrypt(123),
        			'email' => str_random(5).'@sina.com',
        			'remember_token' => str_random(50),
        			'created_at' => date('Y-m-d H:i:s'),
        			 'updated_at' => date('Y-m-d H:i:s'),

        		];
        }
        \DB::table('users') -> insert($data);
    }
}
