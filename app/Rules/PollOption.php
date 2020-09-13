<?php

namespace App\Rules;

use App\Models\Poll\Poll;
use Illuminate\Contracts\Validation\Rule;

class PollOption implements Rule
{
    private $poll;

    /**
     * Create a new rule instance.
     *
     * @param Poll $poll
     * @param int $id
     */
    public function __construct(Poll $poll)
    {
        $this->poll = $poll;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->poll->pollOptions()->where('id', $value)->count() > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Incorrect option ID';
    }
}
