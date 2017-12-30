<!doctype html>
<html lang="en">
<head>

    <title>@yield('title')</title>
    <link rel="stylesheet" href="/imdb/public/css/app.css" />


</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('teams') }}">NBA</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('teams') }}">teams</a></li>
                <li><a href="{{ route('news') }}">news</a></li>

                <!-- if loged in you don't need to register -->
                @if (!Auth::check())
                    <li><a href="{{ route('register') }}">Register User</a></li>
                @endif
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">

                @if (!Auth::check())
                    <li><a href="{{ route('login') }}">Login</a></li>
                @endif
                @if (Auth::check())
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>


<!-- popuni specificno svaka stranica -->
<div class="container">
    @if($message = session('messageError'))
        <div class="alert alert-danger" style="background-color: #ce8483">{{$message}}</div>
    @endif
    @if($message = session('messageSuccess'))
        <div class="alert alert-success">{{$message}}</div>
    @endif
    @yield('content')
</div>

<!--js na kraj body   -->
<script src="/imdb/public/js/app.js"></script>
</body>
</html>