<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin/customer')->with(['data'=>customer::all()]);
    }
    public function viewCustomer($id)
    {
        $data=customer::find($id);
        return view('admin/view_customer',$data);
    }
    public function manage_customer(Request $req,$id='')
    {   
        if($id==''){
            $send['customer']='';
            $send['customer_id']=$id;
        }
        else{
            $data=customer::find($id);
            $send['customer_id']=$id;
            $send['customer']=$data['customer'];
        }
        return view('admin/manage_customer',$send);
    }

    public function manage_customer_process(Request $req)
    {
        $req->validate([
            "customer"=>"required|unique:customers,customer,".$req->input('id')
        ]);
        if($req->input('id')){
            $update=customer::find($req->input('id'));
            $update->customer=$req->input('customer');
            $req->session()->flash('msg','customer Updated Successfully.....!!');
            $update->save();
        }
        else{
            $new=new customer();
            $new->customer=$req->post('customer');
            $new->save();
            $req->session()->flash('msg','customer Inserted Successfully.....!!');
        }
        return redirect('admin/customer');
    }
    public function delete_customer(Request $req,$id)
    {
        $find=customer::find($id);
        $find->delete();
        $req->session()->flash('msg','customer Deleted Successfully.....!!!!');
        return redirect('admin/customer');
    }
    public function update_status_customer(Request $req, $status, $id)
    {
        $find=customer::find($id);
        $find->customer_status=$status;
        $find->save();
        $req->session()->flash('msg','Status Updated Successfully.....!!!!');
        return redirect('admin/customer');
    }
}
