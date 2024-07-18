<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::inRandomOrder()->limit(4)->get();
        return view('trips.index', ['trips' => $trips]);
    }

    public function show($id)
    {
        $trip = Trip::findOrFail($id);
        return view('trips.show', ['trip' => $trip]);
    }
}
