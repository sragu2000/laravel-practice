<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\First;
use App\Http\Controllers\UserController;
use App\Http\Controllers\productTypeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\IssueController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("addNumbers",[First::class,"addNumbers"]);
Route::get("getUser",[UserController::class,"getSingleUser"]);
Route::post("addUser",[UserController::class,"addNewUser"]);
Route::post("loginUser",[UserController::class,"loginUser"]);
Route::post("addtype",[productTypeController::class,"addNewType"]);
Route::get("getProductTypes",[productTypeController::class,"getProductTypes"]);
Route::get("getProducts",[ProductController::class,"getProducts"]);
Route::get("getSuppliers",[SupplierController::class,"getSuppliers"]);
Route::post("addproduct",[ProductController::class,"addNewProduct"]);
Route::post("addsupplier",[SupplierController::class,"addNewSupplier"]);
Route::post("addpurchase",[PurchaseController::class,"addPurchase"]);
Route::get("getAvailableStock",[ProductController::class,"getAvailableStock"]);
Route::get("getIssues",[IssueController::class,"getIssues"]);
Route::post("addIssues",[IssueController::class,"addIssues"]);
Route::get("getAvailableProducts",[ProductController::class,"getAvailableProducts"]);
Route::get("getSupplierForProduct",[PurchaseController::class,"getSupplierForProduct"]);
Route::get("getTransactions",[PurchaseController::class,"getTransactions"]);

