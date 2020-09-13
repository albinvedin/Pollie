@extends('app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                @if(session()->has('code'))
                    <div class="alert alert-info" role="alert">
                        <i class="fa fa-key"></i>
                        Access Code: <strong class="copyable">{{ session()->get('code') }}</strong>
                    </div>
                @endif

                <h4 class="m-0">
                    {{ $poll->question }}
                </h4>

                <hr>

                <vote-charts :poll="{{ $poll }}"></vote-charts>

                <hr>

                <div>
                    <div class="text-center">
                        <h4 class="m-0">
                            Information
                        </h4>
                    </div>
                    <div class="col-md-4 mx-auto p-0">
                        <hr>
                    </div>
                    <p class="m-0">
                        This poll was created {{ $poll->created_at->diffForHumans() }}
                    </p>

                    <p class="m-0">
                        This poll is {{ $poll->accessCode ? 'private' : 'public' }}
                    </p>

                    @if($poll->starts_at)
                        <p class="m-0">
                            This poll starts {{ $poll->starts_at->diffForHumans() }}
                        </p>
                    @endif

                    @if($poll->ends_at)
                        <p class="m-0">
                            This poll ends {{ $poll->ends_at->diffForHumans() }}
                        </p>
                    @endif

                    <p class="m-0">
                        This poll has {{ $poll->pollOptions()->count() }} different options
                    </p>

                    <p class="m-0">
                        @php($voteCount = $poll->votes()->count())
                        This poll has {{ $voteCount }} {{ $voteCount === 1 ? 'vote' : 'votes' }}
                    </p>
                </div>

                <hr>

                <div class="text-center">
                    <a href="{{ route('votes.create', $poll) }}" class="btn btn-info">
                        Vote
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
