@extends('admin/layout')
@section('title','Customer')
@section('customer','active')
@section('container')
<h1>customer</h1> <br>
@if(session()->has('msg'))
<div class='alert alert-success' role='alert'>
    {{session('msg')}}
</div>
@endif
<table class="table table-borderless table-data3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email ID</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->name}}</td>
            <td>{{$val->email_id}}</td>
            <td>{{$val->mobile}}</td>
            <td>
            @if($val->customer_status==1)
            <a href="{{url('admin/customer/manage_customer/0/')}}/{{$val->id}}">
                <button class='btn-sm btn-warning' type='button'>Deactive</button>
            </a>
            @else
            <a href="{{url('admin/customer/manage_customer/1/')}}/{{$val->id}}">
                <button class='btn-sm btn-primary' type='button'>Active</button>
            </a>
            @endif
            <a href="{{url('admin/customer/delete_customer/')}}/{{$val->id}}">
                <button class='btn-sm btn-danger' type='button'>Delete</button>
            </a>                
            <a href="{{url('admin/customer/view_customer/')}}/{{$val->id}}">
                <button class='btn-sm btn-success' type='button'>View</button>
            </a>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
