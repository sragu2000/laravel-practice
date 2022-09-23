<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProductType;

class productTypeController extends Controller
{
    public function addNewType(Request $r)
    {
        $newType = new ProductType();
        $newType->typeName = $r->typename;
        $newType->description = $r->description;
        $newType->save();
        return response()->json(array("message" => "success", "result" => true), 200);
    }
    public function getProductTypes(Request $r){
        return response()->json(array("productTypes"=>ProductType::get()),200);
    }
}
