<?php

use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //how many records of this do you want to create
        factory(App\Hospital::class, 10)->create();
    }
}
