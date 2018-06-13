<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Exam;
use App\Models\User;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>['answer','result']
        ]);
    }

    public function provide(User $user){
       $exams = Exam::all();
   	return view('exams.provide',compact('exams','user'));
   }
   public function store(Request $request){
       $this->validate($request,[
           'quiz_id'=>'required|max:100|Numeric|unique:exams',
           'content'=>'required|max:50',
           'section_1'=>'required|max:50',
           'section_2'=>'required|max:50',
           'section_3'=>'required|max:50',
           'section_4'=>'required|max:50',
            'answer'=>'in:1,2,3,4',
       ]);

       $exam = Exam::create([
           'exam_id'=>'1',
           'quiz_id'=>$request->quiz_id,
           'content'=>$request->content,
           'section_1'=>$request->section_1,
           'section_2'=>$request->section_2,
           'section_3'=>$request->section_3,
           'section_4'=>$request->section_4,
           'answer'=>$request->answer,
       ]);

   		return redirect()->route('exam.provide');
   }
   public function answer(){
   	$exams = Exam::all();
       return view('exams.answer',compact('exams'));
   }
   public function result(Request $request){
       $exams = Exam::all();
         $score =0;
    foreach ($exams as $exam){
         $quiz_id= $exam->quiz_id;
          $answer = $exam->answer;
        if($request->input($quiz_id)==$answer){
            $score++;
        }
       }
       return view('exams.answer',compact('score'));

   }
   public function edit(Exam $exam){
   	 return view('exams.edit', compact('exam'));
   }
   public function update(Exam $exam,Request $request){
       $this->validate($request,[
           'content'=>'required|max:50',
           'section_1'=>'required|max:50',
           'section_2'=>'required|max:50',
           'section_3'=>'required|max:50',
           'section_4'=>'required|max:50',
           'answer'=>'in:1,2,3,4',
       ]);
        $exam->update([
            'content'=>$request->content,
            'section_1'=>$request->section_1,
            'section_2'=>$request->section_2,
            'section_3'=>$request->section_3,
            'section_4'=>$request->section_4,
            'answer'=>$request->answer,
        ]);
       return redirect()->route('exam.provide');
   }
   public function destroy(Exam $exam,User $user){
        $this->authorize('destroy',$user);
        $exam->delete();
       session()->flash('success', '成功删除题目！');
       return back();
   }
}
