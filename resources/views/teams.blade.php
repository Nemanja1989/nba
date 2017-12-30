@extends('layouts.master')

@section('title')
    Teams
@endsection()

@section('content')

    <div class="content">
        <div class="title m-b-md">
            Teams
        </div>

        {{ $teams->links() }}
        @foreach($teams as $team)
            <div class="jumbotron">
                <p>
                    <a href= {{route('team', ['id' => $team->id])}}> {{ $team->name }} </a> |
                    <a href= {{route('teamNews', ['id' => $team->id])}}> Team News </a>
                </p>
                <p>{{ $team->city }} | {{ $team->address }}</p>
                <p><a href="{{route('team', ['id' => $team->id])}}" class="btn btn-primary btn-lg">Read more</a></p>
            </div>
        @endforeach
        {{ $teams->links() }}

    </div>
@endsection()

