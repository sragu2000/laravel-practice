<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class First extends Controller
{
    public function addNumbers(Request $r){
        $firstNumber = intval($r->fn);
        $secondNumber = intval($r->sn);
        $total=$firstNumber+$secondNumber;
        return response()->json(array("total"=>$total),200);
    }
}
