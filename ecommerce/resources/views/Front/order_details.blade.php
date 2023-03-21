@extends("Front/layout")
@section('title','My Order')
@section('container')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{asset('front_asset/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Order Details Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>                   
          <li class="active">order details</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!--  -->
<section id="cart-view" style="margin-bottom:40px">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>Address Details</h3>
        <p><b>Address:</b> {{$order_details[0]->address}}</p>
        <p><b>Locality:</b> {{$order_details[0]->locality}}</p>
        <p><b>City:</b> {{$order_details[0]->city}}</p>
        <p><b>State:</b> {{$order_details[0]->state}}</p>
        <p><b>Zip:</b> {{$order_details[0]->zip}}</p>
      </div>
      <div class="col-md-6">
        <h3>Payment Details</h3>
        <p><b>Order Status:</b> {{$order_details[0]->order_status}}</p>
        <p><b>Payment Type:</b> {{$order_details[0]->payment_type}}</p>
        <p><b>Payment Id:</b> {{$order_details[0]->payment_id}}</p>
        <p><b>Coupon Code:</b> {{$order_details[0]->coupon_code}}</p>
        <p><b>Coupon Value:</b> {{$order_details[0]->coupon_value}}</p>
      </div>
    </div>
  </div>
</section>

 <!-- Cart view section -->
 <section id="cart-view" style="margin-bottom:40px">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                @if(isset($order_details[0]))
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Product Title</th>
                        <th>Image</th>
                        <th>Size</th>
                        <th>Colors</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php 
                      $total = 0;
                      @endphp
                      @foreach($order_details as $val)  
                      <tr>
                        <td>{{$val->id}}</td>
                        <td>{{$val->title}}</td>
                        <td><img src="{{asset('storage/products/'.$val->attr_img)}}" alt=""> </td>
                        <td>{{$val->size}}</td>
                        <td>{{$val->color}}</td>
                        <td>{{$val->price}}</td>
                        <td>{{$val->quantity}}</td>
                        <td>{{$val->quantity * $val->price}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                
                </div>
             </form>
             <!-- Cart Total view -->
               @else
                <h3></h3>
               @endif
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
@endsection