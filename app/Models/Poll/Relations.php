<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 2019-08-06
 * Time: 12:34
 */

namespace App\Models\Poll;

use App\Models\AccessCode\AccessCode;
use App\Models\PollOption\PollOption;
use App\Models\Vote\Vote;

trait Relations
{
    /**
     * @return mixed
     */
    public function accessCode()
    {
        return $this->hasOne(AccessCode::class);
    }

    /**
     * @return mixed
     */
    public function pollOptions()
    {
        return $this->hasMany(PollOption::class);
    }

    /**
     * @return mixed
     */
    public function votes()
    {
        return $this->hasManyThrough(Vote::class, PollOption::class, 'poll_id', 'voteable_id');
    }
}
