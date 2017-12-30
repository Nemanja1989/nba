@extends('layouts.master')

@section('title')
    Teams
@endsection()

@section('content')
    <div class="content">
        <div class="title m-b-md">
            <h2>Team {{$team->name}} have this News:</h2>
        </div>
        {{ $teamNews->links() }}

        @foreach($teamNews as $oneTeamNews)
            <div class="jumbotron">
                <h3>{{$oneTeamNews->title}}</h3>
                <h4>Writen by: {{$oneTeamNews->user->name}}</h4>
                <p>{{$oneTeamNews->content}}</p>
            </div>
        @endforeach
        {{ $teamNews->links() }}
    </div>


@endsection()