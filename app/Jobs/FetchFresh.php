<?php

namespace App\Jobs;

use App\Models\Poll\Poll;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\Dispatchable;

class FetchFresh
{
    use Dispatchable;

    private $count;
    private $after;

    /**
     * Create a new job instance.
     *
     * @param int $count
     * @param Carbon $after
     */
    public function __construct(int $count, Carbon $after = null)
    {
        $this->count = $count;
        $this->after = $after ?? now()->subMonths(1);
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function handle()
    {
        $query = Poll::query();

        $query->doesntHave('accessCode');

        $query->orderBy('created_at', 'DESC');

        $query->take($this->count);

        return $query->get();
    }
}
