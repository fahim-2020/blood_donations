<?php

use Illuminate\Database\Seeder;

class smoking extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('smoking')->insert([
        	'name' => 'Yes',
        	'status' => 1 //active
        ]);
    }
}
