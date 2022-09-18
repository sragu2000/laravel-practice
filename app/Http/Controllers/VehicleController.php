<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use DB;

class VehicleController extends Controller
{
    // public function getVehiclesOfUser(Request $r){
    //     $r->userId

    // }
    public function getSingleVehicle(Request $r){
        // $derivedVehicle=Vehicle::where('id',$r->vehicleId)->first();
        $derivedVehicle=Vehicle::find($r->vehicleId);
        return response()->json($derivedVehicle,200);
    }
}
