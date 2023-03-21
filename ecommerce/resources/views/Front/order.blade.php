@extends("Front/layout")
@section('title','My Order')
@section('container')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{asset('front_asset/img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Orders Page</h2>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>                   
          <li class="active">order</li>
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
                @if(isset($orders[0]))
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>Total Amount</th>
                        <th>Payment ID</th>
                        <th>Placed At</th>
                        <th>View Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php 
                      $total = 0;
                      @endphp
                      @foreach($orders as $val)  
                      <tr>
                        <td>{{$val->id}}</td>
                        <td>{{$val->order_status}}</td>
                        <td>{{$val->payment_status}}</td>
                        <td>{{$val->total_amount}}</td>
                        <td>{{$val->payment_id}}</td>
                        <td>{{$val->created_at}}</td>
                        <td> <a href="{{url('order_details/')}}/{{$val->id}}">View Details</a> </td>
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