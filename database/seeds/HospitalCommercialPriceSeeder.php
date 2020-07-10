<?php

use Illuminate\Database\Seeder;

class HospitalCommercialPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\HospitalCommercialPrice::class, 50)->create();
    }
}
