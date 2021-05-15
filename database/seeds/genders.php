<?php

use Illuminate\Database\Seeder;

class genders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
        	'name' => 'male',
        	'status' => 1 //active
        ]);
    }
}
