<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SigninController extends Controller
{
    public function signin(Request $req){
        if(User::where("phone_number", $req->phonenumberoremail)->orwhere("email", $req->phonenumberoremail)->exists()){
            $user = User::where("phone_number", $req->phonenumberoremail)->orwhere("email", $req->phonenumberoremail)->first();
            if(Hash::check($req->pin, $user->pin)){
                Session::put("userid", $user->id);
                Session::put("logged", true);
    
                return redirect("/football_categories");
            }
        }
        return view("error", [
            "error" => "signin"
        ]);
    }
}
