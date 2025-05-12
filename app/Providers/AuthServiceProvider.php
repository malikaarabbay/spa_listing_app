<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Listing;
use App\Policies\ListingPolicy;
use Illuminate\Notifications\DatabaseNotification;
use App\Policies\NotificationPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Listing::class => ListingPolicy::class,
        DatabaseNotification::class => NotificationPolicy::class,    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
