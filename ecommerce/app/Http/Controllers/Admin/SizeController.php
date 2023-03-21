<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        
        return view('admin.size')->with(['data'=>Size::all()]);
    }
    public function manage_size(Request $req,$id='')
    {   
        if($id==''){
            $send['size']='';
            $send['size_id']=$id;
        }
        else{
            $data=size::find($id);
            $send['size_id']=$id;
            $send['size']=$data['size'];
        }
        return view('admin/manage_size',$send);
    }

    public function manage_size_process(Request $req)
    {
        $req->validate([
            "size"=>"required|unique:sizes,size,".$req->input('id')
        ]);
        if($req->input('id')){
            $update=Size::find($req->input('id'));
            $update->size=$req->input('size');
            $req->session()->flash('msg','Size Updated Successfully.....!!');
            $update->save();
        }
        else{
            $new=new Size();
            $new->size=$req->post('size');
            $new->save();
            $req->session()->flash('msg','Size Inserted Successfully.....!!');
        }
        return redirect('admin/size');
    }
    public function delete_size(Request $req,$id)
    {
        $find=Size::find($id);
        $find->delete();
        $req->session()->flash('msg','Size Deleted Successfully.....!!!!');
        return redirect('admin/size');
    }
    public function update_status_size(Request $req, $status, $id)
    {
        $find=Size::find($id);
        $find->size_status=$status;
        $find->save();
        $req->session()->flash('msg','Status Updated Successfully.....!!!!');
        return redirect('admin/size');
    }

    }
