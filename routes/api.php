<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\First;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Without Controller
// Route::get("addNumbers",function(Request $r){
//     $firstNumber = intval($r->fn);
//     $secondNumber = intval($r->sn);
//     $total=$firstNumber+$secondNumber;
//     return response()->json(array("total"=>$total),200);
// });

//With Controller 
Route::get("addNumbers",[First::class,"addNumbers"]);
Route::get("vehiclesOfUser",[VehicleController::class,"getVehiclesOfUser"]);
Route::get("getVehicle",[VehicleController::class,"getSingleVehicle"]);
Route::get("getUser",[UserController::class,"getSingleUser"]);
Route::get("addUser",[UserController::class,"addNewUser"]);