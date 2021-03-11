<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\oex_students;
use App\Models\oex_exam_masters;
use App\Models\oex_exam_question_masters;
use App\Models\oex_results;
class StudentOperation extends Controller
{
    public function dashboard()
    {
    	if(!Session::get('id'))
    	{
    		return redirect(url('student/login'));
    	}
    	return view('student/dashboard');
    }
    public function logout(Request $request)
    {
    	$request->session()->flush('id');
    	return redirect('student/login');
    }
    public function student_exam()
    {
    	echo session::get('id');
    	$student_info=oex_students::select(['oex_students.*','oex_exam_masters.title','oex_exam_masters.exam_date'])->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')->where('oex_students.id',Session::get('id'))->get()->first();
        $exam_join=oex_results::where('exam_id',$student_info->exam)->where('user_id',Session::get('id'))->get()->first();
    	return view('student/exam',['student_info'=>$student_info,'exam_join'=>$exam_join]);
    }
    public function join_exam($id)
    {
    	$data['all_questions']=oex_exam_question_masters::where('exam_id',$id)->get()->toArray();
    	return view('student.join_exam',$data);
    }

    //Submit Questions
    public function submit_questions(Request $request)
    {
        $yes_ans=0;
        $no_ans=0;
        $data=$request->all();
        $result=array();
        for($i=1;$i<=$request->index;$i++)
        {
            if(isset($data['question'.$i]))
            {
                $question=oex_exam_question_masters::where('id',$data['question'.$i])->get()->first();
                if($question->ans==$data['ans'.$i])
                {
                    $result[$data['question'.$i]]="YES";
                    $yes_ans++;
                }
                else
                {
                     $result[$data['question'.$i]]="NO";
                     $no_ans++;
                }
            }
        }
        $res=new oex_results();
        $res->exam_id=$request->exam_id;
        $res->user_id=Session::get('id');
        $res->yes_ans=$yes_ans;
        $res->no_ans=$no_ans;
        $res->result_json=json_encode($result);
        echo $res->save();
        return redirect(url('student/show_result/'.$res->id));
    }
    public function show_result($id)
    {
        $data['student_info']=oex_students::select(['oex_students.*','oex_exam_masters.title','oex_exam_masters.exam_date'])->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')->where('oex_students.id',Session::get('id'))->get()->first();
        $data['result_info']=oex_results::where('id',$id)->get()->toArray();
        return view('student.show_result',$data);
    }
}
