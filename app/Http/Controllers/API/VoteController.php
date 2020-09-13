<?php

namespace App\Http\Controllers\API;

use App\Models\Poll\Poll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function show(Request $request, Poll $poll)
    {
        $query = $poll->votes();

        $query->with('voteable:id,text');

        $query->select('poll_options.id', DB::raw('COUNT(*) as count'),'text');

        $query->groupBy('poll_options.id');

        $votes = $query->get();

        $votes = $votes->map(function ($vote) {
            return $vote->only('id', 'count', 'text');
        });

        return $votes;
    }
}
