<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.product')->with(['data'=>product::all()]);
    }
    public function manage_product(Request $req,$id='')
    {   
        if($id==''){
            $send['product_id']=$id;
            $send['category_id']='';
            $send['title']='';
            $send['brand']='';
            $send['slug']='';
            $send['model']='';
            $send['image']='';
            $send['short_desc']='';
            $send['desc']='';
            $send['keywords']='';
            $send['technical_specification']='';
            $send['uses']='';
            $send['warranty']='';
            $send['brand']='';
            $send['category_id']='';
            $send['tax_id']='';
            $send['is_promo']='';
            $send['is_featured']='';
            $send['is_discounted']='';
            $send['is_tranding']='';
            $send['tax_array']=DB::table('taxes')->where('tax_status','1')->get();
            $send['category_array']=DB::table('categories')->where('category_status','1')->get();
            $send['brand_array']=DB::table('brands')->where('brand_status','1')->get();
            $send['color']=DB::table('colors')->where('color_status','1')->get();
            $send['size_ret']=DB::table('sizes')->where('size_status','1')->get();
            // Product Attribute
            $send['proAttrArray'][0]['id']='';
            $send['proAttrArray'][0]['product_id']='';
            $send['proAttrArray'][0]['sku']='';
            $send['proAttrArray'][0]['mrp']='';
            $send['proAttrArray'][0]['price']='';
            $send['proAttrArray'][0]['size']='';
            $send['proAttrArray'][0]['quantity']='';
            $send['proAttrArray'][0]['color_id']='';
            $send['proAttrArray'][0]['attr_img']='';

            $send['proImgArray'][0]['id']='';
            $send['proImgArray'][0]['product_images']='';
            $send['proImgArray'][0]['product_image_id']='';
            
        }
        else{
            $data=product::find($id);
            $send['product_id']=$id;
            $send['category_id']=$data['category_id'];
            $send['brand']=$data['brand'];
            $send['title']=$data['title'];
            $send['slug']=$data['slug'];
            $send['model']=$data['model'];
            $send['image']=$data['image'];
            $send['short_desc']=$data['short_desc'];
            $send['desc']=$data['desc'];
            $send['keywords']=$data['keywords'];
            $send['technical_specification']=$data['technical_specification'];
            $send['uses']=$data['uses'];
            $send['warranty']=$data['warranty'];
            $send['tax_id']=$data['tax_id'];
            $send['is_promo']=$data['is_promo'];
            $send['is_featured']=$data['is_featured'];
            $send['is_discounted']=$data['is_discounted'];
            $send['is_tranding']=$data['is_tranding'];
            $send['warranty']=$data['warranty'];
            
            $send['tax_array']=DB::table('taxes')->where('tax_status','1')->get();
            $send['brand_array']=DB::table('brands')->where('brand_status','1')->get();
            $send['category_array']=DB::table('categories')->where('category_status','1')->get();
            $send['color']=DB::table('colors')->where('color_status','1')->get();
            $send['size_ret']=DB::table('sizes')->where('size_status','1')->get();
            $send['color']=DB::table('colors')->where('color_status','1')->get();
            $send['proAttrArray']=DB::table('product_attrs')->where('product_id',$id)->get();

            $proImgArray=DB::table('product_images')->where('product_id',$id)->get();
            if(!isset($proImgArray[0])){
                $send['proImgArray'][0]['id']='';
                $send['proImgArray'][0]['product_images']='';
                $send['proImgArray'][0]['product_image_id']='';
            }
            else{
                $send['proImgArray']=$proImgArray;
            }
        }
        return view('admin/manage_product',$send);
    }

    public function manage_product_process(Request $req)
    {
        // Protduct Attribute...
        if($req->input('id')){
            $val="mimes:jpg,png,jpeg";
        }
        else{
            $val="required|mimes:jpg,png,jpeg";
        }
        $req->validate([
            "title"=>"required",
            "slug"=>"required|unique:products,slug,".$req->input('id'),
            "brand"=>"required",
            "image"=>$val,
            "category_id"=>"required",
        ]);
        if($req->input('id')){
            $id=$req->input('id');
            $update=product::find($req->input('id'));
            $update->title=$req->input('title');
            $update->category_id=$req->input('category_id');
            $update->slug=$req->input('slug');
            $update->brand=$req->input('brand');
            $update->model=$req->input('model');
            $update->short_desc=$req->input('short_desc');
            $update->desc=$req->input('desc');
            $update->keywords=$req->input('keywords');
            $update->technical_specification=$req->input('technical_specification');
            $update->uses=$req->input('uses');
            $update->warranty=$req->input('warranty');
            $update->tax_id=$req->input('tax_id');
            $update->is_promo=$req->input('is_promo');
            $update->is_featured=$req->input('is_featured');
            $update->is_discounted=$req->input('is_discounted');
            $update->is_tranding=$req->input('is_tranding');
            if($req->hasFile('image')){
                echo "<pre>";
                print_r($update['image']);
                Storage::delete("public/products/".$update['image']);
                $img=$req->file('image');
                $ext=$img->extension();
                $img_name=time().".".$ext;
                $img->storeAs('public/products',$img_name);
                $update->image=$img_name;
            }
            $req->session()->flash('msg','Product Updated Successfully.....!!');
            $update->save();
            
            // Product Attribute... 
            
            $skuArr=$req->post('sku');
            $mrpArr=$req->post('mrp');
            $priceArr=$req->post('price');
            $sizeArr=$req->post('size');
            $quantityArr=$req->post('quantity');
            $colorArr=$req->post('color');
            $data=$req->post('attribute_id');

            foreach ($data as $key => $value) {
                if($data[$key]>0){


                    if($req->hasFile("attr_img.$key")){
                        
                        $ran=rand(0,999999999);
                        $att=$req->file("attr_img.$key");
                        $ext=$att->extension();
                        $img_n=$ran.".".$ext;
                        $check=DB::table('product_attrs')->where('id',$data[$key])->get();
                        Storage::delete("public/products/".$check[0]->attr_img);
                        $att->storeAs('public/products',$img_n);
                        $img_name=$img_n;
                        DB::table('product_attrs')->where('id',$data[$key])->update([
                        'sku'=>$skuArr[$key],
                        'mrp'=>$mrpArr[$key],
                        'price'=>$priceArr[$key],
                        'size'=>$sizeArr[$key],
                        'quantity'=>$quantityArr[$key],
                        'color_id'=>$colorArr[$key],
                        'attr_img'=>$img_name
                        ]);
                    }
                    else{
                        DB::table('product_attrs')->where('id',$data[$key])->update([
                            'sku'=>$skuArr[$key],
                            'mrp'=>$mrpArr[$key],
                            'price'=>$priceArr[$key],
                            'size'=>$sizeArr[$key],
                            'quantity'=>$quantityArr[$key],
                            'color_id'=>$colorArr[$key]
                            ]);
                    }
                    
                }
                else{
                    $ran=rand(0,999999999);
                    if($req->hasFile("attr_img.$key")){
                        $imgArr=$req->file("attr_img.$key");
                        $ext=$imgArr->extension();
                        $img_name=$ran.".".$ext;
                        $imgArr->storeAs('public/products',$img_name);
                    }
                    DB::table('product_attrs')->insert(array(
                        "product_id"=>$id,
                        "sku"=>$skuArr[$key],
                        "mrp"=>$mrpArr[$key],
                        "price"=>$priceArr[$key],
                        "size"=>$sizeArr[$key],
                        "quantity"=>$quantityArr[$key],
                        "color_id"=>$colorArr[$key],
                        "attr_img"=>$img_name
                    ));
                }
            }

            $product_image_id=$req->input('product_image_id');
            
            // Product Multiple Images 
            foreach ($product_image_id as $key => $value) {

                if($product_image_id[$key]>0){

                    if($req->hasFile("product_img.$key")){
                        $ran=rand(0,999999999).rand(0,999999999);
                        $att=$req->file("product_img.$key");
                        $ext=$att->extension();
                        $img_n=$ran.".".$ext;
                        $att->storeAs('public/products',$img_n);
                        $img_name=$img_n;
                        $check=DB::table('product_images')->where('id',$product_image_id[$key])->get();
                        Storage::delete("public/products/".$check[0]->product_images);
                        DB::table('product_images')->where('id',$product_image_id[$key])->update([
                            'product_images'=>$img_name
                        ]);
                    }
                }
                else{
                    $ran=rand(0,999999999).rand(0,999999999);
                    if($req->hasFile("product_img.$key")){
                        $imgArr=$req->file("product_img.$key");
                        $ext=$imgArr->extension();
                        $img_name=$ran.".".$ext;
                        $imgArr->storeAs('public/products',$img_name);
                        DB::table('product_images')->insert(array(
                            "product_id"=>$id,
                            "product_images"=>$img_name
                        ));
                    }
                }
            }
            }
        // Code For Product Insertion...
        else{
            // echo $req->input('tax_id');
            // die();
            $new=new product();
            $new->title=$req->input('title');
            $new->category_id=$req->input('category_id');
            $new->slug=$req->input('slug');
            $new->brand=$req->input('brand');
            $new->model=$req->input('model');
            $new->short_desc=$req->input('short_desc');
            $new->desc=$req->input('desc');
            $new->keywords=$req->input('keywords');
            $new->technical_specification=$req->input('technical_specification');
            $new->uses=$req->input('uses');
            $new->warranty=$req->input('warranty');
            $new->tax_id=$req->input('tax_id');
            $new->is_promo=$req->input('is_promo');
            $new->is_featured=$req->input('is_featured');
            $new->is_discounted=$req->input('is_discounted');
            $new->is_tranding=$req->input('is_tranding');
            if($req->hasFile('image')){
                $img=$req->file('image');
                $ext=$img->extension();
                $img_name=time().".".$ext;
                $img->storeAs('public/products',$img_name);
                $new->image=$img_name;
            }
            $new->save();

            // Product Attribute Code
            $id=$new->id;
            $skuArr=$req->post('sku');
            $mrpArr=$req->post('mrp');
            $priceArr=$req->post('price');
            $quantityArr=$req->post('quantity');
            $skuArr=$req->post('sku');
            $sizeArr=$req->post('size');
            $colorArr=$req->post('color');
            foreach($skuArr as $key => $val){
                $size = isset($sizeArr['$key']) ? $sizeArr['$key'] : null;
                $color = isset($colorArr['$key']) ? $colorArr['$key'] : null;
                $ran=rand(0,999999999);
                if($req->hasFile("attr_img.$key")){
                    $imgArr=$req->file("attr_img.$key");
                    $ext=$imgArr->extension();
                    $img_name=$ran.".".$ext;
                    $imgArr->storeAs('public/products',$img_name);
                }
                DB::table('product_attrs')->insert(array(
                    "product_id"=>$id,
                    "sku"=>$skuArr[$key],
                    "mrp"=>$mrpArr[$key],
                    "price"=>$priceArr[$key],
                    "size"=>$size,
                    "quantity"=>$quantityArr[$key],
                    "color_id"=>$color,
                    "attr_img"=>$img_name
                ));
            }

            // Code  for  Product Image Insertion...
            $product_image_id=$req->post('product_image_id');
            foreach ($product_image_id as $key => $va) {
                $ran=rand(0,999999999).rand(0,999999999);
                if($req->hasFile("product_img.$key")){
                    $proImgArr=$req->file("product_img.$key");
                    $ext=$proImgArr->extension();
                    $img_name=$ran.".".$ext;
                    $proImgArr->storeAs('public/products',$img_name);
                    DB::table('product_images')->insert(array(
                        'product_id'=>$id,
                        'product_images'=>$img_name
                    ));
                }
            }
            $req->session()->flash('msg','Product Inserted Successfully.....!!');
        }
        
        return redirect('admin/product');
    }


    public function delete_product(Request $req,$id)
    {
        $data=product::find($id);
        Storage::delete("public/products/".$data['image']);
        $find=product::find($id);
        $find->delete();
        $req->session()->flash('msg','Product Deleted Successfully.....!!!!');
        $data2=DB::table('product_attrs')->where('product_id',$id)->get();
        foreach ($data2 as $key => $val) {
            Storage::delete("public/products/".$val->attr_img);
        }
        DB::table('product_attrs')->where('product_id',$id)->delete();
        $data3=DB::table('product_images')->where('product_id',$id)->get();
        echo "<pre>";
        foreach ($data3 as $key => $val) {
            Storage::delete("public/products/".$val->product_images);
        }
        DB::table('product_images')->where('product_id',$id)->delete();
        return redirect('admin/product');
    }
    public function update_status_product(Request $req, $status, $id)
    {
        $find=product::find($id);
        $find->product_status=$status;
        $find->save();
        $req->session()->flash('msg','Status Updated Successfully.....!!!!');
        return redirect('admin/product');
    }
    public function product_attribute_delete(Request $req,$prod_id,$attr_id)
    {
        $data=DB::table('product_attrs')->where('id',$attr_id)->get();
        if(Storage::exists("public/products/".$data[0]->attr_img)){
            Storage::delete("public/products/".$data[0]->attr_img);
        }
        DB::table('product_attrs')->where('id',$attr_id)->delete();
        return redirect('admin/product/manage_product/'.$prod_id);
    }
    public function product_images_delete(Request $req,$prod_id,$pro_img_id)
    {   
        $data=DB::table("product_images")->where("id",$pro_img_id)->get();
        if(Storage::exists("public/products/".$data[0]->product_images)){
            Storage::delete("public/products/".$data[0]->product_images);
        }
        DB::table('product_images')->where('id',$pro_img_id)->delete();
        return redirect('admin/product/manage_product/'.$prod_id);
    }
}
