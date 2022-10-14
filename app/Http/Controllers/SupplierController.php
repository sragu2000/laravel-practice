<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
class SupplierController extends Controller
{
    public function addNewSupplier(Request $r)
    {
        $newSupplier = new Supplier();
        $newSupplier->supplierName = $r->name;
        $newSupplier->supplierEmail = $r->email;
        $newSupplier->supplierAddress = $r->address;
        $newSupplier->supplierPhone = $r->phone;
        $newSupplier->save();
        return response()->json(array("message" => "success", "result" => true), 200);
    }
    public function getSuppliers(Request $r){
        return response()->json(array("suppliers"=>Supplier::get()),200);
    }
    
}
