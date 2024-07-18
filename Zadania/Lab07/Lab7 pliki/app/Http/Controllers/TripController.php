<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateTripRequest;
use App\Models\Country;
use App\Models\Trip;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', [
            'trips' => $trips,
            'randomTrips' => $trips->random(4),
        ]);
    }

    public function create()
    {
        return view('trips.create');
    }

    public function show($id)
    {
        return view('trips.show', [
            'trip' => Trip::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
        $trip = Trip::findOrFail($id);
        $countries = Country::all();
        return view('trips.edit', compact('trip', 'countries'));
    }

    public function update(Request $request, $id)
    {
        $trip = Trip::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:50|unique:trips,name,' . $trip->id,
            'continent' => 'required|string|max:50',
            'period' => 'required|integer|min:1',
            'description' => 'required|string|max:65535',
            'price' => 'required|numeric|min:1',
            'img' => 'sometimes|string|max:255',
            'country_id' => 'required|exists:countries,id'
        ]);
        $trip->update($validatedData);
        return redirect()->route('trips.index');
    }

    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('trips.index');
    }
}
