<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--设置视图title--}}
    <title>@yield('title','Sample App') - Laravel 入门教学</title>
    <link rel="stylesheet" href="{{url('/css/app.css')}}">
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.bootcss.com/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    {{--通用视图，子视图通过继承通用视图将内容显示于@yield('content')之中--}}
    {{--@yield('content')--}}

{{--<header class="navbar navbar-fixed-top navbar-inverse">--}}
    {{--<div class="container">--}}
        {{--<div class="col-md-offset-1 col-md-10">--}}
            {{--<a href="{{url('/')}}" id="logo">Sample App</a>--}}
            {{--<nav>--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--<li><a href="{{url('/help')}}">帮助</a></li>--}}
                    {{--<li><a href="#">登录</a></li>--}}
                {{--</ul>--}}
            {{--</nav>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</header>--}}
    @include('layouts._header')
<div class="container">
    <div class="col-md-offset-1 col-md-10">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
    </div>
</div>
</body>
</html>