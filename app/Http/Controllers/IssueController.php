<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Issue;

class IssueController extends Controller
{
    public function addIssues(Request $r)
    {
        $currentStock = intval(Product::where('id', $r->productId)->value('currentStock'));
        $currentPrice = intval(Product::where('id', $r->productId)->value('wacPrice'));
        if ($currentStock == 0) {
            return response()->json(array("message" => "error1", "result" => false), 200);
        } else {
            $unitPrice = $currentPrice / $currentStock;
            $newIssue = new Issue();
            $newIssue->typeId = $r->typeId;
            $newIssue->productId = $r->productId;
            $newIssue->quantity = $r->quantity;
            $newIssue->description = $r->description;
            $newIssue->date = $r->date;
            $newIssue->atPrice = $unitPrice;
            $newIssue->save();

            Product::where('id',$r->productId)->update(['currentStock'=>$currentStock-intval($r->quantity)]);
            Product::where('id',$r->productId)->update(['wacPrice'=>$currentPrice-(intval($r->quantity)*$unitPrice)]);    

            return response()->json(array("message" => "success", "result" => true), 200);
        }
    }
}
