<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // public function getSingleUser(Request $r)
    // {
    //     //  eloqunt Query Builder With Model
    //     // $derivedUser=User::where('id',$r->userId)->first();

    //     // Static Function With Model
    //     $derivedUser = User::find($r->userId);
    //     return response()->json($derivedUser, 200);
    // }

    public function addNewUser(Request $r)
    {
        $newUser = new User;
        $newUser->name = $r->name;
        $newUser->email = $r->email;
        $newUser->password = md5($r->password);
        $newUser->save();
        return response()->json(array("message" => "success", "result" => true), 200);
    }
    public function loginUser(Request $r)
    {
        if (User::where('email', $r->email)->where('password', md5($r->password))->count() > 0) {
            return response()->json(array("message" => "Logged In..!", "result" => true), 200);
        } else {
            return response()->json(array("message" => "Sorry; Email or Password is/are incorrect..!", "result" => false), 200);
        }
    }
}
