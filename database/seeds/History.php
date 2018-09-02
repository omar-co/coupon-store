<?php

use Illuminate\Database\Seeder;

class History extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\History::class, 10)->create();
    }
}
