<?php

namespace App\Policies;

use App\Jobs\CanVote;
use App\Models\Poll\Poll;
use App\Models\User\User;
use App\Models\Vote\Vote;
use Illuminate\Auth\Access\HandlesAuthorization;

class VotePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any votes.
     *
     * @param  \App\Models\User\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the vote.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\Vote\Vote  $vote
     * @return mixed
     */
    public function view(User $user, Vote $vote)
    {
        //
    }

    /**
     * Determine whether the user can create votes.
     *
     * @param  \App\Models\User\User $user
     * @param Poll $poll
     * @return mixed
     */
    public function create(?User $user, Poll $poll)
    {
        $eligible = CanVote::dispatchNow(request(), $poll);
        return $eligible;
    }

    /**
     * Determine whether the user can update the vote.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\Vote\Vote  $vote
     * @return mixed
     */
    public function update(User $user, Vote $vote)
    {
        //
    }

    /**
     * Determine whether the user can delete the vote.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\Vote\Vote  $vote
     * @return mixed
     */
    public function delete(User $user, Vote $vote)
    {
        //
    }

    /**
     * Determine whether the user can restore the vote.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\Vote\Vote  $vote
     * @return mixed
     */
    public function restore(User $user, Vote $vote)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the vote.
     *
     * @param  \App\Models\User\User  $user
     * @param  \App\Models\Vote\Vote  $vote
     * @return mixed
     */
    public function forceDelete(User $user, Vote $vote)
    {
        //
    }
}
