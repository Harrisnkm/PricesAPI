<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Hospital;
use App\Exceptions\Handler;

class HospitalTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testProcedureCodes(){

        $this->withoutExceptionHandling();
        //instantiate Hospital
        $hospital = Hospital::find(1);

   //check the count of the collection
        $this->assertCount(3, $hospital->procedure_codes);


    }

    public function testInsurances(){

    }
}
