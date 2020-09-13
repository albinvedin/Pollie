<?php

namespace App\Events;

use App\Models\Vote\Vote;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class VoteCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $vote;

    /**
     * Create a new event instance.
     *
     * @param Vote $vote
     */
    public function __construct(Vote $vote)
    {
        $this->vote = $vote;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $channelName = "poll.{$this->vote->voteable->id}.votes";
        return new Channel($channelName);
    }
}
