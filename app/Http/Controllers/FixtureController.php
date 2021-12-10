<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fixture;
use App\Models\User;
use App\Models\Book;
use App\Models\FixtureId;
use App\Models\Subscription;
use App\Models\Admin;
use App\Models\Ticket;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class FixtureController extends Controller
{
    public function fixture(Request $req){

        $admin = Admin::find(1);

        $fixture = new Fixture();
        $fixture->first_team = Session::get("firstteam");
        $fixture->second_team = Session::get("secondteam");
        $fixture->day = Session::get("day");
        $fixture->hour = Session::get("hour");
        $fixture->minutes = Session::get("minutes");
        $fixture->date = Session::get("date");
        $fixture->published_fixtures_id = Session::get("publishedfixturesid");

        $fixture->first_team_odds = $req->firstteamodds;
        $fixture->second_team_odds = $req->secondteamodds;
        $fixture->draw_odds = $req->drawodds;
        $fixture->prediction = $req->outcome;
        $fixture->save();

        return redirect("/admin_fixtures");
    } 

    public function addPrediction(Request $req, $fixtureId){
        Session::put("firstteam", ucfirst($req->firstteam));
        Session::put("secondteam", ucfirst($req->secondteam));
        Session::put("day", $req->day);
        Session::put("hour", $req->hours);
        Session::put("minutes", $req->minutes);
        Session::put("date", $req->day." ".date("F")." ".$req->hours.":".$req->minutes);
        Session::put("publishedfixturesid", $fixtureId);

        return view("add_prediction", [
            "fixturesId" => FixtureId::where("published_fixtures_id", $fixtureId)->first(),
        ]);
    }

    public function editFixtureSet(Request $req, $fixtureId){

        $fixture = Fixture::find($fixtureId);
        $fixture->first_team = ucfirst($req->firstteam);
        $fixture->second_team = ucfirst($req->secondteam);
        $fixture->prediction = $req->outcome;
        $fixture->day = $req->day;
        $fixture->hour = $req->hours;
        $fixture->minutes = $req->minutes;
        $date = $req->day." ".date("F")." ".$req->hours.":".$req->minutes;
        $fixture->date = $date;
        $fixture->first_team_odds = $req->firstteamodds;
        $fixture->second_team_odds = $req->secondteamodds;
        $fixture->draw_odds = $req->drawodds;
        $fixture->save();

        return redirect("/admin_fixtures");
    } 

    public function editFixture($fixtureId){
        $fixture = Fixture::find($fixtureId);
        $fixturesId = FixtureId::find($fixture->published_fixtures_id);
        return view("edit_fixture", [
            "fixture" => $fixture,
            "fixturesId" => $fixturesId
        ]);
    }

    public function activateTicket(Request $req){
        $user = User::find(Session::get("userid"));
        $subscription = Subscription::where("user_id", $user->id)->first();
        foreach(Ticket::all() as $ticket){
            if($ticket->ticket_number == $req->ticketnumber){
                if(! $ticket->ticket_activated){
                    $ticket->ticket_activated = true;
                    $ticket->save();
                    
                    $subscription->balance += 10;
                    $subscription->save();

                    $user->state = "subscribed";
                    $user->save();
                    return redirect("/football_categories");
                }
            }
        }
        return back();
    }

    public function deleteFixture($id){
        DB::table("fixtures")->where("id", $id)->delete();
        return redirect("/admin_fixtures");
    }

    public function deleteFixtureAll($fixtureId){
        DB::table("fixtures")->where("published_fixtures_id", $fixtureId)->delete();
        DB::table("fixture_ids")->where("published_fixtures_id", $fixtureId)->delete();
        
        $fixturesId = FixtureId::find(1);
        if($fixturesId){
            return redirect("/admin_fixtures/".$fixturesId->id);
        }else{
            return redirect("/admin_fixtures");
        }
    }

    public function footballCategories(){
        if(! Session::has("logged")){
            return view("signin");
        }
        $user = User::find(Session::get("userid"));
        $subscription = Subscription::where("user_id", $user->id)->first();
     
        if($user->state != "trial"){
            if($subscription->balance < 1 && ! $subscription->paid){
                return view("unsubscribed", [
                    "subscription" => $subscription
                ]);
            }
    
            if(! $subscription->paid){
                return view("home", [
                    "subscription" => $subscription,
                    "book" => Book::find(1),
                ]);
            }
            if($user->state == "unsubscribed"){
                return view("unsubscribed", [
                    "subscription" => $subscription
                ]);
            }
        }

        if((intval(date("d") - $user->signup_day)) > 7){
            $user->state = "unsubscribed";
            $user->save();

            return view("unsubscribed", [
                "subscription" => $subscription
            ]);
        }

        if(FixtureId::where("category", "Double chance")->where("published", true)->exists()){
            $doubleChance = Fixture::where("published_fixtures_id", FixtureId::where("category", "Double chance")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $doubleChance = 0;
        }

        if(FixtureId::where("category", "Take the risk")->where("published", true)->exists()){
            $takeTheRisk = Fixture::where("published_fixtures_id", FixtureId::where("category", "Take the risk")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $takeTheRisk = 0;
        }

        if(FixtureId::where("category", "Both to score")->where("published", true)->exists()){
            $bothToScore = Fixture::where("published_fixtures_id", FixtureId::where("category", "Both to score")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $bothToScore = 0;
        }

        if(FixtureId::where("category", "2.5 Goals")->where("published", true)->exists()){
            $twoFiveGoals = Fixture::where("published_fixtures_id", FixtureId::where("category", "2.5 Goals")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $twoFiveGoals = 0;
        }

        if(FixtureId::where("category", "1.5 Goals")->where("published", true)->exists()){
            $oneFiveGoals = Fixture::where("published_fixtures_id", FixtureId::where("category", "1.5 Goals")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $oneFiveGoals = 0;
        }

        if(FixtureId::where("category", "Sure 2")->where("published", true)->exists()){
            $sureTwo = Fixture::where("published_fixtures_id", FixtureId::where("category", "Sure 2")->first()->where("published", true)->published_fixtures_id)->count();
        }else{
            $sureTwo = 0;
        }

        if(FixtureId::where("category", "single combo")->where("published", true)->exists()){
            $singleCombo = Fixture::where("published_fixtures_id", FixtureId::where("category", "single combo")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $singleCombo = 0;
        }

        return view("football_categories", [
            "doubleChance" => $doubleChance,
            "takeTheRisk" => $takeTheRisk,
            "bothToScore" => $bothToScore,
            "twoFiveGoals" => $twoFiveGoals,
            "oneFiveGoals" => $oneFiveGoals,
            "sureTwo" => $sureTwo,
            "singleCombo" => $singleCombo,
        ]);
    }

    public function home(){
        if(! Session::has("logged")){
            return view("signin");
        }
        $user = User::find(Session::get("userid"));
        if($user->package == ""){
            $subscription = Subscription::where("user_id", $user->id)->first();
            return view("home", [
                "subscription" => $subscription,
                "user" => $user,
                "book" => Book::find(1),
            ]);
        }else{
            return redirect("/fixtures");
        }
    }

    public function setupFixture($fixtureId){
        $fixturesId = FixtureId::where("published_fixtures_id", $fixtureId)->first();
        return view("fixture", [
            "fixtureId" => $fixtureId,
            "fixturesId" => $fixturesId
        ]);
    }

    public function newFixtures(Request $req, $category){
        $admin = Admin::find(1);
        $admin->published_fixtures_id += 1;
        $admin->save();

        $fixturesId = new FixtureId();
        $fixturesId->published_fixtures_id = $admin->published_fixtures_id;
        $fixturesId->category = $category;
        $fixturesId->save();

        return redirect("/fixture/".$admin->published_fixtures_id);
    }

    public function adminFootballCategories(Request $req){
        if(FixtureId::where("category", "Double chance")->where("published", true)->exists()){
            $doubleChance = Fixture::where("published_fixtures_id", FixtureId::where("category", "Double chance")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $doubleChance = 0;
        }

        if(FixtureId::where("category", "Take the risk")->where("published", true)->exists()){
            $takeTheRisk = Fixture::where("published_fixtures_id", FixtureId::where("category", "Take the risk")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $takeTheRisk = 0;
        }

        if(FixtureId::where("category", "Both to score")->where("published", true)->exists()){
            $bothToScore = Fixture::where("published_fixtures_id", FixtureId::where("category", "Both to score")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $bothToScore = 0;
        }

        if(FixtureId::where("category", "2.5 Goals")->where("published", true)->exists()){
            $twoFiveGoals = Fixture::where("published_fixtures_id", FixtureId::where("category", "2.5 Goals")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $twoFiveGoals = 0;
        }

        if(FixtureId::where("category", "1.5 Goals")->where("published", true)->exists()){
            $oneFiveGoals = Fixture::where("published_fixtures_id", FixtureId::where("category", "1.5 Goals")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $oneFiveGoals = 0;
        }

        if(FixtureId::where("category", "Sure 2")->where("published", true)->exists()){
            $sureTwo = Fixture::where("published_fixtures_id", FixtureId::where("category", "Sure 2")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $sureTwo = 0;
        }

        if(FixtureId::where("category", "single combo")->where("published", true)->exists()){
            $singleCombo = Fixture::where("published_fixtures_id", FixtureId::where("category", "single combo")->where("published", true)->first()->published_fixtures_id)->count();
        }else{
            $singleCombo = 0;
        }
        return view("admin_football_categories", [
            "doubleChance" => $doubleChance,
            "takeTheRisk" => $takeTheRisk,
            "bothToScore" => $bothToScore,
            "twoFiveGoals" => $twoFiveGoals,
            "oneFiveGoals" => $oneFiveGoals,
            "sureTwo" => $sureTwo,
            "singleCombo" => $singleCombo,
        ]);
    }

    public function publishFixtures(Request $req, $fixtureToPublishId){
        $admin = Admin::find(1);

        $fixtureId = FixtureId::where("published_fixtures_id", $admin->published_fixtures_id)->first();
        $fixtureId->published = true;
        $fixtureId->save();

        /*foreach(Subscription::all() as $user){
            $user->paid = false;
            $user->save();
        }*/

        return redirect("/admin_fixtures");
    }

    public function purchase(){
        $user = User::find(Session::get("userid"));
        $subscription = Subscription::where("user_id", $user->id)->first();
        $subscription->paid = true;
        $admin = Admin::find(1);
        $book = Book::find(1);
        
        $user->save();
        
        $book = Book::find(1);

        $subscription->balance -= $book->price;
        $book->revenue += $book->price;
        $subscription->paid = true;
        

        $book->save();
        $subscription->save();
        return redirect("/football_categories");
    }

    public function sellFixturesAccount(){
        $companies = array(
            "MG Sports", "Betway", "Hollywoodbets", "Gbets",
            "Palacebet", "Supabets", "Sportingbet", "Pure Bet",
            "Bet.co.za", "Playa Bets", "Sunbet"
        );
        return view("sell_fixtures_account", [
            "companies" => $companies
        ]);
    }

    public function index($category){
        if(! Session::has("logged")){
            return view("signin");
        }
        $user = User::find(Session::get("userid"));
        $subscription = Subscription::where("user_id", $user->id)->first();
        $admin = Admin::find(1);
        $companies = array(
            "MG Sports", "Betway", "Hollywoodbets", "Gbets",
            "Palacebet", "Supabets", "Sportingbet", "Pure Bet",
            "Bet.co.za", "Playa Bets", "Sunbet"
        );
        $tempHour = 0;
        $tempDay = 0;
        $tempMinutes = 0;

        $fixturesId = FixtureId::where("category", $category)->where("published", true)->first();

        if($fixturesId){
            $user->fixtures_published = true;
            $user->save();

            $fixtures = Fixture::where("published_fixtures_id", $fixturesId->published_fixtures_id)->get();

            foreach($fixtures as $fixture){
                if(intval($fixture->hour) > $tempHour){
                    $tempHour = intval($fixture->hour);
                }
                if(intval($fixture->day) > $tempDay){
                    $tempDay = intval($fixture->day);
                }
                if(intval($fixture->minutes) > $tempMinutes){
                    $tempMinutes = intval($fixture->minutes);
                }
            }
    
            if(intval(date("d")) > $tempDay){
                $user->fixtures_published = false;
                $user->save();
            }else{
                if(intval(date("d")) >= $tempDay &&  intval(date("H")) >= $tempHour && intval(date("i")) >= $tempMinutes){
                    $user->fixtures_published = false;
                    $user->save();
                }
            }
        }else{
            $user->fixtures_published = false;
            $user->save();

            $fixtures = null;
        }
        
        if($user->state == "trial"){
            if((intval(date("d") - $user->signup_day)) > 7){
                $user->state = "unsubscribed";
                $user->save();

                return view("unsubscribed", [
                    "subscription" => $subscription
                ]);
            }

            return view("free_trial_fixtures", [
                "fixtures" => $fixtures,
                "admin" => $admin,
                "user" => $user,
                "fixturesId" => $fixturesId,
                "subscription" => $subscription
            ]);
        }elseif($user->state == "subscribed"){
            return view("fixtures", [
                "fixtures" => $fixtures,
                "admin" => $admin,
                "user" => $user,
                "fixturesId" => $fixturesId,
                "subscription" => $subscription
            ]);
        }
    }

    public function filter($fixtureId){
        $admin = Admin::find(1);
        $fixturesId = FixtureId::where("published_fixtures_id", $fixtureId)->first();
        return view("admin_fixtures", [
            "fixtures" => Fixture::where("published_fixtures_id", $fixtureId)->get(),
            "admin" => $admin,
            "fixtureId" => $fixtureId,
            "fixturesId" => $fixturesId,
            "fixturesIdClass" => new FixtureId(),
        ]);
    }
    
    public function adminFixtures(){
        $admin = Admin::find(1);
        $fixturesId = FixtureId::where("published_fixtures_id", $admin->published_fixtures_id)->first();
        return view("admin_fixtures", [
            "fixtures" => Fixture::where("published_fixtures_id", $admin->published_fixtures_id)->get(),
            "admin" => $admin,
            "fixtureId" => $admin->published_fixtures_id,
            "fixturesId" => $fixturesId,
            "fixturesIdClass" => new FixtureId(),
        ]);
    }
}
