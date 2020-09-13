@extends('app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center m-0">
                    {{ $poll->question }}
                </h4>

                <br>

                <form method="POST" action="{{ route('votes.store', $poll) }}">
                    @csrf
                    @foreach($poll->pollOptions as $pollOption)
                        @if($poll->multiple_choice)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input name="options[]" class="form-check-input" type="checkbox" value="{{ $pollOption->id }}">
                                    {{ $pollOption->text }}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        @else
                            <div class="form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="options[]" id="radio{{ $pollOption->id }}" value="{{ $pollOption->id }}" {{ $loop->first ? 'checked' : '' }}>
                                    {{ $pollOption->text }}
                                    <span class="form-check-sign"></span>
                                </label>
                            </div>
                        @endif
                    @endforeach

                    <br>

                    <div class="text-center">
                        @can('create', [\App\Models\Vote\Vote::class, $poll])
                            <button type="submit" class="btn btn-lg btn-primary">
                                Vote
                            </button>
                        @else
                            <a href="javascript:void(0);" class="btn btn-lg btn-light" data-placement="top" data-toggle="tooltip" data-title="You've already voted on this poll" disabled>
                                Vote
                            </a>
                        @endcan
                    </div>
                </form>

                <br>

                <div class="text-center">
                    <a href="{{ route('polls.show', $poll) }}" class="btn btn-sm btn-info">
                        View Results
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
