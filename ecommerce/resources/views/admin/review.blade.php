@extends('admin/layout')
@section('title','Rating and Review')
@section('review','active')
@section('container')
<h1>Rating and Review</h1>
@if(session()->has('msg'))
<div class='alert alert-success' role='alert'>
    {{session('msg')}}
</div>
@endif
<table class="table table-borderless table-data3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Rating Star</th>
            <th>Review</th>
            <th>Customer Id</th>
            <th>Product Id</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach($review as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->rating}}</td>
            <td>{{$val->review}}</td>
            <td>{{$val->customer_id}}</td>
            <td>{{$val->product_id}}</td>
            <td>
                @if($val->review_status==1)
                <a href="{{url('admin/review/status/0/')}}/{{$val->id}}">
                    <button class='btn-sm btn-warning' type='button'>Deactive</button>
                </a>
                @else
                <a href="{{url('admin/review/status/1/')}}/{{$val->id}}">
                    <button class='btn-sm btn-primary' type='button'>Active</button>
                </a>
                @endif               
                <a href="{{url('admin/review/delete/')}}/{{$val->id}}">
                    <button class='btn-sm btn-danger' type='button'>Delete</button>
                </a>                
            </td>
            <td>{{getDateFormate($val->created_at)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
