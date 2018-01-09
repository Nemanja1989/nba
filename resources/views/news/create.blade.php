@extends('layouts.master')

@section('content')
    <h2 class="blog-post-title">Create news</h2>

        <form method="POST" action="{{ route('newsStore') }}">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title"/>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content"></textarea>
            </div>

            <div class="form-group">
                @foreach($teams as $team)
                    <div class="checkbox">
                        <label><input type="checkbox" value="{{ $team->id }}" name="teams[]">{{ $team->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
@endsection