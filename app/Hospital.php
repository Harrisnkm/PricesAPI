<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    public $timestamps = false;


    //procedure Code
    public function procedure_codes()
    {
        return $this->hasManyThrough(ProcedureCode::class, HospitalCommercialPrice::class, 'hospital_id', 'id', 'id', 'procedure_code_id');
    }

    //insurances
    public function insurances()
    {
        return $this->hasManyThrough(Insurance::class, HospitalCommercialPrice::class, 'hospital_id', 'id', 'id', 'insurance_id');
    }

    //hospital prices with insurances and procedure codes
    public function hospitalPrices()
    {
        return $this->hasMany(HospitalCommercialPrice::class)->join('procedure_codes', 'hospital_commercial_price.procedure_code_id', '=', 'procedure_codes.id' )->join('insurances', 'hospital_commercial_price.insurance_id', '=', 'insurances.id' );
    }

    //find hospitals by ZipCode
    public function hospitalsByZip($zip)
    {
        return $this->where('zip', '=', $zip);
    }




}
