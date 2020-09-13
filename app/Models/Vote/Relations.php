<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 2019-08-07
 * Time: 17:04
 */

namespace App\Models\Vote;

use App\Models\Identifier\Identifier;

trait Relations
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function voteable()
    {
        return $this->morphTo();
    }

    /**
     * @return mixed
     */
    public function identifier()
    {
        return $this->hasOne(Identifier::class);
    }
}
