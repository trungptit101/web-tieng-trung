<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin account
        \DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com.vn',
            'password' => bcrypt('123456@'),
        ]);

    }
}
