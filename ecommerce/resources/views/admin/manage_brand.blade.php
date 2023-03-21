@extends('admin/layout')
@section('title','Manage Brand')
@section('brand','active')
@section('container')
<h1>Manage Brand</h1>
<a class='my-3' href="{{url('admin/brand')}}">
    <button type='button' class='btn btn-success'>Back</button>
</a>
<div class="card">
    <div class="card-body">
        <form action="{{route('manage_brand_process')}}" method="post" enctype='multipart/form-data'>
            @csrf
            <input type="hidden" name="id" value='{{$brand_id}}'>
            <div class="form-group">
                <label for="brand" class="control-label mb-1">Brand</label>
                <input id="brand" name="brand" type="text" class="form-control" value="{{$brand}}">
            </div>
            @error('brand')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror
            <div class="form-group">
                <label for="Brand Image" class="control-label mb-1">Brand Image</label>
                <input id="brand_image" name="brand_image" type="file" class="form-control">
            </div>
            
            @error('brand_image')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror

            @if($is_homepage==0)
            @php
            $var="";
            @endphp
            @else
            @php
            $var="checked"
            @endphp
            @endif
                <input id="is_homepage" {{$var}} name="is_homepage" type="checkbox" value="1">
                <label for="is_homepage" class="control-label mb-1">Show on Home Page</label>

            <div>
                @if($brand_image != '')
                <img src="{{asset('storage/brand/'.$brand_image)}}" alt="Brand" >
                @endif
                <button id="coupon-button" type="submit" class="btn btn-lg btn-info btn-block">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection