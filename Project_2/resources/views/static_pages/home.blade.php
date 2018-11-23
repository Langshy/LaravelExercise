{{--子视图通过进程父类视图，渲染内容--}}
{{--@extends('layouts.default')--}}
{{--@section('title','主页')--}}
{{--@section('content')--}}
    {{--<h1>主页</h1>--}}
{{--@stop--}}
@extends('layouts.default')

@section('content')
    <div class="jumbotron">
        <h1>Hello Laravel</h1>
        <p class="lead">
            你现在所看到的是<a href="http://www.chenrq.cc">CRQ-Langshy</a>
        </p>
        <p>
            一切，将从这里开始
        </p>
        <p>
            <a class="btn btn-lg btn-success" href="#" role="button">现在注册</a>
        </p>
    </div>

    @stop