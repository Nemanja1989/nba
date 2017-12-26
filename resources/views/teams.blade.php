@extends('layouts.master')

@section('title')
    Movie
@endsection()

@section('content')

    <div class="content">
        <div class="title m-b-md">
            Teams
        </div>

            @foreach($teams as $team)
                <div class="jumbotron">
                    <p><a href= {{route('team', ['id' => $team->id])}}> {{ $team->name }} </a></p>
                    <p>{{ $team->city }} | {{ $team->address }}</p>
                    <p><a href="{{route('team', ['id' => $team->id])}}" class="btn btn-primary btn-lg">Read more</a></p>
                </div>

            @endforeach

    </div>
@endsection()

