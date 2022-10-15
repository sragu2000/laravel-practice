<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\Issue;
use Illuminate\Support\Facades\DB;

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
        $currentStock = intval(Product::where('id', $r->productid)->value('currentStock'));
        Product::where('id', $r->productid)->update(['currentStock' => $currentStock + intval($r->quantity)]);

        $currentPrice = intval(Product::where('id', $r->productid)->value('wacPrice'));
        Product::where('id', $r->productid)->update(['wacPrice' => $currentPrice + (intval($r->quantity) * intval($r->purchaseprice))]);

        return response()->json(array("message" => "success", "result" => true), 200);
    }

    public function getSupplierForProduct(Request $r)
    {
        $prd = Product::where('id', $r->prdid)->value('prdName');
        $data = Purchase::join("suppliers", "suppliers.id", "=", "purchases.supplierId")
            ->where('productId', $r->prdid)->distinct()
            ->get(["suppliers.supplierName", "suppliers.supplierEmail", "suppliers.supplierAddress", "suppliers.supplierPhone", "suppliers.id"]);
        return response()->json(array("Product" => $prd, "suppliers" => $data), 200);
    }
    public function getTransactions(Request $r)
    {
        $row= Product::where('id', $r->prdid);
        $prd=$row->value('prdName');
        $first=DB::table("purchases")
        ->select("quantity", "purchasePrice as price", "created_at", "event","date","id")
        ->where('productId',"=", $r->prdid);
        $second=DB::table("issues")
        ->select("quantity", "atprice as price", "created_at", "event","date","id")
        ->where('productId',"=", $r->prdid)
        ->union($first)
        ->orderBy("created_at")
        ->get();
        return response()->json(array(
            "product"=>$prd,
            "productId"=>$r->prdid,
            "transactions" => $second
        ), 200);
    }

    // public function modifyTransactions(Request $r){
    //     // $productId=$r->productId;  // NO NEED !
    //     $eventType=$r->eventType;
    //     $transactionId=$r->transactionId;
    //     $newQuantity=$r->newQuantity;
    //     // if eventType =1 ; purchase | else issue
    //     if($eventType==1){
    //         $quantityInDatabase = Purchase::where('id', $transactionId)->value('quantity');

    //     }
    // }
}
