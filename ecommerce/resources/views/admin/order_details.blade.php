@extends('admin/layout')
@section('title','Order Details')
@section('order','active')
@section('container')
<h1>Orders</h1>
<br>
@if(session()->has('msg'))
<div class='alert alert-success' role='alert'>
    {{session('msg')}}
</div>
@endif

  
<section class="m-3">
    <div class="row">
        <div class="col-md-6">
            <label for=""><h4>Order Status</h4></label>
            <select name="order_status" onchange="change_order_status({{$order_details[0]->id}})" id="order_status" class="form-control">
                @foreach($orders_status as $val)
                    @if($val->order_status == $order_details[0]->order_status)
                        <option selected value="{{$val->id}}">{{$val->order_status}}</option>
                    @else
                        <option value="{{$val->id}}">{{$val->order_status}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for=""><h4>Payment Status</h4></label>
            <select name="payment_status" id="payment_status" class="form-control" onchange="change_payment_status({{$order_details[0]->id}})">
                @foreach($payment_status as $val)
                    @if($val == $order_details[0]->payment_status)
                        <option selected value="{{$val}}">{{$val}}</option>
                    @else
                        <option value="{{$val}}">{{$val}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</section>

<section class="m-3">
    <form action="{{url('admin/order/order_details/update_tracking')}}" method="post">
        <input type="hidden" name="id" value="{{$order_details[0]->id}}">
        @csrf
        <label for=""><h5>Tracking</h5></label>
        <textarea class="form-control" name="tracking">{{$order_details[0]->tracking}}</textarea>
        <input class="btn btn-success m-2" type="submit" Value="Update Tracking">
    </form>
</section>

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

<table class="table table-borderless table-data3">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Product Title</th>
            <th>Image</th>
            <th>Size</th>
            <th>Color</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order_details as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->title}}</td>
            <td> <img src="{{asset('storage/products/'.$val->attr_img)}}" alt="" width="100px" height="100px"> </td>
            <td>{{$val->size}}</td>
            <td>{{$val->color}}</td>
            <td>{{$val->price}}</td>
            <td>{{$val->quantity}}</td>
            <td>{{$val->quantity * $val->price}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
