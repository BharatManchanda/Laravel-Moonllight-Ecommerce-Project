<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(Request $req)
    {
        if($req->session()->has('EID')){
            return redirect('admin/dashboard');
        }
        return view('admin/login'); 
    }
    
    public function auth(Request $request)
    {
        $email=$request->input('email_id');
        $password=$request->input('password');
        $result = Admin::where(['email_id'=>$email, 'password'=>$password])->get();
        if(isset($result['0']->id)){
            $request->session()->put('EID',$result['0']['email_id']);
            $request->session()->put('FNAME',$result['0']['first_name']);
            $request->session()->put('LNAME',$result['0']['last_name']);
            $request->session()->put('PHONE',$result['0']['phone']);
            return redirect('admin/dashboard');
        }else{
            $request->session()->flash('error',"Email ID or Password is incorrect....!!");
            return redirect('admin');
        }
        
        // return view(admin.dashboard);
    }

    
    public function dashboard()
    {
        return view('admin.dashboard'); 
    }
    public function dashboard2()
    {
        return view('admin.dashboard2'); 
    }
}
