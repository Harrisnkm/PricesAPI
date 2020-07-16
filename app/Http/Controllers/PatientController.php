<?php

namespace App\Http\Controllers;

use App\Hospital;
use App\Insurance;
use App\ProcedureCode;
use Illuminate\Http\Request;

class PatientController extends Controller
{


 public function index(){
     $this->apiOptions = new \stdClass();
     $this->apiOptions->hospitals = Hospital::all();
     $this->apiOptions->insurances = Insurance::all();
     $this->apiOptions->procedureCodes = ProcedureCode::all();


//    return view('testing.testing',[
//       'hospitals' => $hospitals,
//       'insurances' => $insurances,
//       'procedureCodes' => $procedureCodes
//    ]);
     return view('testing.testing', ['apiOptions' => json_encode($this->apiOptions)]);

 }

 public function search(Request $request){
  //check if the parameters were entered (specifically if request->hospital exists

    return Hospital::find($request->hospital);



 }
}
