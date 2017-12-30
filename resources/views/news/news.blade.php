@extends('layouts.master')

@section('title')
    Teams
@endsection()

@section('content')

    <div class="content">
        <div class="title m-b-md">
            News
        </div>
        {{ $news->links() }}

        @foreach($news as $oneNews)
            <div class="jumbotron">
                <h3><a href= {{route('oneNews', ['id' => $oneNews->id])}}> {{$oneNews->title}}</a></h3>
                <h4>Writen by: {{$oneNews->user->name}}</h4>
                <p>{{$oneNews->content}}</p>
            </div>

        @endforeach

        {{ $news->links() }}

    </div>
@endsection()