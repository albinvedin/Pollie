<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 2019-08-06
 * Time: 13:16
 */

namespace App\Models\PollOption;

use App\Models\Poll\Poll;
use App\Models\Vote\Vote;

trait Relations
{
    /**
     * @return mixed
     */
    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    /**
     * @return mixed
     */
    public function votes()
    {
        return $this->morphMany(Vote::class, 'voteable');
    }
}
