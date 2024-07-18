<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Http\Resources\TripCollection;
use App\Http\Resources\TripResource;
use Illuminate\Support\Facades\Gate;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new TripCollection(Trip::all()); // 200
        // return new TripCollection(Trip::paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTripRequest $request) // 422
    {
        return new TripResource(Trip::create($request->validated())); // 201
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip) // 404
    {
        return new TripResource($trip); // 200
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTripRequest $request, Trip $trip) // 422, 404
    {
        $trip->update($request->validated());
        return new TripResource($trip->refresh()); // 200
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip) // 404
    {
        Gate::authorize('delete', $trip);
        return $trip->delete() ? response()->json(['message' => 'Wycieczka usunięta!'], 204) : abort(404, "Błąd przy usuwaniu wycieczki!"); // 204, 404
    }
}
