<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/signout', function () {
    Session::flush();
    return redirect('/');
});

Route::get('/signin', function () {
    return view('signin');
});

Route::get('/signup', function () {
    return view('signup_basic_info');
});

Route::get('/confirm', function () {
    return view('confirm');
});

Route::get('/', function () {
    return view('welcome');
});

Route::post('/signup/info', [App\Http\Controllers\SignupController::class, "info"]);
Route::post('/signup/banking/submit', [App\Http\Controllers\SignupController::class, "banking"]);
Route::post('/signup/pin', [App\Http\Controllers\SignupController::class, "pin"]);
Route::get('/account', [App\Http\Controllers\ProfileController::class, "index"]);
Route::post('/fixture/{fixtureId}/set', [App\Http\Controllers\FixtureController::class, "fixture"]);
Route::post('/fixture/{fixtureId}/add_prediction', [App\Http\Controllers\FixtureController::class, "addPrediction"]);
Route::get('/admin_fixtures', [App\Http\Controllers\FixtureController::class, "adminFixtures"]);
Route::get('/fixtures/{category}', [App\Http\Controllers\FixtureController::class, "index"]);
Route::get('/accounts', [App\Http\Controllers\AccountController::class, "index"]);
Route::post('/signin/submit', [App\Http\Controllers\SigninController::class, "signin"]);
Route::get('/free_trial_fixtures', [App\Http\Controllers\FixtureController::class, "freeTrial"]);
Route::post('/publish/{fixtureToPublishId}', [App\Http\Controllers\FixtureController::class, "publishFixtures"]);
Route::get('/subscription', [App\Http\Controllers\SubscriptionController::class, "index"]);
Route::get('/user/{id}', [App\Http\Controllers\AccountController::class, "viewUser"]);
Route::post('/ticket/activate', [App\Http\Controllers\FixtureController::class, "activateTicket"]);
Route::post('/purchase', [App\Http\Controllers\FixtureController::class, "purchase"]);
Route::post('/delete/{id}', [App\Http\Controllers\FixtureController::class, "deleteFixture"]);
Route::post('/delete/fixtures/{fixtureId}', [App\Http\Controllers\FixtureController::class, "deleteFixtureAll"]);
Route::post('/new_fixture', [App\Http\Controllers\FixtureController::class, "adminFootballCategories"]);
Route::get('/admin_fixtures/{fixtureId}', [App\Http\Controllers\FixtureController::class, "filter"]);
Route::post('/edit/{fixtureId}', [App\Http\Controllers\FixtureController::class, "editFixture"]);
Route::post('/fixture/edit/{fixtureId}/set', [App\Http\Controllers\FixtureController::class, "editFixtureSet"]);
Route::get('/sell_fixtures', [App\Http\Controllers\FixtureController::class, "sellFixturesAccount"]);
Route::get('/fixture/{fixtureId}', [App\Http\Controllers\FixtureController::class, "setupFixture"]);
Route::post('/category/{category}', [App\Http\Controllers\FixtureController::class, "newFixtures"]);
Route::get('/admin', [App\Http\Controllers\AdminController::class, "index"]);
Route::get('/football_categories', [App\Http\Controllers\FixtureController::class, "footballCategories"]);
Route::post('/google_auth', [App\Http\Controllers\SignupController::class, "googleAuth"]);
Route::get('/google_auth_callback', [App\Http\Controllers\SignupController::class, "googleAuthCallback"]);
Route::post('/signup/phone_number', [App\Http\Controllers\SignupController::class, "phoneNumber"]);


