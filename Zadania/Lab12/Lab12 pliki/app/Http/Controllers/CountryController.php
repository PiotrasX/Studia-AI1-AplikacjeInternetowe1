<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\CountryResource;
use App\Http\Resources\CountryCollection;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new CountryCollection(Country::all()); // 200
        // return new CountryCollection(Country::with('trips')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request) // 422
    {
        return new CountryResource(Country::create($request->validated()));  // 201
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country) // 404
    {
        return new CountryResource($country); // 200
        // return new CountryResource($country->loadMissing('trips'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country) // 422, 404
    {
        $country->update($request->validated());
        return new CountryResource($country->refresh()); // 200
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country) // 404
    {
        if ($country->trips()->exists()) abort(400, "Nie można usunąć kraju, w którym odbywają się wycieczki!"); // 400
        return $country->delete() ? response()->json(null, 204) : abort(404); // 204, 404
    }
}
