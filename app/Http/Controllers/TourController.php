<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        $users = User::all();
        $tours = Tour::all();
        return view('admin.tour', ['cities' => $cities, 'users' => $users, 'tours' => $tours]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'name' => 'required',
//            'description' => 'required',
//            'price' => 'required',
//            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);

        $path = '';

        $tour = new Tour();
        $tour->title = $request -> title;
        $tour->description = $request -> description;
        $tour-> startDate = $request -> startDate;
        $tour-> price = $request -> price;
        $tour -> user_id = $request -> user_id;
        $tour -> city_id = $request -> city_id;

        if ($request->file('img')) {
            $path = $request->file('img')->store('/public/img');
        }

        $tour -> img = '/storage/' . $path;
        $tour -> save();
        return redirect()->route('admin.tour');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query = Tour::query();

        if($request->filled('startDate')) {
            $query->where('startDate', $request->startDate);
        }

        if($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        $tours = $query->paginate()->appends($request->query());
        return view('tours', ['tours' => $tours]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function view(Tour $tour)
    {
        return view('booking', ['tour' => $tour]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tour $tour)
    {

        $path = '';

        $tour->title = $request -> title;
        $tour->description = $request -> description;
        $tour-> startDate = $request -> startDate;
        $tour-> price = $request -> price;
        $tour -> user_id = $request -> user_id;
        $tour -> city_id = $request -> city_id;

        if ($request->file('img')) {
            $path = $request->file('img')->store('/public/img');
        }

        $tour -> img = '/storage/' . $path;
        $tour -> update();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tour $tour)
    {
        $tour->delete();
        return redirect()->back();
    }
}
