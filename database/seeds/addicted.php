<?php

use Illuminate\Database\Seeder;

class addicted extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addicted')->insert([
        	'name' => 'Yes',
        	'status' => 1 //active
        ]);
    }
}
