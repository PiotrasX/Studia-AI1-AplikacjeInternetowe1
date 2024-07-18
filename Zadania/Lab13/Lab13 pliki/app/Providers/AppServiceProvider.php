<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Trip;
use App\Policies\TripPolicy;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Trip::class => TripPolicy::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // JsonResource::withoutWrapping();
        Gate::define('is-admin', function ($user) {
            return Auth::check() && Auth::user()->role->name == 'admin';
        });
    }
}
