<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\oex_students;
use Sessions;
class StudentController extends Controller
{
    public function login()
    {
    	return view('student/login');
    }
    public function login_sub(Request $request)
    {
    	$s=oex_students::where('email',$request->email)->where('password',$request->password)->get()->first();
        if($s)
        { 
        	$request->session()->put('id',$s->id);
            $arr=array('status'=>'true','message'=>'success','reload'=>url('student/dashboard'));
           }
        else
        {
            $arr=array('status'=>'false','message'=>'Email and Password not match');
        }
        echo json_encode($arr);
    }
}
