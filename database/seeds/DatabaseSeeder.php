<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //$this->call(RolesTableSeeder::class);

        Model::reguard();
        $this->call('RolesTableSeeder');
        $this->call('Alakkad\WorldCountriesCities\CitiesSeeder');
        $this->call('Alakkad\WorldCountriesCities\CountriesSeeder');
    }
}
