<?php

use Illuminate\Database\Seeder;

class ProcedureCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProcedureCode::class, 500)->create();
    }
}
