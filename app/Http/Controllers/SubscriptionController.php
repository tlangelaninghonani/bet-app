<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Support\Facades\Session;

class SubscriptionController extends Controller
{
    public function index(){
        if(! Session::has("logged")){
            return view("signin");
        }
        $user = User::find(Session::get("userid"));
        $subscription = Subscription::where("user_id", $user->id)->first();
        return view("subscription", [
            "user" => $user,
            "subscription" => $subscription
        ]);
    }
}
