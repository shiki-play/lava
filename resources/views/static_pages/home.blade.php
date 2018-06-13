@extends('layouts.default')
@section('content')
@if(Auth::check())
<div class="row">
    <div class="col-md-8">
    <section class="status_form">
        @include('shared._status_form')
    </section>
    <section>
        <a href="{{ route('exam.provide') }}" class="col-md-4">准备考试</a>
        <a href="{{ route('exam.answer') }}" class="col-md-4">去考试</a>
    </section>
        <h3>微博列表</h3>
        @include('shared._feed')
    </div>
    <aside class="col-md-4">
        <section class="user_info">
            @include('shared._user_info', ['user' => Auth::user()])
        </section>
        <section class="stats">
          @include('shared._stats', ['user' => Auth::user()])
        </section>
    </aside>
</div>

@else
<div class="jumbotron">
    <h1>Hello Laravel</h1>
    <p class="lead">
        What you see is <a href="{{ route('home') }}">Laravel 神奇围脖</a> 的项目主页。
    </p>
    <p>三分间でさようならはじめまして~~♪♪♪♪♪♪</p>
    <p>
        <a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">
            现在注册
        </a>
    </p>
</div>
    @endif
@stop