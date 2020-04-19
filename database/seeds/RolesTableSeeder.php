<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $roles = [
            ['name'=>'super-admin','description'=>'super-admin'],
            ['name'=>'admin','description'=>'admin'],
            ['name'=>'contestant','description'=>'contestant'],
            ['name'=>'fan','description'=>'fan'],
        ];

        DB::table('roles')->insert($roles);

        $this->command->info('Roles seeded ');
    }
}
