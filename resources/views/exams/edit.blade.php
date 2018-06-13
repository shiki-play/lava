@extends('layouts.default')
@section('title', '更新题库')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>更新题库</h5>
            </div>
            <div class="panel-body">

                @include('shared._errors')


                <form method="POST" action="{{ route('exam.update', $exam->id )}}">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="quiz_id">题号：</label>
                        <input type="text" name="quiz_id" class="form-control" value="{{ $exam->quiz_id }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="content">题干：</label>
                        <input type="text" name="content" class="form-control" value="{{ $exam->content }}">
                    </div>

                    <div class="form-group">
                        <label for="section_1">选项1：</label>
                        <input type="text" name="section_1" class="form-control" value="{{ $exam->section_1 }}" >
                    </div>

                    <div class="form-group">
                        <label for="section_2">选项2：</label>
                        <input type="text" name="section_2" class="form-control" value="{{ $exam->section_2 }}" >
                    </div>

                    <div class="form-group">
                        <label for="section_3">选项3：</label>
                        <input type="text" name="section_3" class="form-control" value="{{ $exam->section_3 }}" >
                    </div>

                    <div class="form-group">
                        <label for="section_4">选项4：</label>
                        <input type="text" name="section_4" class="form-control" value="{{ $exam->section_4 }}" >
                    </div>

                    <div class="form-group">
                        <label for="answer">答案：</label>
                        <input type="text" name="answer" class="form-control" value="{{ $exam->answer }}" >
                    </div>





                    <button type="submit" class="btn btn-primary">更新</button>
                </form>
            </div>
        </div>
    </div>
@stop
