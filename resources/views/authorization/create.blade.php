@extends('app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('votes.create', $poll) }}">
                    @csrf

                    <h4 class="card-title">
                        This poll is <strong>private</strong>
                    </h4>

                    <h6 class="card-subtitle mb-2 text-muted">
                        You'll have to enter the correct Access Code to get access
                    </h6>

                    <div class="form-group">
                        <label>
                            Access Code
                        </label>
                        <input name="access_code" class="form-control"/>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary">
                            Authorize
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
