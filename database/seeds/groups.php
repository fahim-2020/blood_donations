<?php

use Illuminate\Database\Seeder;

class groups extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'O+ (positive)',
            'image' => 'group_image/o+.png',
            'status'=>1 //1=active
        ]);
    }
}
