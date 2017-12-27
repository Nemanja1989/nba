@extends('layouts.master')

@section('title')
    Team
@endsection()

@section('content')

    <div class="content">

        <div class="jumbotron">
            <h1>{{ $team->name }}</h1>
            <p> City: {{$team->city}} | {{ $team->address}} | {{$team->email}} </p>
        </div>

        <h2>List of Comments:</h2>


        @foreach ($team->comments as $comment)
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$comment->user->name}}</h3>
                    <p></p>
                    <p>{{$comment->content}}</p>
                </div>

            </div>
        @endforeach



            <h2>List of Players:</h2>


        @foreach ($team->players as $player)
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$player->first_name}} {{$player->last_name}}</h3>
                    <p></p>
                    <p><a href="{{route('player', ['id' => $player->id])}}" class="btn btn-primary btn-lg">Player Info</a></p>
                </div>

            </div>
        @endforeach

    </div>


@endsection()
