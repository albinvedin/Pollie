<?php

namespace App\Http\Middleware;

use App\Models\Poll\Poll;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VerifyAccessCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $poll = $this->poll($request);

        $identifier = "access_code_{$poll->id}";

        if ($poll->accessCode &&
            (
                $poll->accessCode->code !== $request->get('access_code') &&
                $poll->accessCode->code !== Session::get($identifier)
            )
        ) {
            if ($request->has('access_code')) {
                $message = 'Incorrect Access Code';
                return redirect()->route('votes.authorize', $poll)->withErrors($message);
            } else {
                return redirect()->route('votes.authorize', $poll);
            }
        }

        if ($poll->accessCode && !Session::has($identifier)) {
            Session::put($identifier, $poll->accessCode->code);
        }

        return $next($request);
    }

    /**
     * @param Request $request
     * @return Poll
     */
    private function poll(Request $request) : Poll
    {
        return $request->route('poll');
    }
}
