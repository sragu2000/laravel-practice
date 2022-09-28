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
        $newType->currentStock = 0;
        $newType->wacPrice = 0;
        $newType->save();
        return response()->json(array("message" => "success", "result" => true), 200);
    }
    public function getProducts(Request $r){
        return response()->json(array("products"=>Product::get()),200);
    }

    public function getAvailableStock(Request $r){
        $currentStock=intval(Product::where('id',$r->productid)->value('currentStock')) ;
        return response()->json(array("quantity"=>$currentStock),200);
    }
}
