@extends('admin/layout')
@section('title','Manage Size')
@section('size','active')
@section('container')
<h1>Manage Size</h1>
<a class='my-3' href="{{url('admin/size')}}">
    <button type='button' class='btn btn-success'>Back</button>
</a>
<div class="card">
    <div class="card-body">
        <form action="{{route('manage_size_process')}}" method="post">
            @csrf
            <input type="hidden" name="id" value='{{$size_id}}'>
            <div class="form-group">
                <label for="size_title" class="control-label mb-1">Size</label>
                <input id="size" name="size" type="text" class="form-control" value="{{$size}}">
            </div>
            @error('size')
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