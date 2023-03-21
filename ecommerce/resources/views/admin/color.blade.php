@extends('admin/layout')
@section('title','Color')
@section('color','active')
@section('container')
<h1>Coupon</h1>
<a class='my-3' href="{{url('admin/color/manage_color')}}">
    <button type='button' class='btn btn-success'>Add Color</button>
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
            <th>Color ID</th>
            <th>Color</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->color}}</td>
            <td>
            @if($val->color_status==1)
            <a href="{{url('admin/color/manage_color/0/')}}/{{$val->id}}">
                <button class='btn-sm btn-warning' type='button'>Deactive</button>
            </a>
            @else
            <a href="{{url('admin/color/manage_color/1/')}}/{{$val->id}}">
                <button class='btn-sm btn-primary' type='button'>Active</button>
            </a>

            @endif
            <a href="{{url('admin/color/manage_color/')}}/{{$val->id}}">
                <button class='btn-sm btn-success' type='button'>Edit</button>
            </a>                
            <a href="{{url('admin/color/delete_color/')}}/{{$val->id}}">
                <button class='btn-sm btn-danger' type='button'>Delete</button>
            </a>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
