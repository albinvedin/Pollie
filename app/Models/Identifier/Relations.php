<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 2019-08-08
 * Time: 13:14
 */

namespace App\Models\Identifier;

use App\Models\Vote\Vote;

trait Relations
{
    /**
     * @return mixed
     */
    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }

    /**
     * @return mixed
     */
    public function identifierable()
    {
        return $this->morphTo();
    }
}
