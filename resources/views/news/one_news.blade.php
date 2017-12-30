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
    </div>

@endsection()