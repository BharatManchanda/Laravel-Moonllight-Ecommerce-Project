@extends('admin/layout')
@section('title','Tax')
@section('tax','active')
@section('container')
<h1>tax</h1>
<a class='my-3' href="{{url('admin/tax/manage_tax')}}">
    <button type='button' class='btn btn-success'>Add Tax</button>
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
            <th>Tax ID</th>
            <th>Tax Description</th>
            <th>Tax Value</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->tax_desc}}</td>
            <td>{{$val->tax_value}}</td>
            <td>
            @if($val->tax_status==1)
            <a href="{{url('admin/tax/manage_tax/0/')}}/{{$val->id}}">
                <button class='btn-sm btn-warning' type='button'>Deactive</button>
            </a>
            @else
            <a href="{{url('admin/tax/manage_tax/1/')}}/{{$val->id}}">
                <button class='btn-sm btn-primary' type='button'>Active</button>
            </a>
            @endif
            <a href="{{url('admin/tax/manage_tax/')}}/{{$val->id}}">
                <button class='btn-sm btn-success' type='button'>Edit</button>
            </a>                
            <a href="{{url('admin/tax/delete_tax/')}}/{{$val->id}}">
                <button class='btn-sm btn-danger' type='button'>Delete</button>
            </a>                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
