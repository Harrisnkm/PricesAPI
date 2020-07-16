<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntityReimbursementPriceTableController extends Controller
{
    protected $ERPT;

    public function __construct(Request $request)
    {
        if($request->server->all()['REQUEST_METHOD'] == 'POST')
        {
        $this->ERPT = 'App\\'.$this->getERPT($request->entity, $request->reimbursement);
        }


    }

    public function getERPT($entity, $reimbursement){

        //init $ERPT, $ERPT is used to concat variable then return the correct Price Table
        $ERPT = '';


        //check if entity is in a switch statement of current entity types

        switch(strtoupper($entity)){
            case "HOSPITAL":
                $ERPT .= 'Hospital';
                break;
            case "PRACTICE":
                $ERPT .= 'Practice';
                break;
            default:
                //throw an error
        }

        //check reimbursement to make sure there is a match
        switch(strtoupper($reimbursement)){
            case "COMMERCIAL":
                $ERPT .= 'Commercial';
                break;
            case "MEDICARE":
                $ERPT .= 'Medicare';
                break;
            case "MEDICAID":
                $ERPT .= "Medicaid";
                break;
            default:
                //throw an error
        }

        //ContactPriceTable to the end of $ERPT
        $ERPT .="Price";

        //return ERPT to the model that extends this one
        return $ERPT;
    }


}
