<?php
use Illuminate\Support\Facades\DB;
function prx($arr){
 echo "<pre>";
 print_r($arr);
 echo "</pre>";
 die();
}
$html='';
function menu($arr,$parent,$level=0,$prelevel=-1){
    global $html;
    foreach($arr as  $key => $val){
        if($parent == $val['parent_category_id']){
            if($level > $prelevel){
                if($html=='')
                $html.="<ul class='nav navbar-nav'>";
                else
                $html.="<ul class='dropdown-menu'>";
            }
            if($level == $prelevel){
                $html.="</li>";
            }
                $html.="<li><a href='http://localhost:8000/category/".$val['category_slug']."'>".$val['category']."</a>";
            if($level > $prelevel){
                $prelevel=$level;
            }
            $level++;
            menu($arr, $key, $level, $prelevel);
            $level--;
        }
    }
    if($level == $prelevel){
        $html.="</li></ul>";
    }
    return $html;
}
function getTopNavBar(){
    $result = DB::table("categories")
                    ->where(["category_status" => 1])
                    ->get();
    $arr=[];
    foreach($result as $list){
        $arr[$list->id]['category']=$list->category_name;
        $arr[$list->id]['parent_category_id']=$list->parent_category_id;
        $arr[$list->id]['category_slug']=$list->category_slug;
    }
    $ret = menu($arr,0);
    return $ret;
}
function getTempID(){
    if(session()->has("TEMP_USER_ID")){
        return session()->get("TEMP_USER_ID");
    }
    else{
        $rand = rand(11111111,99999999);
        session()->put("TEMP_USER_ID",$rand);
        return session()->get("TEMP_USER_ID");
    }
}
function getCartResult(){
    if(session()->has("LOGIN_USER_ID")){
        $u_id = session()->get("LOGIN_USER_ID");
        $user_type = "Register";
        }
    else{
            $user_type = "Non-Register";
            $u_id = getTempID();
        }

        $result=DB::table('carts')
                ->leftJoin('products','products.id','=','carts.product_id')
                ->leftJoin('product_attrs','product_attrs.id','=','carts.product_attr_id')
                ->leftJoin('sizes','sizes.id','=','product_attrs.size')
                ->leftJoin('colors','colors.id','=','product_attrs.color_id')
                ->where(['user_id'=>$u_id])
                ->where(['user_type'=>$user_type])
                ->select('products.title', 'products.image', 'product_attrs.price', 'sizes.size', 'colors.color','carts.quanity','products.slug','sizes.size','colors.color','carts.product_attr_id','carts.product_id','carts.id')
                ->get();

        return $result;
}
function coupon_code_check($coupon_code){
    
    $cart_data =  getCartResult();

    $total_price = 0;
    foreach($cart_data as $val){
        $total_price = $total_price + ($val->price * $val->quanity);
    }
    $coupon = DB::table('coupons')
                ->where(['coupon_code'=>$coupon_code])
                ->where(['coupon_status'=>1])
                ->get();

    $coupon_value=0;
    if (isset($coupon[0])) {
        if($coupon[0]->min_order_amt > $total_price){
            return json_encode(["status"=>"error", "message"=>"Coupon Code is not applicable on this amount...!!"]);
        }
        else if($coupon[0]->type == 'Value'){
            $total_price=round($total_price - $coupon[0]->coupon_value);
            $coupon_value=$coupon[0]->coupon_value;
            return json_encode(["status"=>"success", "message"=>"Coupon Code applied successfully...!!", "total_price" => $total_price, "coupon_value" => $coupon_value]);
        }
        else if($coupon[0]->type == 'Percentage'){
            $off = $total_price * $coupon[0]->coupon_value/100;
            $coupon_value = $off;
            $total_price=round($total_price - $off);
            return json_encode(["status"=>"success", "message"=>"Coupon Code applied successfully...!!", "total_price" => $total_price, "coupon_value" => $coupon_value]);
        }
    }
    else{
        return json_encode(["status"=>"error", "message"=>"Coupon code is not valid...!!"]);
    }
}
function getAvlQuantity($product_id, $arrt_id){
    $res = DB::table('products')
                    ->leftJoin('product_attrs','product_attrs.product_id','products.id')
                    ->leftJoin('orders_details','orders_details.product_id','products.id')
                    ->where("products.id", $product_id)
                    ->where("product_attrs.id", $arrt_id)
                    ->select('product_attrs.quantity','orders_details.quantity as  selling_qty')
                    ->get();
    return $res;
}

function getDateFormate($str){
    $sendD=strtotime($str);
    $sendD = date('d M, Y h:i',$sendD);
    return $sendD;
}
?>