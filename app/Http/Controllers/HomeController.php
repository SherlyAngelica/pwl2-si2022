<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checkouts;
use Auth;

class HomeController extends Controller
{
    public function dashboard() {
        $checkouts = checkouts::with('camp')->where('user_id', Auth::id())->get();
        return view ('user.dashboard', [
            "checkouts" => $checkouts
        ]);
    }
}