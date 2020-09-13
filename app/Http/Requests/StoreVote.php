<?php

namespace App\Http\Requests;

use App\Jobs\CanVote;
use App\Models\Poll\Poll;
use App\Rules\PollOption;
use Illuminate\Foundation\Http\FormRequest;

class StoreVote extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $poll = $this->poll();

        $eligible = CanVote::dispatchNow($this, $poll);

        return $eligible;
    }

    /**
     * @return Poll
     */
    private function poll() : Poll
    {
        return $this->route('poll');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'options'     => 'required|array|min:1',
            'options.*'   => ['integer', new PollOption($this->poll())],
            'fingerprint' => 'required|string'
        ];
    }
}
