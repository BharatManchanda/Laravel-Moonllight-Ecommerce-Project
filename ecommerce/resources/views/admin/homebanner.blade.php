@extends('admin/layout')
@section('title','Home Banner')
@section('homebanner','active')
@section('container')
<h1>Home Banner</h1>
<a class='my-3' href="{{url('admin/homebanner/manage_homebanner')}}">
    <button type='button' class='btn btn-success'>Add Home Banner</button>
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
            <th>Home Banner ID</th>
            <th>Banner Images</th>
            <th>Button Text</th>
            <th>Button Link</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td> <img width="150px" src="{{asset('storage/banners/'.$val->banner_image)}}" alt="hi"> </td>
            <td>{{$val->button_txt}}</td>
            <td>{{$val->button_link}}</td>
            <td>
            @if($val->banner_status==1)
            <a href="{{url('admin/homebanner/manage_homebanner/0/')}}/{{$val->id}}">
                <button class='btn-sm btn-warning' type='button'>Deactive</button>
            </a>
            @else
            <a href="{{url('admin/homebanner/manage_homebanner/1/')}}/{{$val->id}}">
                <button class='btn-sm btn-primary' type='button'>Active</button>
            </a>

            @endif
            <a href="{{url('admin/homebanner/manage_homebanner/')}}/{{$val->id}}">
                <button class='btn-sm btn-success' type='button'>Edit</button>
            </a>                
            <a href="{{url('admin/homebanner/delete_homebanner/')}}/{{$val->id}}">
                <button class='btn-sm btn-danger' type='button'>Delete</button>
            </a>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection