<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fixture;
use App\Models\User;
use App\Models\Book;
use App\Models\FixtureId;
use App\Models\Subscription;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        $fixturesId = new FixtureId();
        return view('admin', [
            "fixturesId" => $fixturesId,
            "users" => new User(),
            "book" => Book::find(1),
        ]);
    }
}
