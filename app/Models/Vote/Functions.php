<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 2019-08-08
 * Time: 14:22
 */

namespace App\Models\Vote;

use App\Models\Fingerprint\Fingerprint;
use App\Models\Identifier\Identifier;
use App\Models\User\User;

trait Functions
{
    /**
     * @param User $user
     * @return Identifier
     */
    public function addUser(User $user)
    {
        return $this->identifier()->create([
            'identifierable_id'   => $user->id,
            'identifierable_type' => 'user'
        ]);
    }

    /**
     * @param Fingerprint $fingerprint
     * @return Identifier
     */
    public function addFingerprint(Fingerprint $fingerprint)
    {
        return $this->identifier()->create([
            'identifierable_id'   => $fingerprint->id,
            'identifierable_type' => 'fingerprint'
        ]);
    }
}
