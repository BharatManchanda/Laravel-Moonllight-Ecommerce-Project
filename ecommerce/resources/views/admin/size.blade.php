@extends('admin/layout')
@section('title','Size')
@section('size','active')
@section('container')
<h1>Size</h1>
<a class='my-3' href="{{url('admin/size/manage_size')}}">
    <button type='button' class='btn btn-success'>Add Size</button>
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
            <th>Size ID</th>
            <th>Size</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->size}}</td>
            <td>
            @if($val->size_status==1)
            <a href="{{url('admin/size/manage_size/0/')}}/{{$val->id}}">
                <button class='btn-sm btn-warning' type='button'>Deactive</button>
            </a>
            @else
            <a href="{{url('admin/size/manage_size/1/')}}/{{$val->id}}">
                <button class='btn-sm btn-primary' type='button'>Active</button>
            </a>
            @endif
            <a href="{{url('admin/size/manage_size/')}}/{{$val->id}}">
                <button class='btn-sm btn-success' type='button'>Edit</button>
            </a>                
            <a href="{{url('admin/size/delete_size/')}}/{{$val->id}}">
                <button class='btn-sm btn-danger' type='button'>Delete</button>
            </a>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
