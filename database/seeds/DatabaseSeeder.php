<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(groups::class);
        $this->call(genders::class);
        $this->call(addicted::class);
        $this->call(city::class);
        $this->call(smoking::class);
        $this->call(setting::class);
        
    }
}
