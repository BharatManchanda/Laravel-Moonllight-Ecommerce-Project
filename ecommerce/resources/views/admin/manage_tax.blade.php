@extends('admin/layout')
@section('title','Manage Tax')
@section('size','active')
@section('container')
<h1>Manage Tax</h1>
<a class='my-3' href="{{url('admin/tax')}}">
    <button type='button' class='btn btn-success'>Back</button>
</a>
<div class="card">
    <div class="card-body">
        <form action="{{route('manage_tax_process')}}" method="post">
            @csrf
            <input type="hidden" name="id" value='{{$tax_id}}'>
            <div class="form-group">
                <label for="tax_desc" class="control-label mb-1">Tax Description</label>
                <input id="tax_desc" name="tax_desc" type="text" class="form-control" value="{{$tax_desc}}">
            </div>
            @error('tax_desc')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror

            <div class="form-group">
                <label for="tax_value" class="control-label mb-1">Tax Value</label>
                <input id="tax_value" name="tax_value" type="number" class="form-control" value="{{$tax_value}}">
            </div>
            @error('tax_value')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror
            <div>
                <button id="coupon-button" type="submit" class="btn btn-lg btn-info btn-block">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection