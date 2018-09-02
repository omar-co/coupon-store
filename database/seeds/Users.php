<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
            'admin' => true,
            'points' => 0
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@email.com',
            'password' => bcrypt('password'),
            'admin' => false,
            'points' => 1000
        ]);
    }
}
