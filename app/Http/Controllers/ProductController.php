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
    public function getProducts(Request $r)
    {
        return response()->json(array("products" => Product::get()), 200);
    }

    public function getAvailableStock(Request $r)
    {
        $currentStock = intval(Product::where('id', $r->productid)->value('currentStock'));
        return response()->json(array("quantity" => $currentStock), 200);
    }

    public function getAvailableProducts(Request $r)
    {
        
        if ($r->prdid) {
            $data = Product::join("product_types", "product_types.id", "=", "products.type")
            ->where("products.id", $r->prdid)
            ->orderBy("products.prdName")
            ->get(["products.id as productId", "products.prdName as productName", "product_types.typeName as type", "products.currentStock as availableStock", "products.wacPrice as price", "products.minimumStockLevel as msl"]);
            return response()->json(array("Products" => $data), 200);
        }else{
            $data = Product::join("product_types", "product_types.id", "=", "products.type")
            ->orderBy("products.prdName")
            ->get(["products.id as productId", "products.prdName as productName", "product_types.typeName as type", "products.currentStock as availableStock", "products.wacPrice as price", "products.minimumStockLevel as msl"]);
            return response()->json(array("Products" => $data), 200);
        }

        
        // $data=Product::join("product_types","product_types.id","=","products.type")
        // ->join("suppliers","suppliers.id","=","products.supplierid")
        // ->get(["products.id as productId","products.prdName as productName","product_types.typeName as type","products.currentStock as availableStock","products.wacPrice as price","products.minimumStockLevel as msl"]);
        // // ->get(["products.prdName","product_types.typeName","suppliers.supplierName"]);\


        
    }
}
