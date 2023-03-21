<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.category')->with(['data'=>Category::all()]);
    }
    public function manage_category(Request $req,$id='')
    {   
        if($id==''){
            $send['category_id']=$id;
            $send['category_name']='';
            $send['category_slug']='';
            $send['category_image']='';
            $send['parent_category_id']='';
            $send['is_homepage']=0;
            $send['cate']=DB::table("categories")->get();
        }
        else{
            $data=Category::find($id);
            $send['category_id']=$id;
            $send['category_name']=$data['category_name'];
            $send['category_slug']=$data['category_slug'];
            $send['category_image']=$data['category_image'];
            $send['parent_category_id']=$data['parent_category_id'];
            $send['is_homepage']=$data['is_homepage'];
            $send['cate']=DB::table("categories")->where("id","!=",$id)->get();
        }
        return view('admin/manage_category',$send);
    }

    public function manage_category_process(Request $req)
    {
        if($req->input('id')){
            $req->validate([
                "category_name"=>"required|min:3",
                "category_slug"=>"required|min:3|unique:categories,category_slug,".$req->input('id'),
            ]);
            $update=Category::find($req->input('id'));
            $update->category_name=$req->input('category_name');
            $update->category_slug=$req->input('category_slug');
            if($req->input('parent_category_id')==null){
                $update->parent_category_id=0;
            }
            else{
                $update->parent_category_id=$req->input('parent_category_id');
            }
            $update->is_homepage=0;
            if($req->post("is_homepage") != null){
                $update->is_homepage=$req->input('is_homepage');
            }
            if($req->hasFile("category_image")){
                $data=DB::table("categories")->where("id",$req->input('id'))->get();
                if($data[0]->category_image !=  null){
                    if(Storage::exists("public/categories/".$data[0]->category_image)){
                    Storage::delete("public/categories/".$data[0]->category_image);
                    }
                }
                $img=$req->file("category_image");
                $ext=$img->extension();
                $img_name=time().".".$ext;
                $img->storeAs('public/categories',$img_name);
                $update->category_image=$img_name;
            }
            $update->save();
            $req->session()->flash('msg','Data Updated Successfully.....!!');
            return redirect('admin/category');
        }
        else{
            $req->validate([
            "category_name"=>"required|min:3",
            "category_slug"=>"required|min:3|unique:categories",
            ]);
            $new=new Category();
            $new->category_name=$req->post('category_name');
            $new->category_slug=$req->post('category_slug');
            if($req->hasFile("category_image")){
                $img=$req->file("category_image");
                $ext=$img->extension();
                $img_name=time().".".$ext;
                $img->storeAs("public/categories",$img_name);
                $new->category_image=$img_name;
            }
            $new->parent_category_id=0;
            if($req->input('parent_category_id')!=null){
                $new->parent_category_id=$req->input('parent_category_id');
            }
            $new->is_homepage=0;
            if($req->post("is_homepage") != null){
                $new->is_homepage=$req->input('is_homepage');
            }
            $new->save();
            $req->session()->flash('msg','Category Inserted Successfully.....!!');
            return redirect('admin/category');
        }
    }
    public function delete_category(Request $req,$id)
    {
        $find=Category::find($id);
        if(Storage::exists("public/categories/".$find['category_image'])){
            Storage::delete("public/categories/".$find['category_image']);
            }
        $find->delete();
        $req->session()->flash('msg','Data Deleted Successfully.....!!!!');
        return redirect('admin/category');
    }

    public function update_status_category(Request $req, $status, $id)
    {
        $find=Category::find($id);
        $find->category_status=$status;
        $find->save();
        $req->session()->flash('msg','Status Updated Successfully.....!!!!');
        return redirect('admin/category');
    }
}
