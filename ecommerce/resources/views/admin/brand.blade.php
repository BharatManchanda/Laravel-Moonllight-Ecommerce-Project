@extends('admin/layout')
@section('title','Brand')
@section('brand','active')
@section('container')
<h1>Brand</h1>
<a class='my-3' href="{{url('admin/brand/manage_brand')}}">
    <button type='button' class='btn btn-success'>Add Brand</button>
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
            <th>Brand ID</th>
            <th>Brand Logo</th>
            <th>Brand</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td> <img src="{{asset('storage/brand/'.$val->brand_image)}}" alt="" width='100px' height='100px'> </td>
            <td>{{$val->brand}}</td>
            <td>
            @if($val->brand_status==1)
            <a href="{{url('admin/brand/manage_brand/0/')}}/{{$val->id}}">
                <button class='btn-sm btn-warning' type='button'>Deactive</button>
            </a>
            @else
            <a href="{{url('admin/brand/manage_brand/1/')}}/{{$val->id}}">
                <button class='btn-sm btn-primary' type='button'>Active</button>
            </a>
            @endif
            <a href="{{url('admin/brand/manage_brand/')}}/{{$val->id}}">
                <button class='btn-sm btn-success' type='button'>Edit</button>
            </a>                
            <a href="{{url('admin/brand/delete_brand/')}}/{{$val->id}}">
                <button class='btn-sm btn-danger' type='button'>Delete</button>
            </a>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
