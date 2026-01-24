<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome() {
        $tours = \App\Models\Tour::all();
        return view('welcome', ['tours' => $tours]);
    }

    public function registration() {
        return view('registration');
    }

    public function authorization() {
        return view('authorization');
    }
}
