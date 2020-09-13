<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 2019-08-08
 * Time: 13:16
 */

namespace App\Models\Fingerprint;

use App\Models\Identifier\Identifier;

trait Relations
{
    /**
     * @return mixed
     */
    public function identifier()
    {
        return $this->morphOne(Identifier::class, 'identifierable');
    }
}
