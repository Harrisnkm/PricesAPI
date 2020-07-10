<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    public $timestamps = false;

    //all prices under this insurance
    public function InsurancePrices($model){
        return $this->hasMany($model)->get();
    }

    //all prices under this insurance for a specific procedure
    public function InsurancePricesPerProcedure($model, $procedure_code_id){
        return $this->hasMany($model)->where('procedure_code_id', $procedure_code_id)->get();
    }

    //all prices under this insurance at specific hospital
    public function InsurancePricesPerHospital($mo, $hospital_id){
        return $this->hasMany($model)->where('hospital_id', $hospital_id)->get();
    }

    //hospitals that take this insurance
    public function InsurancesTakenAtHospital(){
        return $this->belongsToMany('App\Hospital', 'hospital_commercial_price', 'insurance_id', 'hospital_id');
    }


}
