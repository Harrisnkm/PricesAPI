<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class HospitalCommercialPrice extends Pivot
{
    public function hospital(){
        return $this->belongsTo(Hospital::class);
    }

    public function insurance(){
        return $this->belongsTo(Insurance::class);
    }

    public function ProcedureCode(){
        return $this->belongsTo(ProcedureCode::class);
    }
}
