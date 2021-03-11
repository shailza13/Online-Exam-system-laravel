<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\oex_portals;
use Validator;

class PortalController extends Controller
{
    public function portal_signup()
    {
         if(Session::get('portal_session'))
        {
            return redirect(url('portal/dashboard'));
        }
    	return view('portal.signup');
    }
    public function signup_sub(Request $request)
    {
    	$validator=Validator::make($request->all(),['name'=>'required','email'=>'required','mobile_no'=>'required','password'=>'required']);
    	if($validator -> passes())
    	{
    		$is_exists=oex_portals::where('email',$request->email)->get()->first();
    		if($is_exists)
    		{
    			$arr=array('status'=>'false','message'=>'Email Already Exist');
    		}
    		else
    		{
    		$p = new oex_portals();
    		$p->name=$request->name;
    		$p->email=$request->email;
    		$p->mobile_no=$request->mobile_no;
    		$p->password=$request->password;
    		$p->save();
    		$arr=array('status'=>'true','message'=>'Portal Added Successfully','reload'=>url('portal/login')); 
    		}
    	}
    	else
    	{
    		$arr=array('status'=>'false','message'=>$validator->errors()->all());
    	}
    	 echo json_encode($arr);
    }

    //Portal Login
    public function portal_login()
    {
        if(Session::get('portal_session'))
        {
            return redirect(url('portal/dashboard'));
        }
    	return view('portal/login');
    }
    public function login_sub(Request $request)
    {
    	$portal=oex_portals::where('email',$request->email)->where('password',$request->password)->get()->toArray();
        if($portal)
        {
           if($portal[0]['status']==1)
           {
            $request->session()->put('portal_session',$portal[0]['id']);    
            $arr=array('status'=>'true','message'=>'success','reload'=>url('portal/dashboard'));
           }
           else
           {
            $arr=array('status'=>'false','message'=>'Your Account Has Been Deactivated');
           }
        }
        else
        {
            $arr=array('status'=>'false','message'=>'Email and Password not match');
        }
        echo json_encode($arr);
    }
}
