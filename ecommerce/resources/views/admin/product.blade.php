@extends('admin/layout')
@section('title','Product')
@section('product','active')
@section('container')
<h1>Product</h1>
<a class='my-3' href="{{url('admin/product/manage_product')}}">
    <button type='button' class='btn btn-success'>Add Product</button>
</a>
<br>
@if(session()->has('msg'))
<div class='alert alert-success' role='alert'>
    {{session('msg')}}
</div>
@endif
<table class="table table-bord
less table-data3">
    <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Image</th>
            <th>Product Title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>
                <a href="{{asset('storage/products/'.$val->image)}}">
                    <img src="{{asset('storage/products/'.$val->image)}}" alt="" width='100px' height='auto'></td>
                </a>
            <td>{{$val->title}}</td>
            <td>
            @if($val->product_status==1)
            <a href="{{url('admin/product/manage_product/0/')}}/{{$val->id}}">
                <button class='btn-sm btn-warning' type='button'>Deactive</button>
            </a>
            @else
            <a href="{{url('admin/product/manage_product/1/')}}/{{$val->id}}">
                <button class='btn-sm btn-primary' type='button'>Active</button>
            </a>
            @endif
            <a href="{{url('admin/product/manage_product/')}}/{{$val->id}}">
                <button class='btn-sm btn-success' type='button'>Edit</button>
            </a>                
            <a href="{{url('admin/product/delete_product/')}}/{{$val->id}}">
                <button class='btn-sm btn-danger' type='button'>Delete</button>
            </a>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
