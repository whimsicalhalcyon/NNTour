<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome() {
        $tours = \App\Models\Tour::all();
        $cities = \App\Models\City::all();
        return view('welcome', ['tours' => $tours, 'cities' => $cities]);
    }

    public function registration() {
        return view('registration');
    }

    public function authorization() {
        return view('authorization');
    }

}
