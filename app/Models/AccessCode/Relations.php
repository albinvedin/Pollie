<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 2019-08-06
 * Time: 12:33
 */

namespace App\Models\AccessCode;

use App\Models\Poll\Poll;

trait Relations
{
    /**
     * @return mixed
     */
    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }
}
