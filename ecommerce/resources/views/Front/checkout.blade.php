@extends("Front/layout")
@section('title','Checkout Page')
@section('container')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
    <img src="{{asset('front_asset/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Checkout Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>                   
          <li class="active">Checkout</li>
        </ol>
      </div>
     </div>
   </div>
  </section>  
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form id="order_submit">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Coupon section -->

                    <div class="panel panel-default aa-checkout-coupon">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Have a Coupon?
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <input type="text" name="coupon_code" id="coupon_code" placeholder="Coupon Code" class="aa-coupon-code">
                          <div id="coupon_code_error" style="display:none" class="alert alert-danger"></div>
                          @csrf
                          <input type="button" onclick="coupon_code_check()" value="Apply Coupon" class="aa-browse-btn">
                        </div>
                      </div>
                    </div>
                    <!-- Login section -->
                    @if(!session()->has('LOGIN_USER_ID'))
                    <div class="panel panel-default aa-checkout-login">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            Client Login 
                          </a>
                        </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat voluptatibus modi pariatur qui reprehenderit asperiores fugiat deleniti praesentium enim incidunt.</p>
                          @php
                            if(isset($_COOKIE['email']) && isset($_COOKIE['password'])){
                              $user=$_COOKIE['email'];
                              $pass=$_COOKIE['password'];
                            }
                            else{
                              $user="";
                              $pass="";
                            }
                          @endphp
                          <div id="alert_error2" style="display:none" class="alert alert-danger"></div>
                            <input type="text" name="login_email" id="login_email" placeholder="Email ID" value="{{$user}}">  <br><br>
                            <div id="login_email_error2" style="font-size:14px; color:red; margin-top: -15px; margin-left: 10px"></div>
                            <input type="password" name="login_password" value="{{$pass}}" id="login_password" placeholder="Password">
                            <br><br>
                            <div id="login_password_error2" style="font-size:14px; color:red; margin-top: -15px; margin-left: 10px"></div>
                            @csrf
                            <button type="submit" class="aa-browse-btn">Login</button>
                            <label for="rememberme" class="rememberme">
                            <input type="checkbox" id="rememberme" name="login_rememberme">                            Remember Me </label>
                          <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                        </div>
                      </div>
                    </div>
                    @endif
                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing Details
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="name" placeholder="Full Name*" value="{{$name}}">
                                <div style="font-size:14px; color:red" id="name_error"></div>
                              </div>                             
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text"  name="company_name" value="{{$company}}" placeholder="Company name">
                                <div style="font-size:14px; color:red" id="company_error"></div>
                              </div>                             
                            </div>                            
                          </div>  
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" name="email" value="{{$email_id}}" placeholder="Email Address*">
                                <div style="font-size:14px; color:red" id="email_error"></div>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" name="mobile" value="{{$mobile}}" placeholder="Phone*">
                                <div style="font-size:14px; color:red" id="mobile_error"></div>
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" name="address" rows="3">{{$address}}</textarea>
                                <div style="font-size:14px; color:red" id="address_error"></div>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="locality" value="{{$locality}}" placeholder="City / Town / Locality*">
                                <div style="font-size:14px; color:red" id="locality_error"></div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="city" value="{{$city}}" placeholder="District*">
                                <div style="font-size:14px; color:red" id="city_error"></div>
                              </div>                             
                            </div>
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="State*" name="state" value="{{$state}}">
                                <div style="font-size:14px; color:red" id="state_error"></div>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="zip" value="{{$zip}}" placeholder="Postcode / ZIP*">
                                <div style="font-size:14px; color:red" id="zip_error"></div>
                              </div>
                            </div>
                          </div>                                    
                        </div>
                      </div>
                    </div>
                    <!-- Shipping Address -->
                    <!-- <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                            Shippping Address
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Full Name*" value="{{$name}}">
                              </div>                             
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" value="{{$company}}" placeholder="Company name">
                              </div>                             
                            </div>                            
                          </div>  
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="email" value="{{$email_id}}" placeholder="Email Address*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" value="{{$mobile}}" placeholder="Phone*">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea cols="8" rows="3">{{$address}}</textarea>
                              </div>                             
                            </div>                            
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" value="{{$locality}}" placeholder="City / Town / Locality*">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" value="{{$city}}" placeholder="District*">
                              </div>                             
                            </div>
                          </div>   
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="State*">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" value="{{$zip}}" placeholder="Postcode / ZIP*">
                              </div>
                            </div>
                          </div>                          
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                        $total=0;
                        @endphp
                        @foreach($cart_data as $val)
                        <tr>
                          <td>{{substr($val->title,0,20)."..."}} <strong> x  {{$val->quanity}}</strong></td>
                          <td>₹ {{$val->price*$val->quanity}}</td>
                        </tr>
                        @php
                        $total=$total+($val->price*$val->quanity);
                        @endphp
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Subtotal</th>
                          <td class="total_price">₹ {{$total}}</td>
                        </tr>
                        <tr id="coupon_code_applied" style="display:none">
                          <th>Coupon Code Applied <a style="font-size:12px" class="text-danger" onclick="remove_coupon_code()" href="javscript:void(0)">Remove</a></th>
                          <td></td>
                        </tr>
                        <tr id="coupon_discount_amount" style="display:none">
                          <th>Coupon Discount Amt.</th>
                          <td></td>
                        </tr>
                        <tr>
                          <th>Total</th>
                          <td class="total_price">₹ {{$total}}</td>
                        </tr>
                        <tr style="display:none">
                          <th>Total</th>
                          <td id="original_total_price">{{$total}}</td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">                    
                    <label for="cashdelivery"><input type="radio" id="cashdelivery" value="COD" name="payment_type"> Cash on Delivery </label>
                    <label for="Instamojo"><input type="radio" value="Gateway" id="Instamojo" name="payment_type" checked> Via Instamojo </label>
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="Instamojo Acceptance Mark">    
                    <input type="submit" value="Place Order" class="aa-browse-btn">                
                  </div>
                </div>
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
@endsection