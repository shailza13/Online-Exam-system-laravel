<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\oex_categories;
use App\Models\oex_exam_masters;
use App\Models\oex_students;
use Validator;
class PortalOperation extends Controller
{
    public function dashboard()
    {
    	// echo $session_data=Session::get('portal_session');
    	$data['portal_exams']=oex_exam_masters::select(['oex_exam_masters.*','oex_categories.name as cat_name'])->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')->orderBy('id','desc')->where('oex_exam_masters.status','1')->get()->toArray();
    	if(!Session::get('portal_session'))
    	{
    		return redirect(url('portal/login'));
    	}
    	return view('portal.dashboard',$data);
    }

    public function exam_form($id)
    {
    	$data['exam_info']=oex_exam_masters::where('id',$id)->get()->first();
    	$data['exam']=oex_exam_masters::get();
    	return view('portal.exam_form',$data);
    }
    //Exam Form Submit
     public function exam_form_submit(Request $request)
    {
    	$validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required','exam'=>'required']);
    	if($validator -> passes())
    	{
    		$exam_form = new oex_students();
    		$exam_form->name=$request->name;
    		$exam_form->email=$request->email;
    		$exam_form->mobile_no=$request->mobile_no;
    		$exam_form->dob=$request->dob;
    		$exam_form->exam=$request->exam;
    		$exam_form->password=$request->password;
    		$exam_form->save();
    		$arr=array('status'=>'true','message'=>'success','reload'=>url('portal/print/'.$exam_form->id));
    	}
    	else
    	{
    		$arr=array('status'=>'false','message'=>$validator->errors()->all());
    	}
    	 echo json_encode($arr);
    }
    //Print Form
    public function print($id)
    {
    	$std_info=oex_students::where('id',$id)->get()->first();
    	$exam_info=oex_exam_masters::where('id',$std_info->exam)->get()->first();;
    	return view('portal.print',['std_info'=>$std_info,'exam_info'=>$exam_info]);
    }

    //Update Form
    public function update_form()
    {
    	$data['exams']=oex_exam_masters::where('status','1')->get()->toArray();
    	return view('portal/update_form',$data);
    }

    //Show Student Exam Form
    public function student_exam_info(Request $request)
    {
    	$data['exam_info']=oex_exam_masters::where('id',$_GET['exam'])->get()->first();	
    	$data['stu_info']=oex_students::where('mobile_no',$_GET['mobile_no'])->where('dob',$_GET['dob'])->where('exam',$_GET['exam'])->get()->toArray();
    	return view('portal/student_exam_info',$data);
    }

    //Post Student Exam Form
    public function exam_form_edit(Request $request)
    {
    	$std=oex_students::where('id',$request->id)->get()->first();
    	$std->name=$request->name;
    	$std->email=$request->email;
    	$std->mobile_no=$request->mobile_no;
    	$std->dob=$request->dob;
    	if($request->password)
    	{
    		$std->password=$request->password;
    	}
    	
    	$std->update();
    	echo json_encode(array('status'=>'true','message'=>'success','reload'=>url('portal/update_form')));
    }

    //Portal Logout
    public function logout(Request $request)
    {
    	$request->session()->forget('portal_session');
    	return redirect(url('portal/login'));
    }
}
