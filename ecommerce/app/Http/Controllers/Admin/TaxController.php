<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.tax')->with(['data'=>tax::all()]);
    }
    public function manage_tax(Request $req,$id='')
    {   
        if($id==''){
            $send['tax_id']=$id;
            $send['tax_desc']='';
            $send['tax_value']='';
        }
        else{
            $data=tax::find($id);
            $send['tax_id']=$id;
            $send['tax']=$data['tax'];
            $send['tax_desc']=$data['tax_desc'];
            $send['tax_value']=$data['tax_value'];
        }
        return view('admin/manage_tax',$send);
    }

    public function manage_tax_process(Request $req)
    {
        $req->validate([
            "tax_desc"=>"required|unique:taxes,tax_desc,".$req->input('id'),
            "tax_value"=>"required|unique:taxes,tax_value,".$req->input('id')
        ]);
        if($req->input('id')){
            $update=tax::find($req->input('id'));
            $update->tax_value=$req->input('tax_value');
            $update->tax_desc=$req->input('tax_desc');
            $req->session()->flash('msg','Tax Updated Successfully.....!!');
            $update->save();
        }
        else{
            $new=new tax();
            $new->tax_desc=$req->post('tax_desc');
            $new->tax_value=$req->post('tax_value');
            $new->save();
            $req->session()->flash('msg','Tax Inserted Successfully.....!!');
        }
        return redirect('admin/tax');
    }
    public function delete_tax(Request $req,$id)
    {
        $find=tax::find($id);
        $find->delete();
        $req->session()->flash('msg','Tax Deleted Successfully.....!!!!');
        return redirect('admin/tax');
    }
    public function update_status_tax(Request $req, $status, $id)
    {
        $find=tax::find($id);
        $find->tax_status=$status;
        $find->save();
        $req->session()->flash('msg','Status Updated Successfully.....!!!!');
        return redirect('admin/tax');
    }

}