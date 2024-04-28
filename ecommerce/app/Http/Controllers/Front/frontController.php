<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Mail;

class frontController extends Controller
{
    function index(){
        $result['categories']=DB::table("categories")->where(['is_homepage'=>1])->where(['category_status'=>1])->take(5)->get();

        foreach ($result['categories'] as $list) {

            $result['products'][$list->id]=DB::table("Products")
                ->where(["product_status"=>1])
                ->where(["category_id"=>$list->id])
                ->get();

                foreach ($result['products'][$list->id] as $li) {
                    $result['product_attrs'][$li->id]=DB::table("product_attrs")
                        ->leftJoin("sizes","sizes.id","=","product_attrs.size")
                        ->leftJoin("colors","colors.id","=","product_attrs.color_id")
                        ->where(["product_attrs.product_id"=>$li->id])
                        ->get();
                }
            }


            $result['brand']=DB::table("brands")
            ->where(["is_homepage"=>1])
            ->where(["brand_status"=>1])
            ->get();
            
            $result['homebanner']=DB::table("homebanners")
            ->where(["banner_status"=>1])
            ->get();

            $result['featured_products']=DB::table("Products")
                ->where(["product_status"=>1])
                ->where(["is_featured"=>1])
                ->get();
            foreach ($result['featured_products'] as $li) {
                $result['featured_product_attrs'][$li->id]=DB::table("product_attrs")
                    ->leftJoin("sizes","sizes.id","=","product_attrs.size")
                    ->leftJoin("colors","colors.id","=","product_attrs.color_id")
                    ->where(["product_attrs.product_id"=>$li->id])
                    ->get();
            }

            $result['trending_products']=DB::table("Products")
                ->where(["product_status"=>1])
                ->where(["is_tranding"=>1])
                ->get();
            foreach ($result['trending_products'] as $li) {
                $result['trending_product_attrs'][$li->id]=DB::table("product_attrs")
                    ->leftJoin("sizes","sizes.id","=","product_attrs.size")
                    ->leftJoin("colors","colors.id","=","product_attrs.color_id")
                    ->where(["product_attrs.product_id"=>$li->id])
                    ->get();
            }

            $result['lastest_products']=DB::table("Products")
                ->where(["product_status"=>1])
                ->orderBy("id","DESC")
                ->get();
            foreach ($result['lastest_products'] as $li) {
                $result['lastest_product_attrs'][$li->id]=DB::table("product_attrs")
                    ->leftJoin("sizes","sizes.id","=","product_attrs.size")
                    ->leftJoin("colors","colors.id","=","product_attrs.color_id")
                    ->where(["product_attrs.product_id"=>$li->id])
                    ->get();
            }
        return view("Front/index",$result);
    }
    function product(Request $req, $slug){
        $result['product_details']=DB::table("products")->where("slug",$slug)->get();
            
            foreach($result['product_details'] as $val){
                $result['product_details_attr'][$val->id] = DB::table("product_attrs")
                ->leftJoin("colors","colors.id","=","product_attrs.color_id")
                ->leftJoin("sizes","sizes.id","=","product_attrs.size")
                ->where("product_id",$val->id)->get();
            }
            
            foreach($result['product_details'] as $val){
                $result['product_details_img'][$val->id] = DB::table("product_images")->where("product_id",$val->id)->get();
            }
            
            $result['related_product_details']=DB::table("products")->where("category_id",$result['product_details'][0]->category_id)->get();

            foreach($result['related_product_details'] as $val){
                $result['related_product_details_attr'][$val->id] = DB::table("product_attrs")
                ->leftJoin("sizes","sizes.id","=","product_attrs.size")
                ->leftJoin("colors","colors.id","=","product_attrs.color_id")
                ->where("product_id",$val->id)->get();
            }
            foreach($result['related_product_details'] as $val){
                $result['related_product_details_img'][$val->id] = DB::table("product_images")->where("product_id",$val->id)->get();
            }
            
            $result['order_review']=DB::table('review')
                                ->leftJoin('customers','customers.id','review.customer_id')
                                ->where("review.product_id",$result['product_details'][0]->id)
                                ->select('review.id','review.customer_id','review.rating','review.review','review.created_at','customers.name')
                                ->where("review.review_status",1)
                                ->get();
        return view('front/product_details',$result);
    }
    function add_to_cart(Request $req){

        $size = $req->post("siz_id");
        $color = $req->post("col_id");
        $quanity = $req->post("qty");
        $req->session()->forget("USER_ID");
        $product_id = $req->post("pro_id");
        if($req->session()->has("LOGIN_USER_ID")){
            $u_id = $req->session()->get("LOGIN_USER_ID");
            $user_type = "Register";
        }
        else{
            $user_type = "Non-Register";
            $u_id = getTempID();
        }
        $result=DB::table("product_attrs")
        ->select('product_attrs.id')
        ->join("colors", "colors.id", "=", "product_attrs.color_id")
        ->join("sizes", "sizes.id", "=", "product_attrs.size")
        ->where(["sizes.size" => $size ])
        ->where(["colors.color" => $color ])
        ->where(["product_id"=>$product_id])
        ->get();
        
        $attr_id = $result[0]->id;
        
        $res=DB::table("carts")
            ->where(["user_id"=>$u_id])
            ->where(["user_type"=>$user_type])
            ->where(["product_id"=>$product_id])
            ->where(["product_attr_id"=>$attr_id])
            ->get();

            $qty = getAvlQuantity($product_id,$attr_id);

            $final = $qty[0]->quantity - $qty[0]->selling_qty;
            if($quanity<=$final){
            if(isset($res[0])){
                $update_id = $res[0]->id;
                DB::table("carts")->where("id",$update_id)
                ->update([
                    "quanity"=>$quanity,
                    "updated_at"=> date("Y-m-d")
                ]);
                $msg="Data Updated to Cart Successfully";
            }
            else{

                    DB::table("carts")
                    ->insert([
                        "user_id" => $u_id,
                        "user_type" => $user_type,
                        "quanity" => $quanity,
                        "product_id" => $product_id,
                        "product_attr_id" => $attr_id
                    ]);
                    $msg="Data Add to Cart Successfully";
                }
            }
            else{
                $msg="Only ".$final." left";
            }
            if($quanity<=0){
                DB::table('carts')
                ->where(["user_id" => $u_id])
                ->where(["user_type" => $user_type])
                ->where(["product_id" => $product_id])
                ->where(["product_attr_id" => $attr_id])
                ->delete();
                $msg="Remove Data from Cart Successfully...!!";
            }
            $data=DB::table('carts')
            ->leftJoin('products','products.id','=','carts.product_id')
            ->leftJoin('product_attrs','product_attrs.id','=','carts.product_attr_id')
            ->leftJoin('sizes','sizes.id','=','product_attrs.size')
            ->leftJoin('colors','colors.id','=','product_attrs.color_id')
            ->where(['user_id'=>$u_id])
            ->where(['user_type'=>$user_type])
            ->select('products.title', 'products.image', 'product_attrs.price', 'sizes.size', 'colors.color','carts.quanity','products.slug','sizes.size','colors.color','carts.product_attr_id','carts.product_id','carts.id')
            ->get();

            // return response()->json(['msg' => $msg]);
            return json_encode(['msg'=>$msg, 'data'=>$data, 'total_product'=>count($data)]);
            
        }
        function cart(Request $req){
            if($req->session()->has("LOGIN_USER_ID")){
                $u_id = $req->session()->get("LOGIN_USER_ID");
                $user_type = "Register";
                }
            else{
                    $user_type = "Non-Register";
                    $u_id = getTempID();
                }
            $result['cart']=DB::table('carts')
                ->leftJoin('products','products.id','=','carts.product_id')
                ->leftJoin('product_attrs','product_attrs.id','=','carts.product_attr_id')
                ->leftJoin('sizes','sizes.id','=','product_attrs.size')
                ->leftJoin('colors','colors.id','=','product_attrs.color_id')
                ->where(['user_id'=>$u_id])
                ->where(['user_type'=>$user_type])
                ->select('products.title', 'products.image', 'product_attrs.price', 'sizes.size', 'colors.color','carts.quanity','products.slug','sizes.size','colors.color','carts.product_attr_id','carts.product_id','carts.id')
                ->get();
            return view('front.cart',$result);
        }
        function category(Request $req, $slug){
            $sort_txt="";
            $low_price="";
            $high_price="";
            $color="";
            $colarr=[];
            $query=DB::table("categories");
            $query=$query->where(['category_slug'=>$slug]);
            $result['categories']=$query->get();
            
            $query=DB::table("categories");
            $query=$query->where(['category_status'=>1]);
            $result['display_categories']=$query->get();
            
            $sort_txt="";
            $query=DB::table("Products");
            $query=$query->leftJoin("product_attrs","product_attrs.product_id","=","products.id");
            if($req->input('sort_function') == "Name"){
                $query=$query->orderBy("products.title","ASC");
                $sort_txt="Name";
            }
            else if($req->input('sort_function') == "Price High To Low"){
                $query=$query->orderBy("product_attrs.price","DESC");
                $sort_txt="Price High To Low";
            }
            else if($req->input('sort_function') == "Price Low To High"){
                $query=$query->orderBy("product_attrs.price","ASC");
                $sort_txt="Price Low To High";
            }
            else if($req->input('sort_function') == "Date"){
                $query=$query->orderBy("products.id","DESC");
                $sort_txt="Date";
            }
            if($req->input('low_price') != "" && $req->input('high_price') != ""){
                $low_price=$req->input('low_price');
                $high_price=$req->input('high_price');
                $query=$query->whereBetween("product_attrs.price",[$low_price,$high_price]);
            }
            if($req->input('color') != ""){
                $colorArr=$req->input('color');
                $color=$req->input('color');
                $colarr=explode(":",$colorArr);
                $colarr=array_filter($colarr);
                $str=implode(", ",$colarr);
                foreach($colarr as $val){
                    $query=$query->whereRaw("product_attrs.color_id IN($str)");
                    // echo $query;
                }
            }
            $result['sort']=$sort_txt;
            $result['low_price']=$low_price;
            $result['high_price']=$high_price;
            $result['color']=$color;
            $result['colarr']=$colarr;
            $result['slug']=$slug;

            $query=$query->where(["products.category_id"=>$result['categories']['0']->id]);
            $query=$query->where(["products.product_status"=>1]);
            $query=$query->distinct()->select("products.*");
            $result['products']=$query->get();
            foreach ($result['products'] as $val) {
                $result['product_attrs'][$val->id]=DB::table("product_attrs")
                    ->leftJoin("sizes","sizes.id","=","product_attrs.size")
                    ->leftJoin("colors","colors.id","=","product_attrs.color_id")
                    ->where(["product_attrs.product_id"=>$val->id])
                    ->get();
            }

            foreach ($result['products'] as $val) {
                $result['product_images'][$val->id]=DB::table("product_images")
                    ->where(["product_id"=>$val->id])
                    ->get();
            }
            $result['colors']=DB::table('colors')
            ->where('color_status',1)
            ->get();
            return view('front.category',$result);
        }

        function register(Request $req){
            if($req->session()->has("LOGIN_USER_ID") != null){
                return redirect('/');
            }
            return view('front.register');
        }

        function register_process(Request $req){
            $rand_id = rand(000000000,999999999);
            $validator = Validator::make($req->all(), [
                "username"=>'required|min:3',
                "phone"=>'required|digits:10',
                "email"=>'required|email|unique:customers,email_id',
                "password"=>'required|min:6',
            ]);
            if (!$validator->passes()) {
                return json_encode(["status"=>'error', "error"=>$validator->errors()->toArray()]);
            }
            else{
                DB::table("customers")->insert([
                    "name"=>$req->input('username'),
                    "email_id"=>$req->input('email'),
                    "mobile"=>$req->input('phone'),
                    "password"=>Crypt::encrypt($req->input('password')),
                    "is_rand"=>$rand_id
                ]);
                $fetch['to'] = $req->input('email');
                $fetch['subject'] = "Email ID Verification...!!";
                $data['username'] = $req->input('username');
                $data['rand_id'] = $rand_id;
                Mail::send("front/email_send", $data, function($messages) use ($fetch){
                    $messages->to($fetch['to']);
                    $messages->subject($fetch['subject']);
                });

                return json_encode(["status"=>'success',"msg"=>'Please check your mail address  and verify it...!!']);
            }
        }

        function login_process(Request $req){
            $valid = Validator::make($req->all(),[
                "login_email"=>'required|email',
                "login_password"=>'required',
            ]);
            if(!$valid->passes()){
                return json_encode(["status"=>'Empty',"msg"=>$valid->errors()->toArray()]);
            }
            $fetch_data = DB::table('customers')
            ->where(["email_id" => $req->input('login_email')])
            ->get();
            if(isset($fetch_data[0])){
                $db_pwd = Crypt::decrypt($fetch_data[0]->password);
                if ($db_pwd == $req->input('login_password')) {
                    if ($fetch_data[0]->is_verify == 0) {
                        return json_encode(["status"=>'Not Verify', "msg"=>'Please check your Email ID and verify it....!!']);
                    }
                    $req->session()->put("LOGIN_USER_ID",$fetch_data[0]->id);
                    $req->session()->put("LOGIN_USER_EMAIL",$req->input('login_email'));
                    $req->session()->put("LOGIN_USER_NAME",$fetch_data);
                    $id =  getTempID();
                    DB::table('carts')
                            ->where(["user_id"=>$id])
                            ->update([
                                "user_id" => $req->session()->get('LOGIN_USER_ID'),
                                "user_type" => "Register"
                            ]);
                    if($req->input('login_rememberme') !== null){
                        setcookie("email", $req->input('login_email') ,time() + (60*60*24*30));
                        setcookie("password", $req->input('login_password') ,time() + (60*60*24*30));
                    }
                    return json_encode(["status"=>'Success',"msg"=>'Login Successfully...!!']);
                }
                else{
                    return json_encode(["status"=>"Password Failed","msg"=>'Password Not Matches']);
                }
            }
            else{
                return json_encode(["status"=>"Email Failed","msg"=>'You have entered incorrect email id']);
            }
        }
        function email_verification(Request $req, $id){
            $check = DB::table('customers')
            ->where(["is_rand"=>$id])
            ->get();
            if(isset($check[0])){
                if($check[0]->is_verify == 0){
                    DB::table('customers')
                    ->where(["is_rand"=>$id])
                    ->update([
                        "is_verify" => 1,
                        "is_rand" => 0
                ]);
                    return('Email ID is successfully verify');
                }
            }
            else{
                return redirect('/');
            }

        }
    function forget_password(Request $req){
        $valid = validator::make($req->all(),[
            "forget_email"=>'required | email',
        ]);
        if(!$valid->passes()){
            return json_encode(["status"=>"error","msg"=>$valid->errors()->toArray()]);
        }
        $fetch = DB::table('customers')
        ->where(["email_id" => $req->input('forget_email') ])
        ->get();
        if(!isset($fetch[0]->email_id)){
            return json_encode(["status"=>"error2","msg"=>"Email ID is not matching with any account....!!"]);
        }
        else{
            $rand_id = rand(000000000,999999999);
            DB::table('customers')
                ->where(["email_id" => $req->input('forget_email') ])
                ->update([
                    "is_rand" => $rand_id,
                    "is_forget_password" => 1
                ]);
                $data['user']=$fetch[0]->name;
                $data['rand_id']=$rand_id;
                $user['to'] = $req->input('forget_email');
                $user['subject'] = "Change your password by given link";
                Mail::send("front/forget_email", $data, function($mess) use ($user) {
                    $mess->to($user['to']);
                    $mess->subject($user['subject']);
                });
            return json_encode(["status"=>"success","msg"=>"Check your Email ID to change your Password"]);
        }
    }
    function change_password(Request $req, $id){
        $fetch = DB::table('customers')
                    ->where(['is_rand'=>$id])
                    ->where(['is_forget_password'=>1])
                    ->get();
        if (isset($fetch[0])){
            $req->session()->put('FORGET_PASSWORD', $fetch[0]->id);
            return view('front.change_password');
        }
            return redirect('/');
    }

    function update_password(Request $req){
        $valid = Validator::make($req->all(),[
            'new_pass' =>  'required | min:6',
            're_new_pass' =>  'required|min:6'
        ]);
        if(!$valid->passes()){
            return json_encode(["status"=>'error', "msg"=>$valid->errors()->toArray()]);
        }
        else if($req->input('new_pass') != $req->input('re_new_pass')){
            return json_encode(["status"=>'error2', "msg"=>"Please enter same password that you enter above."]);
            
        }
        else{
            DB::table('customers')
            ->where(["id"=>$req->session()->get('FORGET_PASSWORD')])
            ->update([
                "is_forget_password"=>0,
                "is_rand"=>0,
                "password"=>crypt::encrypt($req->input('new_pass')),
            ]);                
            return json_encode(["status"=>'success', "msg"=>"Your password has been cchanged successfully."]);
        }
    }
    function checkout(Request $req){
        $result['cart_data'] = getCartResult();
        // $result
        if(session()->has('LOGIN_USER_ID')){
            $customer_info = DB::table('customers')
                ->where(["id"=>$req->session()->get('LOGIN_USER_ID')])
                ->get()->toArray();
                $result['name'] = $customer_info[0]->name;
                $result['email_id'] = $customer_info[0]->email_id;
                $result['mobile'] = $customer_info[0]->mobile;
                $result['address'] = $customer_info[0]->address;
                $result['locality'] = $customer_info[0]->locality;
                $result['city'] = $customer_info[0]->city;
                $result['state'] = $customer_info[0]->state;
                $result['zip'] = $customer_info[0]->zip;
                $result['company'] = $customer_info[0]->company;
                $result['gstin'] = $customer_info[0]->gstin;
        }
        else{
                $result['name'] = "";
                $result['email_id'] = "";
                $result['mobile'] = "";
                $result['address'] = "";
                $result['locality'] = "";
                $result['city'] = "";
                $result['state'] = "";
                $result['zip'] = "";
                $result['company'] = "";
                $result['gstin'] = "";
        }
        if(isset($result['cart_data'][0])) {
            return view("front.checkout",$result);
        } else {
            return redirect("/");
        }
        
        return view("front.checkout");
    }
    function coupon_code_check(Request $req){
        $arr = coupon_code_check($req->input('coupon_code'));
        $arr = json_decode($arr,true);
        if($arr['status'] == 'success'){
        return json_encode(["status"=>$arr['status'], "message"=>$arr['message'], "total_price" => $arr['total_price'], "coupon_value" => $arr['coupon_value']]);
        }
        else{
            return json_encode(["status"=>$arr['status'], "message"=>$arr['message']]);
        }
    }
    function order_submit(Request $req){
        $redirectTo = '';
        if ($req->session()->has('LOGIN_USER_ID')){

        }
        else{
            $valid = Validator::make($req->all(),array(
                "name"=>"required|min:3",
                "email" => "required|email|unique:customers,email_id",
                "mobile"=>"required|digits:10",
                "address"=>"required|min:16",
                "locality"=>"required|min:5",
                "locality"=>"required|min:5",
                "city"=>"required|min:3",
                "state"=>"required|min:3",
                "zip"=>"required|digits:6"
            ));
            if(!$valid->passes()){
                return json_encode(["status"=>"guesterror", "error"=>$valid->errors()->toArray()]);
            }
            else{
                $pass = rand(000000000,999999999);
                $reg_id=DB::table("customers")->insertGetId([
                            "name"=>$req->input('name'),
                            "email_id"=>$req->input('email'),
                            "mobile"=>$req->input('mobile'),
                            "password"=>Crypt::encrypt($pass),
                            "address"=>$req->input('mobile'),
                            "locality"=>$req->input('locality'),
                            "city"=>$req->input('city'),
                            "state"=>$req->input('state'),
                            "zip"=>$req->input('zip'),
                            "company"=>$req->input('company_name'),
                            "customer_status"=>1,
                            "is_verify"=>1,
                            "is_forget_password"=>0,
                            "is_rand"=>0
                ]);
                $fetch_data = DB::table("customers")->where("id",$reg_id)->get();
                $req->session()->put("LOGIN_USER_ID",$fetch_data[0]->id);
                    $req->session()->put("LOGIN_USER_EMAIL",$fetch_data[0]->email_id);
                    $req->session()->put("LOGIN_USER_NAME",$fetch_data[0]->name);

                    $id =  getTempID();
                    DB::table('carts')
                    ->where(["user_id"=>$id])
                    ->update([
                        "user_id" => $req->session()->get('LOGIN_USER_ID'),
                        "user_type" => "Register"
                    ]);
                    $data['name'] = $req->session()->get("LOGIN_USER_NAME");
                    $data['password'] = $pass;
                    $reg_new['email'] = $req->session()->get("LOGIN_USER_EMAIL");
                    $reg_new['subject'] = "Thank Prospects for signing up";
                    Mail::send("front/sendpassword",$data,function($mess) use ($reg_new){
                        $mess->to($reg_new['email']);
                        $mess->subject($reg_new['subject']);
                    });
            }
        }
            $cart_data =  getCartResult();
            $total_price = 0;
            foreach($cart_data as $val){
                $total_price = $total_price + ($val->price * $val->quanity);
            }
            if($req->input('coupon_code') != ''){
                $arr = coupon_code_check($req->input('coupon_code'));
                $arr = json_decode($arr,true);
                if($arr['status'] == 'error'){
                    return json_encode(["status" => "error2", "message" => $arr['message']]);
                }
                else{
                $coupon_value = $arr['coupon_value'];
                $total_price = $arr['total_price'];
                }
            }
            else{
                $coupon_value = 0;
            }
            $valid = Validator::make($req->all(),[
                "name"=>"required|min:3",
                "email"=>"required|email",
                "mobile"=>"required|digits:10",
                "address"=>"required|min:16",
                "locality"=>"required|min:5",
                "locality"=>"required|min:5",
                "city"=>"required|min:3",
                "state"=>"required|min:3",
                "zip"=>"required|digits:6"
            ]);
            if(!$valid->passes()){
                return json_encode(["status"=>"error", "error"=>$valid->errors()->toArray()]);
            }
            $orders_id = DB::table("orders")
                ->insertGetId([
                    "customer_id" =>  $req->session()->get('LOGIN_USER_ID'),
                    "name"=>$req->input('name'),
                    "email"=>$req->input('email'),
                    "mobile"=>$req->input('mobile'),
                    "address"=>$req->input('address'),
                    "locality"=>$req->input('locality'),
                    "city"=>$req->input('city'),
                    "state"=>$req->input('state'),
                    "zip"=>$req->input('zip'),
                    "coupon_code"=>$req->input('coupon_code'),
                    "coupon_value"=>$coupon_value,
                    "orders_status"=>1,
                    "payment_type"=>$req->input('payment_type'),
                    "payment_status"=>"Pending",
                    "payment_id"=>0,
                    "total_amount"=>$total_price
                ]);
            if ($orders_id > 0) {
                foreach ($cart_data as $key => $val) {
                    DB::table('orders_details')
                    ->insert([
                        "orders_id" => $orders_id,
                        "product_id"=> $val->product_id,
                        "product_attrs_id"=> $val->product_attr_id,
                        "price"=> $val->price,
                        "quantity"=> $val->quanity
                    ]);
                }
                DB::table('carts')
                    ->where('user_id',$req->session()->get('LOGIN_USER_ID'))
                    ->delete();
                if ($req->input('payment_type') =='Gateway') {
                    
                    $ch = curl_init();

                        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
                        curl_setopt($ch, CURLOPT_HEADER, FALSE);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                        curl_setopt($ch, CURLOPT_HTTPHEADER,
                                    array("X-Api-Key:test_fd0fcbabddf315f893d2e5156db",
                                        "X-Auth-Token:test_51da3c3eb7a0bd2162656f5c4cd"));
                        $payload = Array(
                            'purpose' => 'Buy Product',
                            'amount' => $total_price,
                            'phone' => $req->input('mobile'),
                            'buyer_name' => $req->input('name'),
                            'redirect_url' => 'http://localhost:8000/instamojo',
                            'send_email' => true,
                            'send_sms' => true,
                            'email' => $req->input('email'),
                            'allow_repeated_payments' => false
                        );
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                        $response = curl_exec($ch);
                        $response = json_decode($response);
                        $redirectTo=$response->payment_request->longurl;
                        $transaction_id=$response->payment_request->id;
                        curl_close($ch);

                        DB::table("orders")
                            ->where("id",$orders_id)
                            ->update([
                                "transaction_id"=>$transaction_id
                            ]);

                        
                }
            return json_encode(["status"=>"success","message" => "order Confirmed", "redirectTo" => $redirectTo]);
            }
    }


    function instamojo(Request $req){
        if ($req->input('payment_request_id') != null && $req->input('payment_status') != null && $req->input('payment_status') != null) {
            DB::table("orders")
                    ->where("transaction_id",$req->input('payment_request_id'))
                    ->update([
                        "payment_status"=>$req->input('payment_status'),
                        "payment_id"=>$req->input('payment_id'),
                    ]);
            return redirect('/');
        }
        else{
            return "Somthing Went Wrong";
        }
    }
    function order(){
        $result['orders'] = DB::table('orders')
                        ->leftJoin('orders_status','orders_status.id','=','orders.orders_status')
                        // ->leftJoin('orders_details','orders_details.id','=','orders.id')
                        ->select("orders.*","orders_status.order_status")
                        ->where("orders.customer_id",session()->get("LOGIN_USER_ID"))
                        ->get();
                        // prx($result['orders']);
        return view("front.order",$result);
    }
    function order_details(Request $req,$id){
        $result['order_details'] = DB::table('orders_details')
                        ->leftJoin('products','products.id','=','orders_details.product_id')
                        ->leftJoin('orders','orders.id','=','orders_details.orders_id')
                        ->leftJoin('orders_status','orders_status.id','=','orders.orders_status')
                        ->leftJoin('product_attrs','product_attrs.id','=','orders_details.product_attrs_id')
                        ->leftJoin('sizes','sizes.id','=','product_attrs.size')
                        ->leftJoin('colors','colors.id','=','product_attrs.color_id')
                        ->select("orders.id","products.title","product_attrs.attr_img", "sizes.size", "colors.color", "product_attrs.price", "orders_details.quantity","orders.name","orders.mobile", "orders.mobile","orders.address","orders.locality","orders.city","orders.state","orders.zip","orders.coupon_code","orders.coupon_value","orders_status.order_status","orders.payment_type","orders.payment_id","orders.total_amount")
                        ->where(["orders.customer_id"=>$req->session()->get('LOGIN_USER_ID')])
                        ->where(["orders_details.orders_id"=>$id])
                        ->get();
                        // prx($result['order_details']);
        return view("front.order_details",$result);

    }
    function review_submit(Request $req){
    date_default_timezone_set('Asia/Kolkata');
        DB::table('review')
            ->insert([
                "customer_id"=>$req->session()->get('LOGIN_USER_ID'),
                "product_id"=>$req->input('product_id'),
                "rating"=>$req->input('rating'),
                "review"=>$req->input('message'),
                "created_at"=>date("Y-m-d h:i:s"),
            ]);
        $slug=$req->input('slug');
        // echo $slug;
        return redirect('product/'.$slug);
    }
    function contactus(){
        return view('front.contactus');
    }
    function wishlist(){
        return view('front.wishlist');
    }
}