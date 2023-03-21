<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.coupon')->with(['data'=>Coupon::all()]);
    }
    public function manage_coupon(Request $req,$id='')
    {   
        if($id==''){
            $send['coupon_id']=$id;
            $send['coupon_title']='';
            $send['coupon_code']='';
            $send['coupon_value']='';
            $send['coupon_type']='';
            $send['min_order_amt']='';
            $send['is_one_time']='';
        }
        else{
            $data=coupon::find($id);
            $send['coupon_id']=$id;
            $send['coupon_title']=$data['coupon_title'];
            $send['coupon_code']=$data['coupon_code'];
            $send['coupon_value']=$data['coupon_value'];
            $send['coupon_type']=$data['type'];
            $send['min_order_amt']=$data['min_order_amt'];
            $send['is_one_time']=$data['is_one_time'];
        }
        return view('admin/manage_coupon',$send);
    }

    public function manage_coupon_process(Request $req)
    {
        // echo "ram";
        // die();
        // $req->validate([
        //     "coupon_title"=>"required|min:3",
        //     "coupon_code"=>"required|min:3|unique:coupons,coupon_code,".$req->input('id'),
        //     "coupon_value"=>"required",
        //     "type"=>"required",
        //     "min_order_amt"=>"required",
        //     "is_one_time"=>"required"
        // ]);
        if($req->input('id')){
            $update=Coupon::find($req->input('id'));
            $update->coupon_title=$req->input('coupon_title');
            $update->coupon_code=$req->input('coupon_code');
            $update->coupon_value=$req->input('coupon_value');
            $update->type=$req->input('coupon_type');
            $update->min_order_amt=$req->input('min_order_amt');
            $update->is_one_time=$req->input('is_one_time');
            $req->session()->flash('msg','Data Updated Successfully.....!!');
            $update->save();
        }
        else{
            echo "ram";
            print_r($req->input());
            echo $req->input('coupon_title')."<br>";
            echo $req->input('coupon_code')."<br>";
            echo $req->input('coupon_value')."<br>";
            echo $req->input('coupon_type')."<br>";
            echo $req->input('min_order_amt')."<br>";
            echo $req->input('is_one_time')."<br>";
            echo "ram";
        // die();
            $new=new Coupon();
                $new->coupon_title=$req->post('coupon_title');
                $new->coupon_code=$req->post('coupon_code');
                $new->coupon_value=$req->post('coupon_value');
                $new->type=$req->post('coupon_type');
                $new->min_order_amt=$req->post('min_order_amt');
                $new->is_one_time=$req->post('is_one_time');
            $new->save();
            $req->session()->flash('msg','Coupon Inserted Successfully.....!!');
        }
        return redirect('admin/coupon');
    }
    public function delete_coupon(Request $req,$id)
    {
        $find=Coupon::find($id);
        $find->delete();
        $req->session()->flash('msg','Coupon Deleted Successfully.....!!!!');
        return redirect('admin/coupon');
    }
    public function update_status_coupon(Request $req, $status, $id)
    {
        $find=Coupon::find($id);
        $find->coupon_status=$status;
        $find->save();
        $req->session()->flash('msg','Status Updated Successfully.....!!!!');
        return redirect('admin/coupon');
    }
}
