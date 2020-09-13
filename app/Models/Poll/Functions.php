<?php
/**
 * Created by PhpStorm.
 * User: Albin
 * Date: 2019-08-06
 * Time: 18:59
 */

namespace App\Models\Poll;

use App\Models\Fingerprint\Fingerprint;
use App\Models\PollOption\PollOption;
use App\Models\User\User;
use App\Models\Vote\Vote;
use Illuminate\Support\Collection;

trait Functions
{
    /**
     * @param string $text
     */
    public function addOption(string $text)
    {
        $this->pollOptions()->create([
            'text' => $text
        ]);
    }

    /**
     * @param array $texts
     */
    public function addOptions(array $texts)
    {
        foreach ($texts as $text) {
            $this->addOption($text);
        }
    }

    /**
     * @param string $code
     * @return mixed
     */
    public function addAccessCode(string $code)
    {
        return $this->accessCode()->create([
            'code' => $code
        ]);
    }

    /**
     * @param Fingerprint $fingerprint
     * @return bool
     */
    public function containsFingerprintVote(Fingerprint $fingerprint)
    {
        return $this->votes()->whereIdentifier($fingerprint->fingerprint, 'fingerprint')->count() > 0;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function containsUserVote(User $user)
    {
        return $this->votes()->whereIdentifier($user->id, 'user', 'id')->count() > 0;
    }

    /**
     * @param PollOption $pollOption
     * @return Vote
     */
    public function addVote(PollOption $pollOption)
    {
        return $this->votes()->create([
            'voteable_id'   => $pollOption->id,
            'voteable_type' => 'poll_option'
        ]);
    }

    /**
     * @param Collection $pollOptions
     * @return Collection
     */
    public function addVotes(Collection $pollOptions)
    {
        return $pollOptions->map(function (PollOption $pollOption) {
            return $this->addVote($pollOption);
        });
    }
}
