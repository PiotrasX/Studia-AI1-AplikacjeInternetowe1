<?php

use App\Http\Controllers\TripController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(TripController::class)->group(function () {
    Route::get('/trips', 'index')->name('trips.index');
    Route::get('/trips/{id}', 'show')->name('trips.show');
    Route::put('/trips/{id}', 'update')->name('trips.update');
    Route::get('/trips/{id}/edit', 'edit')->name('trips.edit');
    Route::get('/trips/{trip}/edit', 'edit')->name('trips.edit');
    Route::delete('/trips/{trip}', 'destroy')->name('trips.destroy');
});

Route::resource('countries', CountryController::class);
