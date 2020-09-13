<?php

namespace App\Jobs;

use App\Models\Fingerprint\Fingerprint;
use App\Models\Vote\Vote;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Collection;

class AddIdentity implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $request;
    private $votes;

    /**
     * Create a new job instance.
     *
     * @param Request $request
     * @param Collection $votes
     */
    public function __construct(Request $request, Collection $votes)
    {
        $this->request = $request;
        $this->votes = $votes;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->votes->each(function (Vote $vote) {
            if (auth()->check()) {
                $vote->addUser(auth()->user());
            } else {
                $fingerprint = Fingerprint::firstOrCreate($this->request->only('fingerprint'));

                $vote->addFingerprint($fingerprint);
            }
        });
    }
}
