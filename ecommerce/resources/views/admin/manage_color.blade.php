@extends('admin/layout')
@section('title','Manage Color')
@section('color','active')
@section('container')
<h1>Manage Color</h1>
<a class='my-3' href="{{url('admin/color')}}">
    <button type='button' class='btn btn-success'>Back</button>
</a>
<div class="card">
    <div class="card-body">
        <form action="{{route('manage_color_process')}}" method="post">
            @csrf
            <input type="hidden" name="id" value='{{$color_id}}'>
            <div class="form-group">
                <label for="color_title" class="control-label mb-1">Color</label>
                <input id="color" name="color" type="text" class="form-control" value="{{$color}}">
            </div>
            @error('color')
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