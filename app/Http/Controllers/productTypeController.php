<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productType;

class productTypeController extends Controller
{
    public function addNewType(Request $r)
    {
        $newType = new productType();
        $newType->typeName = $r->typename;
        $newType->description = $r->description;
        $newType->save();
        return response()->json(array("message" => "success", "result" => true), 200);
    }
}
