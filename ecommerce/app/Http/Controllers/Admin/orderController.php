<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class orderController extends Controller
{
    //
    function index(){
        // echo "ex";
        $result['orders'] = DB::table('orders')
                        ->leftJoin('orders_status','orders_status.id','=','orders.orders_status')
                        ->select("orders.*","orders_status.order_status")
                        ->get();
                        // prx($result['orders']);

        return view('admin.order',$result);
    }
    function order_details(Request $req, $id){
        $result['order_details'] = DB::table('orders_details')
                        ->leftJoin('products','products.id','=','orders_details.product_id')
                        ->leftJoin('orders','orders.id','=','orders_details.orders_id')
                        ->leftJoin('orders_status','orders_status.id','=','orders.orders_status')
                        ->leftJoin('product_attrs','product_attrs.id','=','orders_details.product_attrs_id')
                        ->leftJoin('sizes','sizes.id','=','product_attrs.size')
                        ->leftJoin('colors','colors.id','=','product_attrs.color_id')
                        ->select("orders.id","products.title","product_attrs.attr_img", "sizes.size", "colors.color", "product_attrs.price", "orders_details.quantity","orders.name","orders.mobile", "orders.mobile","orders.address","orders.locality","orders.city","orders.state","orders.zip","orders.coupon_code","orders.coupon_value","orders_status.order_status","orders.payment_type","orders.payment_status","orders.payment_id","orders.total_amount","orders.tracking")
                        ->where(["orders_details.orders_id"=>$id])
                        ->get();
        $result['orders_status']=DB::table('orders_status')->get();
        $result['payment_status']=array('Credit','Pending','Fail');
                        // prx($result['order_details']);
        return view("Admin.order_details",$result);
    }
    function update_order_status(Request $req, $id, $val){
        DB::table('orders')
            ->where("id",$id)
            ->update([
            'orders_status'=> $val
        ]);
        return redirect("admin/order/order_details/{$id}");
    }
    function update_payment_status(Request $req, $id, $val){
        DB::table('orders')
            ->where("id",$id)
            ->update([
            'payment_status'=> $val
        ]);
        return redirect("admin/order/order_details/{$id}");
    }
    function update_tracking(Request $req){
        DB::table('orders')
            ->where("id",$req->input('id'))
            ->update([
            'tracking'=> $req->input('tracking')
            ]);
        return redirect("admin/order/order_details/{$req->input('id')}");
    }
}
