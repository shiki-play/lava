@extends('layouts.default')
@section('title', '开始考试')
@section('content')
    @if(isset($score))
    <p>你的成绩是{{ $score }}分</p>
    @else
<p>做出你的选择</p>
  <form method="post" action="{{ route('exam.answer') }}">
      {{ csrf_field() }}
    @foreach ($exams as $exam)
<p>{{ $exam->quiz_id }}: {{ $exam->content }}</p>

<select name="{{ $exam->quiz_id }}">
    <option value="1">{{ $exam->section_1 }}</option>
    <option value="2">{{ $exam->section_2 }}</option>
    <option value="3">{{ $exam->section_3 }}</option>
    <option value="4">{{ $exam->section_4 }}</option>

</select>
    @endforeach
      <br>
        <button type="submit" class="btn btn-primary">提交</button>
  </form>
    @endif
@stop



