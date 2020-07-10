<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcedureCode extends Model
{
    public $timestamps = false;

    //one procedure code has many prices
    public function procedureCodePrices() {
        return $this->hasMany(HospitalCommercialPrice::class);
    }


    //Hospitals that perform this procedureCode
    public function HospitalsThatPerformThisProcedureCode() {
        return $this->hasManyThrough('App\Hospital', 'App\HospitalCommercialPrice');
    }


}
