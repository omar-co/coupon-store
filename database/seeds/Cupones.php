<?php

use Illuminate\Database\Seeder;

class Cupones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Cupones::class, 100)->create();
    }
}
