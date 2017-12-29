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

        <form method="POST" action="{{ route('commentStore') }}">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="body">Comments</label>
                <textarea class="form-control" id="content" name="content"></textarea>

            </div>
            <input type="hidden" name="team_id" value="{{$team->id}}">
            <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        @if($errors->has('content'))
            @foreach($errors->get('content') as $error)
                <div class="alert alert-dismissible alert-danger mt-3">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ $error }}
                </div>
            @endforeach
        @endif()

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
