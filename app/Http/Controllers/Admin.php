<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\oex_categories;
use App\Models\oex_exam_masters;
use App\Models\oex_students;
use App\Models\oex_portals;
use App\Models\oex_exam_question_masters;
use Validator;
class Admin extends Controller
{
    public function index()
    {
    	return view('admin.dashboard');
    }
    public function exam_category()
    {
    	$data['category']=oex_categories::orderby('name','asc')->get()->toArray();
    	return view('admin.exam_category',$data);
    }
    public function add_new_category(Request $request)
    {
    	   // $data1 = array(
        //             'name' => $request->name,
        //             'status' =>$status,
        //             );
        //         oex_categories::insert($data1);
    	$validator=Validator::make($request->all(),['name'=>'required']);
    	if($validator -> passes())
    	{
    		$cat = new oex_categories();
    		$cat->name=$request->name;
    		$cat->status=1;
    		$cat->save();
    		$arr=array('status'=>'true','message'=>'success','reload'=>url('admin/exam_category'));
    	}
    	else
    	{
    		$arr=array('status'=>'false','message'=>$validator->errors()->all());
    	}
    	 echo json_encode($arr);
    }

    //Delete Category
    public function delete_category($id)
    {
    	$cat=oex_categories::where('id',$id)->get()->first();
    	$cat->delete();
    	return redirect(url('admin/exam_category'));
    }
     //Edit Category
    public function edit_category($id)
    {
    	echo $id;
    	$category=oex_categories::where('id',$id)->get()->first();
    	return view('admin.edit_category',['category'=>$category]);
    }

    public function edit_new_category(request $request)
    {
    	$cat=oex_categories::where('id',$request->id)->get()->first();
    	$cat->name=$request->name;
    	$cat->update();
    	echo json_encode(array('status'=>'true','message'=>'category successfully updated','reload'=>url('admin/exam_category')));
    }

    //Edit Status
    public function category_status($id)
    {
    	echo $id;
    	$cat1=oex_categories::where('id',$id)->get()->first();
    	if($cat1->status == 1)
    	{
    		$status = 0;
    	}
    	else
    	{
    		$status=1;
    	}
    	$cat1=oex_categories::where('id',$id)->get()->first();
    	$cat1->status=$status;
    	$cat1->update();
    }

    //Manage Exams
    public function manage_exam()
    {
    	$data['category']=oex_categories::orderby('name','asc')->where('status','1')->get();
    	$data['exam']=oex_exam_masters::select(['oex_exam_masters.*','oex_categories.name as cat_name'])->orderBy('id','desc')->join('oex_categories','oex_exam_masters.category','=','oex_categories.id')->get()->toArray();
    	return view('admin.manage_exam',$data);
    }

    //Add New Exam
    public function add_new_exam(Request $request)
    {
    	$validator=Validator::make($request->all(),['title'=>'required','exam_date'=>'required','exam_category'=>'required']);
    	if($validator -> passes())
    	{
    		$cat = new oex_exam_masters();
    		$cat->title=$request->title;
    		$cat->category=$request->exam_category;
    		$cat->exam_date=$request->exam_date;
    		$cat->status=1;
    		$cat->save();
    		$arr=array('status'=>'true','message'=>'success','reload'=>url('admin/manage_exam')); 
    	}
    	else
    	{
    		$arr=array('status'=>'false','message'=>$validator->errors()->all());
    	}
    	 echo json_encode($arr);
    }
     //Edit Exam Status
    public function exam_status($id)
    {
    	echo $id;
    	$exam=oex_exam_masters::where('id',$id)->get()->first();
    	if($exam->status == 1)
    	{
    		$status = 0;
    	}
    	else
    	{
    		$status=1;
    	}
    	$exam=oex_exam_masters::where('id',$id)->get()->first();
    	$exam->status=$status;
    	$exam->update();
    }
    
    //Edit Exam
    public function edit_exam($id)
    {
    	$id;
    	$data['exam']=oex_exam_masters::where('id',$id)->get()->first();
    	$data['category']=oex_categories::orderby('name','asc')->where('status','1')->get();
    	return view('admin.edit_exam',$data);

    }
    public function edit_exam_sub(Request $request)
    {
    	$exam=oex_exam_masters::where('id',$request->id)->get()->first();
    	$exam->title=$request->title;
    	$exam->exam_date=$request->exam_date;
    	$exam->category=$request->exam_category;
    	$exam->update();
    	echo json_encode(array('status'=>'true','message'=>'Exam successfully updated','reload'=>url('admin/manage_exam')));

 	}
    //Delete Exam
    public function delete_exam($id)
    {
    	$del=oex_exam_masters::where('id',$id)->get()->first();
    	$del->delete();
    	return redirect(url("/admin/manage_exam"));
    }

    //Manage Students
    public function manage_students()
    {
    	$data['exams']=oex_exam_masters::where('status','1')->get()->toArray();
    	$data['students']=oex_students::select(['oex_students.*','oex_exam_masters.title as exam_name','oex_exam_masters.exam_date'])->orderBy('id','desc')->join('oex_exam_masters','oex_students.exam','=','oex_exam_masters.id')->get()->toArray();
    	return view('admin/manage_students',$data);
    }
    //Add New Student
    public function add_new_student(Request $request)
    {
    	$validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','dob'=>'required','exam'=>'required','password'=>'required']);
    	if($validator -> passes())
    	{
    		$std = new oex_students();
    		$std->name=$request->name;
    		$std->email=$request->email;
    		$std->mobile_no=$request->mobile_no;
    		$std->dob=$request->dob;
    		$std->exam=$request->exam;
    		$std->password=$request->password;
    		$std->status=1;
    		$std->save();
    		$arr=array('status'=>'true','message'=>'Student Added Successfully','reload'=>url('admin/manage_students')); 
    	}
    	else
    	{
    		$arr=array('status'=>'false','message'=>$validator->errors()->all());
    	}
    	 echo json_encode($arr);

    }

       //Edit Student Status
    public function student_status($id)
    {
    	echo $id;
    	$student=oex_students::where('id',$id)->get()->first();
    	if($student->status == 1)
    	{
    		$status = 0;
    	}
    	else
    	{
    		$status=1;
    	}
    	$student=oex_students::where('id',$id)->get()->first();
    	$student->status=$status;
    	$student->update();
    }

    //Update Student
    public function edit_student($id)
    {
    	$exams=oex_exam_masters::where('status','1')->get()->toArray();
    	$std=oex_students::where('id',$id)->get()->first();
    	return view('/admin/edit_student',['students'=>$std,'exams'=>$exams]);
    }
    //Edit Student Final
    public function edit_student_final(Request $request)
    {
    	$edit_student=oex_students::where('id',$request->id)->get()->first();
    	$edit_student->name=$request->name;
    	$edit_student->email=$request->email;
    	$edit_student->mobile_no=$request->mobile_no;
    	$edit_student->password=$request->password;
    	$edit_student->dob=$request->dob;
    	$edit_student->exam=$request->exam;
    	$edit_student->update();
    	echo json_encode(array('status'=>'true','message'=>'Student successfully updated','reload'=>url('admin/manage_students')));

    }
    //Delete Student
    public function delete_student($id)
    {
    	$student=oex_students::where('id',$id)->get()->first();
    	$student->delete();
    	return redirect(url("/admin/manage_students"));
    }

      //Manage Portal
    public function manage_portal()
    {
    	$data['portal']=oex_portals::orderBy('id','desc')->get()->toArray();
    	return view('admin/manage_portal',$data);
    }
    //Add Portal
    public function add_new_portal(Request $request)
    {
    	$validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
    	if($validator -> passes())
    	{
    		$p = new oex_portals();
    		$p->name=$request->name;
    		$p->email=$request->email;
    		$p->mobile_no=$request->mobile_no;
    		$p->password=$request->password;
    		$p->status=1;
    		$p->save();
    		$arr=array('status'=>'true','message'=>'Portal Added Successfully','reload'=>url('admin/manage_portal')); 
    	}
    	else
    	{
    		$arr=array('status'=>'false','message'=>$validator->errors()->all());
    	}
    	 echo json_encode($arr);
    }

        //Edit Portal Status
    public function portal_status($id)
    {
    	$p=oex_portals::where('id',$id)->get()->first();
    	if($p->status == 1)
    	{
    		$status = 0;
    	}
    	else
    	{
    		$status=1;
    	}
    	$p=oex_portals::where('id',$id)->get()->first();
    	$p->status=$status;
    	$p->update();
    }


    //Delete Portal
    public function delete_portal($id)
    {
    	$p=oex_portals::where('id',$id)->get()->first();
    	$p->delete();
    	return redirect(url('admin/manage_portal'));
    }

    //Edit Portal
    public function edit_portal($id)
    {
    	$data['portal']=oex_portals::where('id',$id)->get()->first();
   		return view('/admin/edit_portal',$data);
    	// $p->name=$request->name;
    	// $p->email=$request->email;
    	// $p->mobile_no=$request->mobile_no;
    	// $p->password=$request->password;

    }
    public function edit_portal_final(Request $request)
    {
    	$portal=oex_portals::where('id',$request->id)->get()->first();
    	$portal->name=$request->name;
    	$portal->email=$request->email;
    	$portal->mobile_no=$request->mobile_no;
    	if($portal->password != "")
    		$portal->password=$request->password;
    	$portal->update();
    	echo json_encode(array('status'=>'true','message'=>'Portal successfully updated','reload'=>url('admin/manage_portal')));

    }

    //Add Question
    public function add_question($id)
    {
        $data['questions']=oex_exam_question_masters::where('exam_id',$id)->get()->toArray();
       return view('admin.add_question',$data);
    }
    //Add New Question
    public function add_new_question(Request $request)
    {
        $validator=Validator::make($request->all(),['question'=>'required','option1'=>'required','option2'=>'required','option3'=>'required','option4'=>'required','ans'=>'required']);
        if($validator -> passes())
        {
            $ques = new oex_exam_question_masters();
            $ques->exam_id=$request->exam_id;
            $ques->question=$request->question;
            $ques->options=json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4));
            $ques->ans=$request->ans;
            $ques->status=1;
            $ques->save();
            $arr=array('status'=>'true','message'=>'Question Successfully Added','reload'=>url('admin/add_question/'.$request->exam_id));
        }
        else
        {
            $arr=array('status'=>'false','message'=>$validator->errors()->all());
        }
         echo json_encode($arr);
    }

    //Question Status
    public function question_status($id)
    {
        $q=oex_exam_question_masters::where('id',$id)->get()->first();
        if($q->status == 1)
        {
            $status = 0;
        }
        else
        {
            $status=1;
        }
        $q1=oex_exam_question_masters::where('id',$id)->get()->first();
        $q1->status=$status;
        $q1->update();
    }

    //Delete Questions
    public function delete_question($id)
    {
        $del_ques=oex_exam_question_masters::where('id',$id)->get()->first();
        $del_ques->delete();
        $exam_id=$del_ques->exam_id;
        return redirect(url('admin/add_question/'.$exam_id));
    }

    //Update Questions
    public function update_question($id)
    {
        $data['question']=oex_exam_question_masters::where('id',$id)->get()->toArray();
        return view('admin/update_question',$data);
    }

    //Update Questions Final
    public function edit_question_inner(Request $request)
    {
        $edit_questions=oex_exam_question_masters::where('id',$request->id)->get()->first();

        $edit_questions->question=$request->question;
        $edit_questions->ans=$request->ans;
        $edit_questions->options=json_encode(array('option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3,'option4'=>$request->option4));
        $edit_questions->update();
        echo json_encode(array('status'=>'true','message'=>'Updated Successfully','reload'=>url('admin/add_question/'.$edit_questions->exam_id)));
 
    }
}
