<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banking;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index(Request $req){
        if(! Session::has("logged")){
            return view("signin");
        }
        $user = User::find(Session::get("userid"));
        $banking = Banking::where("user_id", $user->id)->first();
        return view("profile", [
            "user" => $user,
            "banking" => $banking
        ]);
    }

    public function update(Request $req){
        $user = User::find(Session::get("userid"));
        $user->full_name = $req->fullname;
        $user->phone_number = $req->phonenumber;
        $user->email = $req->email;
        $user->save();

        return back();
    }
}
