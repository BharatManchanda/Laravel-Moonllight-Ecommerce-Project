@extends('admin/layout')
@section('title','Category')
@section('category','active')
@section('container')
<h1>Category</h1>
<a class='my-3' href="{{url('admin/category/manage_category')}}">
    <button type='button' class='btn btn-success'>Add Category</button>
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
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Category Slug</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->category_name}}</td>
            <td>{{$val->category_slug}}</td>
            <td>
            @if($val->category_status==1)
            <a href="{{url('admin/category/manage_category/0/')}}/{{$val->id}}">
                <button class='btn-sm btn-warning' type='button'>Deactive</button>
            </a>
            @else
            <a href="{{url('admin/category/manage_category/1/')}}/{{$val->id}}">
                <button class='btn-sm btn-primary' type='button'>Active</button>
            </a>

            @endif
            <a href="{{url('admin/category/manage_category/')}}/{{$val->id}}">
                <button class='btn-sm btn-success' type='button'>Edit</button>
            </a>                
            <a href="{{url('admin/category/delete_category/')}}/{{$val->id}}">
                <button class='btn-sm btn-danger' type='button'>Delete</button>
            </a>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
