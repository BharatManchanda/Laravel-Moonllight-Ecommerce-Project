@extends('admin/layout')
@section('title','Order')
@section('order','active')
@section('container')
<h1>Orders</h1>
<br>
@if(session()->has('msg'))
<div class='alert alert-success' role='alert'>
    {{session('msg')}}
</div>
@endif
<table class="table table-borderless table-data3">
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
        @foreach($orders as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->order_status}}</td>
            <td>{{$val->payment_status}}</td>
            <td>{{$val->total_amount}}</td>
            <td>{{$val->payment_id}}</td>
            <td>{{$val->created_at}}</td>
            <td> <a href="{{url('admin/order/order_details/')}}/{{$val->id}}">View Details</a> </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
