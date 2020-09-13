@extends('app')

@section('content')
    <div class="page-header section-dark" style="background-image: url('/images/front-page.jpg')">
        <div class="filter"></div>
        <div class="content-center">
            <div class="container">
                <div class="title-brand">
                    <a href="{{ route('polls.create') }}" class="btn btn-success">
                        Create Poll
                    </a>
                </div>
                <h2 class="presentation-subtitle text-center">
                    Create your very own poll with {{ config('app.name') }}!
                </h2>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @include('poll.partials.card', ['title' => 'Trending', 'collection' => $trending])
            </div>
            <div class="col-md-6">
                @include('poll.partials.card', ['title' => 'Fresh', 'collection' => $fresh])
            </div>
        </div>
    </div>
@endsection
