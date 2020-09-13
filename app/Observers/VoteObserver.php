<?php

namespace App\Observers;

use App\Events\VoteCreated;
use App\Models\Vote\Vote;

class VoteObserver
{
    /**
     * Handle the vote "created" event.
     *
     * @param  \App\Models\Vote\Vote  $vote
     * @return void
     */
    public function created(Vote $vote)
    {
        event(new VoteCreated($vote));
    }

    /**
     * Handle the vote "updated" event.
     *
     * @param  \App\Models\Vote\Vote  $vote
     * @return void
     */
    public function updated(Vote $vote)
    {
        //
    }

    /**
     * Handle the vote "deleted" event.
     *
     * @param  \App\Models\Vote\Vote  $vote
     * @return void
     */
    public function deleted(Vote $vote)
    {
        //
    }

    /**
     * Handle the vote "restored" event.
     *
     * @param  \App\Models\Vote\Vote  $vote
     * @return void
     */
    public function restored(Vote $vote)
    {
        //
    }

    /**
     * Handle the vote "force deleted" event.
     *
     * @param  \App\Models\Vote\Vote  $vote
     * @return void
     */
    public function forceDeleted(Vote $vote)
    {
        //
    }
}
