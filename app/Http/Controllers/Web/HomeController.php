<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Jobs\FetchFresh;
use App\Jobs\FetchTrending;

class HomeController extends Controller
{
    public function __invoke()
    {
        $trending = FetchTrending::dispatchNow(10);
        $fresh    = FetchFresh::dispatchNow(10);

        return view('home.index', compact('trending', 'fresh'));
    }
}
