<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Insurance;
use App\ProcedureCode;
use Illuminate\Http\Request;


class ProviderController extends EntityReimbursementPriceTableController
{


    public function index(){
        $this->apiOptions = new \stdClass();
        $this->apiOptions->hospitals = Hospital::all();
        $this->apiOptions->insurances = Insurance::all();
        $this->apiOptions->procedureCodes = ProcedureCode::all();


        return view('testing.testing', ['apiOptions' => json_encode($this->apiOptions)]);

    }

    public function search(Request $request){
//        $hospitaldata = $this->getPricesNearMe($request->procedureCode, substr($request->zip,0,2));
//        return $hospitaldata;
        $hospitalData = $this->getInsurancesNearMe($request->zip);
    }

    public function getPricesNearMe($procedureCode, $zip){
        //if $procedureCode is null return a collection of hospitals for the user to choose. then it goes on the hospitals page.


        //if the procedure code is filled out
        //return a collection of hospitals, the procedure code and the prices.


        //get hospitals by zipcode
        $hospitals = new Hospital();
        $hospitalsByZip = $hospitals->hospitalsByZip($zip);
        $hospitalInsurances = $hospitalsByZip->InsurancesTakenAtHospital;


        dd($hospitalsByZip);
        //return json_encode($hospitals->get());

        //if $procedureCode is null search for the largest discrepancy of high to low range prices for procedure codes
    }

    public function getInsurancesNearMe($zip){
        $hospitals = new Hospital();
        $hospitalInsurances = $hospitals->Ins;
        dd($hospitalInsurances);
    }

    public function getProcedureCodeStats($procedureCode){

    }

    public function getProviderScores(){

    }

}
