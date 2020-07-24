<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class HospitalCommercialPrice extends Pivot
{
    public function hospital(){
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }

    public function insurance(){
        return $this->belongsTo(Insurance::class, 'insurance_id');
    }

    public function ProcedureCode(){
        return $this->belongsTo(ProcedureCode::class, 'procedure_code_id');
    }

}
