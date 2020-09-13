<?php

namespace App\Providers;

use App\Models\Fingerprint\Fingerprint;
use App\Models\PollOption\PollOption;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class MorphServiceProvider extends ServiceProvider
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
        Relation::morphMap([
            'poll_option'  => PollOption::class,
            'fingerprint'  => Fingerprint::class,
        ]);
    }
}
