<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;

class PurchaseController extends Controller
{
    public function addPurchase(Request $r)
    {
        $newSupplier = new Purchase();
        $newSupplier->purchaseInvoiceNumber = $r->invoicenumber;
        $newSupplier->supplierId = $r->supplierid;
        $newSupplier->typeId = $r->typeid;
        $newSupplier->productId = $r->productid;
        $newSupplier->quantity = $r->quantity;
        $newSupplier->purchasePrice = $r->purchaseprice;
        $newSupplier->date = $r->date;
        $newSupplier->save();

        // update product table
        $currentStock=intval(Product::where('id',$r->productid)->value('currentStock')) ;
        Product::where('id',$r->productid)->update(['currentStock'=>$currentStock+intval($r->quantity)]);

        $currentPrice=intval(Product::where('id',$r->productid)->value('wacPrice')) ;
        Product::where('id',$r->productid)->update(['wacPrice'=>$currentPrice+(intval($r->quantity)*intval($r->purchaseprice))]);

        return response()->json(array("message" => "success", "result" => true), 200);
    }
}
