<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\homebanner;
use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\DB;
use Storage;

class HomebannerController extends Controller
{
    public function index()
    {
        
        return view('admin.homebanner')->with(['data'=>homebanner::all()]);
    }
    public function manage_homebanner(Request $req,$id='')
    {   
        if($id==''){
            $send['homebanner_id']=$id;
            $send['banner_image']='';
            $send['button_txt']='';
            $send['button_link']='';
            $send['banner_percentage']='';
            $send['banner_title']='';
            $send['banner_desc']='';
        }
        else{
            $data=homebanner::find($id);
            $send['homebanner_id']=$id;
            $send['banner_image']=$data['banner_image'];
            $send['button_txt']=$data['button_txt'];
            $send['button_link']=$data['button_link'];
            $send['banner_percentage']=$data['banner_percentage'];
            $send['banner_title']=$data['banner_title'];
            $send['banner_desc']=$data['banner_desc'];
        }
        return view('admin/manage_homebanner',$send);
    }

    public function manage_homebanner_process(Request $req)
    {
        if($req->input('id')){
            $req->validate([
                "banner_image"=>"mimes:jpg,jpeg,png"
            ]);
            $update=homebanner::find($req->input('id'));
            $update->button_txt=$req->input('button_txt');
            $update->button_link=$req->input('button_link');
            $update->banner_percentage=$req->input('banner_percentage');
            $update->banner_title=$req->input('banner_title');
            $update->banner_desc=$req->input('banner_desc');
            if($req->hasFile("banner_image")){
                $data=DB::table("homebanners")->where("id",$req->input('id'))->get();
                if($data[0]->banner_image !=  null){
                    if(Storage::exists("public/banners/".$data[0]->banner_image)){
                    Storage::delete("public/banners/".$data[0]->banner_image);
                    }
                }
                $img=$req->file("banner_image");
                $ext=$img->extension();
                $img_name=time().".".$ext;
                $img->storeAs('public/banners',$img_name);
                $update->banner_image=$img_name;
            }
            $update->save();
            $req->session()->flash('msg','Banner Updated Successfully.....!!');
            return redirect('admin/homebanner');
        }
        else{
            $req->validate([
            "banner_image"=>"required|mimes:jpg,png,jpeg",
            ]);
            $new=new homebanner();
            $new->button_txt=$req->post('button_txt');
            $new->button_link=$req->post('button_link');
            $new->banner_percentage=$req->input('banner_percentage');
            $new->banner_title=$req->input('banner_title');
            $new->banner_desc=$req->input('banner_desc');
            if($req->hasFile("banner_image")){
                $img=$req->file("banner_image");
                $ext=$img->extension();
                $img_name=time().".".$ext;
                $img->storeAs("public/banners",$img_name);
                $new->banner_image=$img_name;
            }
            $new->save();
            $req->session()->flash('msg','Banner Inserted Successfully.....!!');
            return redirect('admin/homebanner');
        }
    }
    public function delete_homebanner(Request $req,$id)
    {
        $find=homebanner::find($id);
        if(Storage::exists("public/banners/".$find['banner_image'])){
            Storage::delete("public/banners/".$find['banner_image']);
            }
        $find->delete();
        $req->session()->flash('msg','Banner Deleted Successfully.....!!!!');
        return redirect('admin/homebanner');
    }

    public function update_status_homebanner(Request $req, $status, $id)
    {
        $find=homebanner::find($id);
        $find->banner_status=$status;
        $find->save();
        $req->session()->flash('msg','Banner Status Updated Successfully.....!!!!');
        return redirect('admin/homebanner');
    }

}
