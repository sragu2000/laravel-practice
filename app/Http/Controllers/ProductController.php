<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function addNewProduct(Request $r)
    {
    //['productId','prdName','minimumStockLevel','type','description'];
        $newType = new Product();
        $newType->prdName = $r->productName;
        $newType->minimumStockLevel = $r->minimumStockLevel;
        $newType->type = $r->type;
        $newType->description = $r->description;
        $newType->save();
        return response()->json(array("message" => "success", "result" => true), 200);
    }
}
