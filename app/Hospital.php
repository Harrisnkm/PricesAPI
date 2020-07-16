<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    public $timestamps = false;


    //Prices at Hospitals
    public function HospitalCommercialPrices($priceTable){
        return $this->hasMany($priceTable)->all();
    }

    //Insurances taken at this hospital
    public function InsurancesTakenAtHospital(){
        return $this->belongsToMany('App\Insurance', 'hospital_commercial_price', 'hospital_id', 'insurance_id');
    }

    //Insurances at Hospitals (The insurances that hospitals take). One to Many relationship
    //Access the Insurances a hospital takes by the Hospital Commercial price table
    public function Ins(){

        return $this->belongsToMany('App\Insurance', 'hospital_commercial_price', 'hospital_id', 'insurance_id')->using('App\HospitalCommercialPrice')->withPivot(['price', 'network_price']);
    }


}
