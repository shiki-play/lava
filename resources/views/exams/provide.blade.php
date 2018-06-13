@extends('layouts.default')
@section('title', '准备考试题目')
@section('content')
  <div class="col-md-offset-2 col-md-8">
      <h5>添加新题</h5>
          <div class="panel-body">
              @include('shared._errors')
              <form method="POST" action=" {{route('exam.provide') }}">
                  {{ csrf_field() }}
                  <input type="hidden" name='exam_id' value="1">
                  <div class="form-group">
                      <label for="quiz_id">题号：</label>
                      <input type="text" name="quiz_id" class="form-control" value="{{ old('quiz_id') }}">
                  </div>

                  <div class="form-group">
                      <label for="content">题目：</label>
                      <input type="text" name="content" class="form-control" value="{{ old('content') }}">
                  </div>

                  <div class="form-group">
                      <label for="section_1">选项１：</label>
                      <input type="text" name="section_1" class="form-control" value="{{ old('section_1') }}">
                  </div>

                  <div class="form-group">
                      <label for="section_2">选项2：</label>
                      <input type="text" name="section_2" class="form-control" value="{{ old('section_2') }}">
                  </div>

                  <div class="form-group">
                      <label for="section_3">选项3：</label>
                      <input type="text" name="section_3" class="form-control" value="{{ old('section_3') }}">
                  </div>

                  <div class="form-group">
                      <label for="section_4">选项4：</label>
                      <input type="text" name="section_4" class="form-control" value="{{ old('section_4') }}">
                  </div>

                  <div class="form-group">
                      <label for="answer">答案：</label>
                      <input type="text" name="answer" class="form-control" value="{{ old('answer') }}">
                  </div>

                  <button type="submit" class="btn btn-primary">注册</button>
              </form>
          </div>

      <table class="bordered">
    <tr>
        <th>题号</th>
        <th>问题</th>
        <th>ａ</th>
        <th>b</th>
        <th>c</th>
        <th>d</th>
        <th>答案</th>
        <th>修改</th>
        <th>删除</th>
    </tr>
      @foreach ($exams as $exam)
        <tr>

            <td>{{ $exam->quiz_id }}</td>
            <td>{{ $exam->content }}</td>
            <td>{{ $exam->section_1 }}</td>
            <td>{{ $exam->section_2 }}</td>
            <td>{{ $exam->section_3 }}</td>
            <td>{{ $exam->section_4 }}</td>
            <td>{{ $exam->answer }}</td>
            <td>  <a href="{{ route('exam.edit',$exam->id) }}">更新</a></td>
            <td>
                @can('destroy', $user)
                <form action="{{ route('exam.destroy', $exam->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-sm btn-danger delete-btn">删除</button>
                </form></td>
            @endcan
        </tr>
      @endforeach
      </table>

  </div>
  <link rel="stylesheet" href="/css/table.css">


@stop


