<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Banking;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SignupController extends Controller
{
    public function googleAuth(){
        return Socialite::driver('google')->redirect();
    }

    public function phoneNumber(Request $req){
        Session::put("phonenumber", $req->phonenumber);
        return view("pin");
        /*return view("banking_details", [
            "banks" => array(
                "Absa Group Limited", "African Bank Limited", "Capitec Bank Limited",
                "First National Bank", "Discovery Limited", "Bidvest Bank Limited", 
                "FirstRand Bank", "Investec Bank Limited", "Nedbank Limited", 
                "Standard Bank of South Africa", "TymeBank"
            )
        ]);*/
    }

    public function googleAuthCallback(){
        if(! Session::has("fullname")){
            $token = Socialite::driver('google')->user();
            if(User::where("email", $token->email)->exists()){
                $user = User::where("email", $token->email)->first();
                Session::flush();
    
                Session::put("userid", $user->id);
                Session::put("logged", true);
               return redirect("/football_categories"); 
            }

            Session::put("fullname", $token->name);
            Session::put("email", strtolower($token->email));
            Session::put("name", $token->user["given_name"]);
            return view("phone_number");

        }else{
            return view("phone_number");
        }
    }

    public function info(Request $req){
        $fullName = ucfirst(strtolower($req->fullname));
        Session::put("fullname", $fullName);
        Session::put("phonenumber", $req->phonenumber);
        Session::put("email", strtolower($req->email));
        return view("pin");
        /*return view("banking_details", [
            "banks" => array(
                "Absa Group Limited", "African Bank Limited", "Capitec Bank Limited",
                "First National Bank", "Discovery Limited", "Bidvest Bank Limited", 
                "FirstRand Bank", "Investec Bank Limited", "Nedbank Limited", 
                "Standard Bank of South Africa", "TymeBank"
            )
        ]);*/
    }

    public function banking(Request $req){
        /*$accountHolder = ucfirst(strtolower($req->accountholder));
        Session::put("bankname", $req->bankname);
        Session::put("accountholder", strtoupper($accountHolder));
        Session::put("accountnumber", $req->accountnumber);*/
        return view("pin");
    }

    public function pin(Request $req){
        if(! Session::get("logged")){
            $user = new User();
            //$banking = new Banking();
    
            $user->full_name = Session::get("fullname");
            $user->phone_number = Session::get("phonenumber");
            $user->email = Session::get("email");
            $user->pin = Hash::make($req->pin);
            $user->signup_day = intval(date("d"));
            $user->save();
    
            /*$banking->user_id = $user->id;
            $banking->account_holder = Session::get("accountholder");
            $banking->bank_name = Session::get("bankname");
            $banking->account_number = Session::get("accountnumber");
            $banking->save();*/

            $subscription = new Subscription();
            $subscription->user_id = $user->id;
            $subscription->save();

            Session::flush();
    
            Session::put("userid", $user->id);
            Session::put("logged", true);
            return view("free_trial", [
                "user" => $user
            ]);
        }
        $user = User::find(Session::get("userid"));
        return view("free_trial", [
            "user" => $user
        ]);
    }
}
