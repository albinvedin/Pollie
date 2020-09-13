@extends('app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    Create Poll
                </h4>
                <hr>
                @include('poll.partials.form')
            </div>
        </div>
    </div>
@endsection
