<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\brand;
use Illuminate\Http\Request;
use Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.brand')->with(['data'=>brand::all()]);
    }
    public function manage_brand(Request $req,$id='')
    {   
        if($id==''){
            $send['brand_id']=$id;
            $send['brand']='';
            $send['brand_image']='';
            $send['is_homepage']=0;
        }
        else{
            $data=brand::find($id);
            $send['brand_id']=$id;
            $send['brand']=$data['brand'];
            $send['brand_image']=$data['brand_image'];
            $send['is_homepage']=$data['is_homepage'];
        }
        return view('admin/manage_brand',$send);
    }

    public function manage_brand_process(Request $req)
    {
        if($req->input('id')){
            $req->validate([
                "brand"=>"required|unique:brands,brand,".$req->input('id'),
                "brand-image"=>"mimes:jpg,jpeg,png"
            ]);

            $update=brand::find($req->input('id'));
            $update->brand=$req->input('brand');
            if($req->hasFile('brand_image')){
                Storage::delete("public/brand/".$update['brand_image']);
                $img=$req->file('brand_image');
                $ext=$img->extension();
                $img_name=time().".".$ext;
                $img->storeAs('/public/brand',$img_name);
                $update->brand_image=$img_name;
            }
            $update->is_homepage=0;
            if($req->post('is_homepage')!=null)
            {
            $update->is_homepage=$req->input('is_homepage');
            }
            $req->session()->flash('msg','Brand Updated Successfully.....!!');
            $update->save();
        }
        else{
            $req->validate([
                "brand"=>"required|unique:brands,brand,".$req->input('id'),
                "brand_image"=>"required|mimes:jpg,jpeg,png"
            ]);
            $new=new brand();
            $new->brand=$req->input('brand');
            $img=$req->file('brand_image');
            $ext=$img->extension();
            $img_name=time().".".$ext;
            $img->storeAs('/public/brand',$img_name);
            $new->brand_image=$img_name;
            $new->is_homepage=0;
            if($req->post('is_homepage')!=null)
            {
            $new->is_homepage=$req->post('is_homepage');
            }
            $new->save();
            $req->session()->flash('msg','Brand Inserted Successfully.....!!');
        }
        return redirect('admin/brand');
    }

    public function delete_brand(Request $req,$id)
    {
        $data=$find=brand::find($id);
        if(Storage::exists("public/brand/".$data['brand_image'])){
            Storage::delete("public/brand/".$data['brand_image']);
        }
        $find=brand::find($id);
        $find->delete();
        $req->session()->flash('msg','Brand Deleted Successfully.....!!!!');
        return redirect('admin/brand');
    }

    public function update_status_brand(Request $req, $status, $id)
    {
        $find=brand::find($id);
        $find->brand_status=$status;
        $find->save();
        $req->session()->flash('msg','Status Updated Successfully.....!!!!');
        return redirect('admin/brand');
    }
}
