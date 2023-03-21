@extends('admin/layout')
@section('title','Manage Product')
@section('product','active')
@section('container')
<h1>Manage Product</h1>
<a class='my-3' href="{{url('admin/product')}}">
    <button type='button' class='btn btn-success'>Back</button>
</a>
<form action="{{route('manage_product_process')}}" method="post"  enctype='multipart/form-data'>
<div class="card">
    <div class="card-body">
            @csrf
            <input type="hidden" name="id" value='{{$product_id}}'>
            <div class="form-group">
                <label for="title" class="control-label mb-1">Title</label>
                <input id="title" name="title" type="text" class="form-control" value="{{$title}}">
            </div>
            @error('title')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror
            <div class="form-group">
                <label for="slug" class="control-label mb-1">Slug</label>
                <input id="slug" name="slug" type="text" class="form-control" value="{{$slug}}">
            </div>
            @error('slug')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="model" class="control-label mb-1">Model</label>
                        <input id="model" name="model" type="text" class="form-control" value="{{$model}}">
                    </div>
                    @error('model')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                    <label for="brand" class="control-label mb-1">Brand</label>
                    <select id="brand" name="brand" type="text" class="form-control">
                        <option selected value="0">Select</option>
                        @foreach($brand_array as $bra)
                            @if($bra->id==$brand)
                            <option selected value="{{$bra->id}}">{{$bra->brand}}</option>
                            @else
                            <option value="{{$bra->id}}">{{$bra->brand}}</option>
                            @endif
                        @endforeach
                    </select>
                    </div>
                    @error('brand')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_id" class="control-label mb-1">Category</label>
                        <select id="category_id" name="category_id" type="text" class="form-control">
                        <option  selected value="0">Select</option>
                        @foreach($category_array as $cat)
                            @if($cat->id==$category_id)
                            <option selected value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @else
                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="control-label mb-1">Image</label>
                <input id="image" name="image" type="file" class="form-control">
            </div>
            @if($image)
            <a href="{{asset('storage/products/'.$image)}}" target="_blank">
                <img src="{{asset('storage/products/'.$image)}}" alt="" width='100px' height='auto'>
            </a>
            @endif
            @error('image')
                <div class='alert alert-danger'>
                {{$message}}
            @enderror
            <div class="form-group">
                <label for="keywords" class="control-label mb-1">Keywords</label>
                <input id="keywords" name="keywords" type="text" class="form-control" value="{{$keywords}}">
            </div>
            @error('keywords')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror
            <div class="form-group">
                <label for="technical_specification" class="control-label mb-1">Technical Specification</label>
                <input id="technical_specification" name="technical_specification" type="text" class="form-control" value="{{$technical_specification}}">
            </div>
            @error('technical_specification')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror
            <div class="form-group">
                <label for="uses" class="control-label mb-1">Uses</label>
                <input id="uses" name="uses" type="text" class="form-control" value="{{$uses}}">
            </div>
            @error('uses')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror
            <div class="form-group">
                <label for="warranty" class="control-label mb-1">Warranty</label>
                <input id="warranty" name="warranty" type="text" class="form-control" value="{{$warranty}}">
            </div>
            @error('warranty')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror
            <div class="form-group">
                <label for="short_desc" class="control-label mb-1">Short Description</label>
                <textarea rows="30" style="height:200px" cols="50" id="short_desc" name="short_desc" type="text" class="form-control">{{$short_desc}}</textarea>
            </div>
            @error('short_desc')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror
            <div class="form-group">
                <label for="desc" class="control-label mb-1">Description</label>
                <textarea id="desc" name="desc" type="text" class="form-control" >{{$desc}}</textarea>
            </div>
            @error('desc')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <h2>Tax Details</h2>
                </div>
                <div class="col-md-4">
                    <label for="tax">Tax Type</label>
                    <select id="tax" name="tax_id" type="text" class="form-control">
                        <option  selected value="">Select</option>
                        @foreach($tax_array  as $tx)
                        @if($tx->id==$tax_id)
                        <option selected value="{{$tx->id}}">{{$tx->tax_desc}}</option>
                        @else
                        <option value="{{$tx->id}}">{{$tx->tax_desc}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="is_promo">is_promo</label>
                    <select id="is_promo" name="is_promo" type="text" class="form-control">
                        @if($is_promo==1)
                        <option  selected value="">Select</option>
                        <option selected value="1">Yes</option>
                        <option value="0">No</option>
                        @elseif($is_promo==0)
                        <option  selected value="">Select</option>
                        <option value="1">Yes</option>
                        <option selected value="0">No</option>
                        @else
                        <option  selected value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="is_featured">is_featured</label>
                    <select id="is_featured" name="is_featured" type="text" class="form-control">
                        @if($is_featured==1)
                        <option  selected value="">Select</option>
                        <option selected value="1">Yes</option>
                        <option value="0">No</option>
                        @elseif($is_featured==0)
                        <option  selected value="">Select</option>
                        <option value="1">Yes</option>
                        <option selected value="0">No</option>
                        @else
                        <option  selected value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="is_discounted">is_discounted</label>
                    <select id="is_discounted" name="is_discounted" type="text" class="form-control">
                        @if($is_discounted==1)
                        <option  selected value="">Select</option>
                        <option selected value="1">Yes</option>
                        <option value="0">No</option>
                        @elseif($is_discounted==0)
                        <option  selected value="">Select</option>
                        <option value="1">Yes</option>
                        <option selected value="0">No</option>
                        @else
                        <option  selected value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="is_tranding">is_tranding</label>
                    <select id="is_tranding" name="is_tranding" type="text" class="form-control">
                        @if($is_tranding==1)
                        <option  selected value="">Select</option>
                        <option selected value="1">Yes</option>
                        <option value="0">No</option>
                        @elseif($is_tranding==0)
                        <option  selected value="">Select</option>
                        <option value="1">Yes</option>
                        <option selected value="0">No</option>
                        @else
                        <option  selected value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        @endif
                    </select>
                </div>
            </div>
            
    </div>
</div>

<h3>Product Attribute</h3>
<div id='pro_attr'>
    @php
    $loopcount=1;
    @endphp
    @foreach($proAttrArray as $key => $value )
    @php
    $arr=(Array)$value;
    @endphp
    <div class="card"  id="ids{{$loopcount++}}">
        <div class="card-body" >
            <div class="row">
                <input id="attribute_id" name="attribute_id[]" value="{{$arr['id']}}" type="hidden" class="form-control" >
                <div class="col-md-3" id='sku_id'>
                    <div class="form-group">
                        <label for="sku" class="control-label mb-1">SKU</label>
                        <input id="sku" name="sku[]" value="{{$arr['sku']}}" type="text" class="form-control" >
                    </div>
                </div>
                <div class="col-md-2" id='mrp_id'>
                    <div class="form-group">
                        <label for="mrp" class="control-label mb-1">MRP.</label>
                        <input id="mrp" name="mrp[]" value="{{$arr['mrp']}}" type="number" class="form-control">
                    </div>
                </div>
                <div class="col-md-2" id='price_id'>
                    <div class="form-group">
                        <label for="price" class="control-label mb-1">Selling Price</label>
                        <input id="price" name="price[]" value="{{$arr['price']}}" type="number" class="form-control" >
                    </div>
                </div>
                <div class="col-md-2" id='size_id'>
                    <div class="form-group">
                        <label for="size" class="control-label mb-1">Size</label>
                        <select id="size" name="size[]" type="text" class="form-control">
                            <option  selected value="">Select</option>
                            @foreach($size_ret  as $sz)
                            @if($sz->id==$arr['size'])
                            <option selected value="{{$sz->id}}">{{$sz->size}}</option>
                            @else
                            <option value="{{$sz->id}}">{{$sz->size}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2" id='quantity_id'>
                    <div class="form-group">
                        <label for="quantity" class="control-label mb-1">Quantity</label>
                        <input id="quantity" name="quantity[]" value="{{$arr['quantity']}}" type="number" class="form-control" >
                    </div>
                </div>
                <div class="col-md-3" id='color_id'>
                    <div class="form-group">
                        <label for="color" class="control-label mb-1">Color</label>
                        <select id="color" name="color[]" type="text" class="form-control">
                            <option selected  value="">Select</option>
                            @foreach($color as $col)
                            @if($col->id==$arr['color_id'])
                            <option selected value="{{$col->id}}">{{$col->color}}</option>
                            @else
                            <option value="{{$col->id}}">{{$col->color}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3" id='attr_img_id'>
                    <div class="form-group">
                        <label for="attr_img" class="control-label mb-1">Attribute Image</label>
                        <input id="attr_img" name="attr_img[]" type="file" class="form-control"  multiple>
                    </div>
                </div> 
                @if($arr['attr_img'])
                <a href="{{asset('storage/products/'.$arr['attr_img'])}}" target="_blank">
                    <img width='100px' src="{{asset('storage/products/'.$arr['attr_img'])}}" alt="" >
                </a>
                @endif
                @if($loopcount==2)
                <div class="col-md-3">
                    <br>
                    <button type="button" onclick='add_more()' class="btn-lg btn-success">
                        <i class="fa fa-plus"></i>&nbsp; Add More
                    </button>
                </div>
                @else
                <div class="col-md-3">
                    <br>
                    <a href="{{url('admin/product_attr/delete/'.$product_id)}}/{{$arr['id']}}">
                        <button type="button" onclick='remove_this({{$loopcount-1}})' class="btn-lg btn-danger">
                            <i class="fa fa-minus"></i>&nbsp; Remove
                        </button>
                    </a>
                </div>
                @endif

            </div>
        </div>
    </div>
    @endforeach
</div>
<div >
    <div class="card"  id="pmi">
        <div class="card-body" >
            <div class="row" id="product_multiple_images">
                @php
                $loopcnt=1;
                @endphp
                @foreach($proImgArray as $key => $value )
                @php
                $arr=(Array)$value;
                $loopcnt++;
                @endphp
                <div class='col-md-6'>
                    <div class="row">
                        <input id="product_image_id" name="product_image_id[]" value="{{$arr['id']}}" type="hidden" class="form-control" >
                        <div class="col-md-8" id='product_img_id'>
                            <div class="form-group">
                                <label for="product_img" class="control-label mb-1">Product Image</label>
                                <input id="product_img" name="product_img[]" type="file" class="form-control">
                                @if($arr['product_images'])
                                <a href="{{asset('storage/products/'.$arr['product_images'])}}" target="_blank">
                                    <img width="100px" src="{{asset('storage/products/'.$arr['product_images'])}}" alt="">
                                </a>
                                @endif
                            </div>
                        </div> 
                        @if($loopcnt==2)
                        <div class="col-md-4">
                            <br>
                            <button type="button" onclick='add_more_image()' class="btn btn-success">
                                <i class="fa fa-plus"></i>&nbsp; Add More
                            </button>
                        </div>
                        @else
                        <div class="col-md-4">
                            <br>
                            <a href="{{url('admin/product_images/delete/'.$product_id)}}/{{$arr['id']}}">
                                <button type="button" class="btn btn-danger">
                                    <i class="fa fa-minus"></i>&nbsp; Remove
                                </button>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

                <button id="coupon-button" type="submit" class="btn btn-lg btn-info btn-block">
                    Submit
                </button>
        </form>
        <script>
            // Product Attribute.....
            function assignData(){
                $("#ideas"+loop+" #attribute_id").val("");
                $("#ideas"+loop+" #sku").val("");
                $("#ideas"+loop+" #mrp").val("");
                $("#ideas"+loop+" #price").val("");
                $("#ideas"+loop+" #size").val("");
                $("#ideas"+loop+" #quantity").val("");
                $("#ideas"+loop+" #color").val("");
            }
            function assignData2(){
                $("#pro_mul_img_"+loop2+" img").attr("src","");
                $("#pro_mul_img_"+loop2+" #product_image_id").val("");
            }
            var loop=1;
            var loop2=1;
            function add_more(){
                loop++;
                var html="<div id='ideas"+loop+"' class='card'><div class='card-body' ><div class='row'>";
                html+=document.querySelector('#attribute_id').outerHTML;
                html+=document.querySelector('#sku_id').outerHTML;
                html+=document.querySelector('#mrp_id').outerHTML;
                html+=document.querySelector('#price_id').outerHTML;
                html+=document.querySelector('#size_id').outerHTML;
                html+=document.querySelector('#quantity_id').outerHTML;
                html+=document.querySelector('#color_id').outerHTML;
                html+=document.querySelector('#attr_img_id').outerHTML;
                html+="<div class='col-md-3'><br><button type='button' onclick='remove_this("+loop+")' class='btn-lg btn-danger'><i class='fa fa-minus'></i>&nbsp; Remove</button></div>";
                html+="</div></div></div>";
                $("#pro_attr").append(html);
                assignData();
            }
            function remove_this(loop){
                $("#ideas"+loop).remove();
            }
            //Product Images
            function add_more_image(){
                loop2++;
                var html="<div class='col-md-6' id='pro_mul_img_"+loop2+"'><div class='row'>";
                html+=document.querySelector("#product_image_id").outerHTML;
                html+=document.querySelector("#product_img_id").outerHTML;
                html+="<div class='col-md-4'><br><button type='button' onclick='remove_this_images("+loop2+")' class='btn btn-danger'><i class='fa fa-minus'></i>&nbsp; Remove</button></div>";
                html+="</div></div>";
                $("#product_multiple_images").append(html);
                assignData2();
            }
            function remove_this_images(i){
                $("#pro_mul_img_"+i).remove();
            }
        </script>
        <script>
    ClassicEditor
        .create( document.querySelector( '#short_desc' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#desc' ) )
        .catch( error => {
            console.error( error );
        } );
        </script>
@endsection
