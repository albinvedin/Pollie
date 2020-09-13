<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVote;
use App\Jobs\AddIdentity;
use App\Models\Poll\Poll;
use App\Models\PollOption\PollOption;
use App\Models\Vote\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * VoteController constructor.
     */
    public function __construct()
    {
        $this->middleware('access', ['only' => ['create', 'store']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Poll $poll)
    {
        return view('vote.create', compact('poll'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVote $request
     * @param Poll $poll
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreVote $request, Poll $poll)
    {
        $pollOptions = collect($request->get('options'))->map(function ($optionId) {
            return PollOption::find($optionId);
        });

        $votes = $poll->addVotes($pollOptions);

        AddIdentity::dispatchNow($request, $votes);

        return redirect()->route('polls.show', $poll);
    }

    /**
     * Display the specified resource.
     *
     * @param Vote $vote
     * @return void
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
