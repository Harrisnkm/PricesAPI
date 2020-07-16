<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{

    public function getPricesNearMe($procedureCode, $zip){
        //if $procedureCode is not null then return the every code within first 3 digits of the zip code


        //if $procedureCode is null search for the largest discrepancy of high to low range prices for procedure codes

    }

    public function getProcedureCodeStats($procedureCode){

    }

    public function getProviderScores(){

    }

}
