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
         //Create the Entity Records
        $this->call(HospitalSeeder::class);
        $this->call(PracticeSeeder::class);
        $this->call(ProcedureCodeSeeder::class);
        $this->call(InsuranceSeeder::class);

        //Create the Prices Records and use the Entity records to fill in
        $this->call(HospitalCommercialPriceSeeder::class);

        //Seed Users and UserRoles Tables
        $this->call(UserRoleSeeder::class);
        $this->call(UserSeeder::class);

    }
}
