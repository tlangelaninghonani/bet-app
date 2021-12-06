<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banking;
use App\Models\Subscription;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index(){
        return view("accounts", [
            "accounts" => new User(),
        ]);
    }

    public function verifyPayment(Request $req, $id){
        $user = User::find($id);
        $subscription = Subscription::where("user_id", $user->id)->first();
        $subscription->balance += $req->balance;
        $subscription->save();

        $user->state = "subscribed";
        $user->save();

        return redirect("/accounts");
    }

    public function viewUser($id){
        $user = User::find($id);
        $subscription = Subscription::where("user_id", $user->id)->first();
        $banking = Banking::where("user_id", $user->id)->first();
        return view("user", [
            "user" => $user,
            "banking" => $banking,
            "subscription" => $subscription
        ]);
    }
}
