<?php

namespace App\Providers;

use App\Models\Vote\Vote;
use App\Observers\VoteObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Vote::observe(VoteObserver::class);
    }
}
