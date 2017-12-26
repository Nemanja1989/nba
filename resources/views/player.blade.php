@extends('layouts.master')

@section('title')
    Player
@endsection()

@section('content')
    <div class="content">

        <div class="jumbotron">
            <h1><a href="{{route('team', ['id' => $player->team_id])}}" class="btn btn-primary btn-lg">Team Info</a></h1>
            <p> Player data: {{$player->first_name}} | {{ $player->last_name}} | {{$player->email}} </p>
        </div>

    </div>


@endsection()