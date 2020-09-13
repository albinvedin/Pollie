<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePoll;
use App\Models\Poll\Poll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PollController extends Controller
{
    /**
     * PollController constructor.
     */
    public function __construct()
    {
        $this->middleware('access', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('poll.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poll.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePoll $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePoll $request)
    {
        $fillables = (new Poll)->getFillable();
        $data = $request->only($fillables);
        $poll = Poll::create($data);
        $poll->addOptions($request->get('options'));
        $pass = [];
        if ($request->get('private')) {
            $code = Str::random(20);
            $poll->addAccessCode($code);
            Session::put("access_code_{$poll->id}", $code);
            $pass['code'] = $code;
        }

        return redirect()->route('polls.show', $poll)->with($pass);
    }

    /**
     * Display the specified resource.
     *
     * @param Poll $poll
     * @return \Illuminate\Http\Response
     */
    public function show(Poll $poll)
    {
        return view('poll.show', compact('poll'));
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
