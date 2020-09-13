<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Poll\Poll;

class AuthorizationController extends Controller
{
    public function __invoke(Poll $poll)
    {
        if (!$poll->accessCode) return redirect()->route('polls.show', $poll);

        return view('authorization.create', compact('poll'));
    }
}
