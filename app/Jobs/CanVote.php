<?php

namespace App\Jobs;

use App\Models\Fingerprint\Fingerprint;
use App\Models\Poll\Poll;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;

class CanVote
{
    use Dispatchable;

    private $request;
    private $poll;

    /**
     * Create a new job instance.
     *
     * @param Request $request
     * @param Poll $poll
     */
    public function __construct(Request $request, Poll $poll)
    {
        $this->request = $request;
        $this->poll = $poll;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle() : bool
    {
        if (auth()->check()) {
            $user = auth()->user();

            $eligible = !$this->poll->containsUserVote($user);

            return $eligible;
        } else {
            // TODO: Add more security options, maybe vote with IP?

            $fingerprint = Fingerprint::firstOrCreate($this->request->only('fingerprint'));

            $eligible = !$this->poll->containsFingerprintVote($fingerprint);

            return $eligible;
        }
    }
}
