@extends("Front/layout")
@section('title','Product Details')
@section('container')
    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
   <img src="{{asset('front_asset/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>T-Shirt</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li><a href="#">Product</a></li>
          <li class="active">T-shirt</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content" style="margin: 0px; width:100%">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="{{asset('storage/products/'.$product_details[0]->image)}}" class="simpleLens-lens-image"><img src="{{asset('storage/products/'.$product_details[0]->image)}}" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                        <a data-big-image="{{asset('storage/products/'.$product_details[0]->image)}}" data-lens-image="{{asset('storage/products/'.$product_details[0]->image)}}" class="simpleLens-thumbnail-wrapper" href="#">
                          <img width="50px" src="{{asset('storage/products/'.$product_details[0]->image)}}">
                        </a> 
                        @foreach($product_details_img[$product_details[0]->id] as $key => $val)
                            <a data-big-image="{{asset('storage/products/'.$val->product_images)}}" data-lens-image="{{asset('storage/products/'.$val->product_images)}}" class="simpleLens-thumbnail-wrapper" href="#">
                              <img width="50px" src="{{asset('storage/products/'.$val->product_images)}}">
                            </a> 
                        @endforeach  
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{$product_details[0]->title}}</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">₹ {{$product_details_attr[$product_details[0]->id][0]->price}}</span>
                      <span class="aa-product-view-price text-danger"><strong><del>₹ {{$product_details_attr[$product_details[0]->id][0]->mrp}} </del></strong></span>
                      <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                    </div>
                    {!! $product_details[0]->short_desc !!}
                    <?php
                    $max=[];
                    foreach($product_details_attr[$product_details[0]->id] as $val){
                      $max[]=$val->size;
                    }
                    ?>
                    @if(max($max)>0)
                    <h4>Size</h4>
                    <div class="aa-prod-view-size">
                      @php
                      $arr=[];
                      foreach($product_details_attr[$product_details[0]->id] as $key =>  $val){
                        $arr[]=$val->size;
                      }
                      $arr=array_unique($arr);
                      @endphp
                      @foreach($arr as $key =>  $val)
                      @if($val!=null)
                      <a href='javascript:void(0)' class="all_size" id="show_{{$val}}" onclick="show_color('{{$val}}')">{{$val}}</a>
                      @endif
                      @endforeach
                    </div>
                    @endif

                    <?php
                    $x=[];
                    foreach($product_details_attr[$product_details[0]->id] as $val){
                      $x[]=$val->color_id;
                    }
                    ?>
                    @if(max($x)>0)
                    <h4>Color</h4>
                    <div class="aa-color-tag">
                      @foreach($product_details_attr[$product_details[0]->id] as $key =>  $val)

                      @if($val->color!=null)
                      <a href="javascript:void(0)" class="hideClass aa-color-{{strtolower($val->color)}}  show_{{$val->size}}" onclick="pic_change_with_color('{{$val->attr_img}}','{{$val->color}}')"></a>
                      @endif
                    @endforeach
                  </div>
                  @endif
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="quantity" name="">
                          @for($i=1; $i < 11; $i++)
                          <option value="{{$i}}">{{$i}}</option>
                          @endfor
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Model: <a href="#">{{$product_details[0]->model}}</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="javascript:void(0)" onclick="add_to_cart({{$product_details[0]->id}})">Add To Cart</a>
                      <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                      <a class="aa-add-to-cart-btn" href="#">Compare</a>
                    </div>
                    <div style="margin-top:5px" class="mt-3" id="error_msg">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">

              <ul class="nav nav-tabs" id="myTab2">
                <li>
                  <a href="#uses" data-toggle="tab" aria-expanded="true" >Uses</a></li>                
                <li><a href="#technical_specification" data-toggle="tab">Technical Specification</a></li>                
                <li><a href="#Warranty" data-toggle="tab">Warranty</a></li>                
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="uses">
                  <p>{!! $product_details[0]->uses !!}</p>
                </div>
                <div class="tab-pane fade" id="technical_specification">
                  <p>{!! $product_details[0]->technical_specification !!}</p>
                </div>
                <div class="tab-pane fade" id="warranty">
                  <p>{!! $product_details[0]->warranty !!}</p>
                </div>
                <div class="tab-pane fade" id="description">
                  <p>{!! $product_details[0]->desc !!}</p>
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                  @if(isset($order_review[0]->id))
                   <h4>{{count($order_review)}} Reviews for T-Shirt</h4> 
                   <ul class="aa-review-nav">
                    @foreach($order_review as $val)
                      <li>
                        <div class="media">
                          <div class="media-body">
                            <h4 class="media-heading"><strong>{{$val->name}}</strong> - <span>{{$val->created_at}}</span></h4>
                            <div class="aa-product-rating">
                              @for($i=1; $i<=5; $i++)
                                @if($i<=$val->rating)
                                  <span class="fa fa-star"></span>
                                @else
                                  <span class="fa fa-star-o"></span>
                                @endif
                              @endfor
                            </div>
                            <p>{{$val->review}}</p>
                          </div>
                        </div>
                      </li>
                    @endforeach
                  </ul>
                  @else
                  <h2>No Review Found</h2>
                  @endif
                  <h4>Add a review</h4>
                   <div id="star-rating-review" class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="javascript:void(0)"><span class="fa fa-star-o"></span></a>
                     <a href="javascript:void(0)"><span class="fa fa-star-o"></span></a>
                     <a href="javascript:void(0)"><span class="fa fa-star-o"></span></a>
                     <a href="javascript:void(0)"><span class="fa fa-star-o"></span></a>
                     <a href="javascript:void(0)"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="{{url('product/review_submit')}}" class="aa-review-form" method="post">
                      <div class="form-group">
                        <input type="hidden" name="product_id" value="{{$product_details[0]->id}}">
                        <input type="hidden" name="slug" value="{{$product_details[0]->slug}}">
                        <input type="hidden" name="rating" value="" id="review-rating">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" name="message"></textarea>
                        @csrf
                      </div>
                      <!-- <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div> -->

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @foreach($related_product_details as $val)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{url('product/'.$val->slug)}}"><img width="250px" height="300px" src="{{asset('storage/products/'.$val->image)}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_cart({{$val->id}},'{{$related_product_details_attr[$val->id][0]->size}}','{{$related_product_details_attr[$val->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="{{url('product/'.$val->slug)}}">{{$val->title}}</a></h4>
                      <span class="aa-product-price">₹ {{$related_product_details_attr[$val->id][0]->price}}</span><span class="aa-product-price"><del>₹ {{$related_product_details_attr[$val->id][0]->mrp}}</del></span>
                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li> 
                @endforeach
                <!-- Loop  end -->
              </ul>
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                          <img src="{{asset('front_asset/img/view-slider/medium/polo-shirt-1.png')}}" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                      <img src="{{asset('front_asset/img/view-slider/thumbnail/polo-shirt-1.png')}}">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                      <img src="{{asset('front_asset/img/view-slider/thumbnail/polo-shirt-3.png')}}">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                      <img src="{{asset('front_asset/img/view-slider/thumbnail/polo-shirt-4.png')}}">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <form id="subForm">
    @csrf
    <input type="hidden" id="siz_id" name="siz_id">
    <input type="hidden" id="col_id" name="col_id">
    <input type="hidden" id="qty" name="qty">
    <input type="hidden" id="pro_id" name="pro_id" value="{{$product_details[0]->id}}">
  </form>
  <!-- / product category -->
  @endsection