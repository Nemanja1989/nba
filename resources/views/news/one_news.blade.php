@extends('layouts.master')

@section('title')
    Teams
@endsection()

@section('content')

    <div class="content">
        <div class="title m-b-md">
            One News
        </div>

        <div class="jumbotron">
            <h3><a href= {{route('oneNews', ['id' => $oneNews->id])}}> {{$oneNews->title}}</a></h3>
            <h4>Writen by: {{$oneNews->user->name}}</h4>
            <p>{{$oneNews->content}}</p>
        </div>
        <div class="title m-b-md">
            <h1>Teams that have this news:</h1>
        </div>

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
    </div>

@endsection()