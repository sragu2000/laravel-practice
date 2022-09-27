<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;

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
        $newSupplier->retailPrice = $r->retailprice;
        $newSupplier->date = $r->date;
        $newSupplier->save();
        return response()->json(array("message" => "success", "result" => true), 200);
    }
}
