@extends("Front/layout")
@section('title','Product Details')
@section('container')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{asset('front_asset/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view" style="margin-bottom:40px">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                @if(isset($cart[0]))
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php 
                      $total = 0;
                      @endphp
                      @foreach($cart as $val)   
                        <tr id="cart_box_{{$val->id}}">
                          <td><a class="remove" href="javascript:void(0)" onclick="delete_pro({{$val->product_id}},'{{$val->size}}','{{$val->color}}',{{$val->id}})"><fa class="fa fa-close"></fa></a></td>
                          <td><a href="{{url('product/'.$val->slug)}}"><img src="{{asset('storage/products/'.$val->image)}}" alt="img"></a></td>
                          <td><a class="aa-cart-title" href="{{url('product/'.$val->slug)}}">{{$val->title}}</a>
                          @if($val->size != null)
                          <br>Size: {{$val->size}}
                          @endif
                          @if($val->color != null)
                          <br>Size: {{$val->color}}
                          @endif
                          </td>
                          <td>₹ {{$val->price}}</td>
                          <td><input id="qty_{{$val->id}}" class="aa-cart-quantity" type="number" value="{{$val->quanity}}" onchange="update_quantity({{$val->product_id}},'{{$val->size}}','{{$val->color}}',{{$val->id}},{{$val->price}})"></td>
                          <td  id="total_{{$val->id}}">₹ {{$val->quanity*$val->price}}</td>
                        </tr>
                        @php
                        $total += $val->quanity*$val->price;
                        @endphp
                      @endforeach
                      <tr>
                        <td colspan="6" class="aa-cart-view-bottom">
                          <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div>
                          <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                        </td>
                      </tr>
                    </tbody>
                  </table>
                
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>₹ 345</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>₹ 345</td>
                   </tr>
                 </tbody>
               </table>
               <a href="{{url('checkout')}}" class="aa-cart-view-btn">Proced to Checkout</a>
               @else
                <h3>Cart Empty...!!</h3>
                @endif
             </div>
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
    <input type="hidden" id="pro_id" name="pro_id">
  </form>
 <!-- / Cart view section -->
@endsection