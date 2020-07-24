<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    public $timestamps = false;


    //hospitals that take this insurance
    public function hospitals()
    {
        return $this->hasManyThrough(Hospital::class, HospitalCommercialPrice::class, 'insurance_id', 'id', 'id', 'hospital_id');
    }

    //procedure codes that can be paid for by this insurance
    public function procedure_codes()
    {
        return $this->hasManyThrough(ProcedureCode::class, HospitalCommercialPrice::class, 'insurance_id', 'id', 'id', 'procedure_code_id');
    }

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
