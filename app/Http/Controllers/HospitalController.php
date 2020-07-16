<?php

namespace App\Http\Controllers;

use App\Hospital;
use Illuminate\Http\Request;

class HospitalController extends EntityReimbursementPriceTableController
{
    public function index(Request $request){

      if($this->ERPT) {
         $hospital = new Hospital();
          $hospital = $hospital->HospitalCommercialPrices($this->ERPT);

      }



        return view('testing.testing')->with('hospital', isset($hospital) ? $hospital:null);
    }
}
