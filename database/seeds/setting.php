<?php

use Illuminate\Database\Seeder;

class setting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting')->insert([
        	'email' => 'example@example.com',
        	'logo_lg' => 'demo.png',
        	'logo_sm' => 'demo1.png',
        	'mobile' => '01000000000',
        	'adderss' => 'example,example,example,example,example',
        	'status' => 1 //active
        ]);
    }
}
