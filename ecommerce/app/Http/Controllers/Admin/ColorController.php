<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.color')->with(['data'=>Color::all()]);
    }
    public function manage_color(Request $req,$id='')
    {   
        if($id==''){
            $send['color']='';
            $send['color_id']=$id;
        }
        else{
            $data=color::find($id);
            $send['color_id']=$id;
            $send['color']=$data['color'];
        }
        return view('admin/manage_color',$send);
    }

    public function manage_color_process(Request $req)
    {
        $req->validate([
            "color"=>"required|unique:colors,color,".$req->input('id')
        ]);
        if($req->input('id')){
            $update=color::find($req->input('id'));
            $update->color=$req->input('color');
            $req->session()->flash('msg','Color Updated Successfully.....!!');
            $update->save();
        }
        else{
            $new=new color();
            $new->color=$req->post('color');
            $new->save();
            $req->session()->flash('msg','Color Inserted Successfully.....!!');
        }
        return redirect('admin/color');
    }
    public function delete_color(Request $req,$id)
    {
        $find=color::find($id);
        $find->delete();
        $req->session()->flash('msg','color Deleted Successfully.....!!!!');
        return redirect('admin/color');
    }
    public function update_status_color(Request $req, $status, $id)
    {
        $find=color::find($id);
        $find->color_status=$status;
        $find->save();
        $req->session()->flash('msg','Status Updated Successfully.....!!!!');
        return redirect('admin/color');
    }

}
