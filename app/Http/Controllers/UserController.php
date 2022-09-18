<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function getSingleUser(Request $r){
        //  eloqunt Query Builder With Model
        // $derivedUser=User::where('id',$r->userId)->first();
        
        // Static Function With Model
        $derivedUser=User::find($r->userId);
        return response()->json($derivedUser,200);
    }

    public function addNewUser(Request $r){
        $newUser=new User;
        $newUser->name=$r->name;
        $newUser->email=$r->email;
        $newUser->password=md5($r->password);
        $newUser->save();
        return response()->json(array("message"=>"success"),200);
    }
}
