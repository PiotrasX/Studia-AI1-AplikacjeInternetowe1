<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\TripController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('countries', CountryController::class);
Route::apiResource('trips', TripController::class);
