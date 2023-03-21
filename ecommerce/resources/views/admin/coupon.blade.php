@extends('admin/layout')
@section('title','Coupon')
@section('coupon','active')
@section('container')
<h1>Coupon</h1>
<a class='my-3' href="{{url('admin/coupon/manage_coupon')}}">
    <button type='button' class='btn btn-success'>Add Coupon</button>
</a>
<br>
@if(session()->has('msg'))
<div class='alert alert-success' role='alert'>
    {{session('msg')}}
</div>
@endif
<table class="table table-borderless table-data3">
    <thead>
        <tr>
            <th>Coupon ID</th>
            <th>Coupon Title</th>
            <th>Coupon Code</th>
            <th>Coupon Value</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->coupon_title}}</td>
            <td>{{$val->coupon_code}}</td>
            <td>{{$val->coupon_value}}</td>
            <td>
            @if($val->coupon_status==1)
            <a href="{{url('admin/coupon/manage_coupon/0/')}}/{{$val->id}}">
                <button class='btn-sm btn-warning' type='button'>Deactive</button>
            </a>
            @else
            <a href="{{url('admin/coupon/manage_coupon/1/')}}/{{$val->id}}">
                <button class='btn-sm btn-primary' type='button'>Active</button>
            </a>

            @endif
            <a href="{{url('admin/coupon/manage_coupon/')}}/{{$val->id}}">
                <button class='btn-sm btn-success' type='button'>Edit</button>
            </a>                
            <a href="{{url('admin/coupon/delete_coupon/')}}/{{$val->id}}">
                <button class='btn-sm btn-danger' type='button'>Delete</button>
            </a>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
