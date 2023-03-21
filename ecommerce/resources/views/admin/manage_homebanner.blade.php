@extends('admin/layout')
@section('title','Manage Home Banner')
@section('homebanner','active')
@section('container')
<h1>Manage Home Banner</h1>
<a class='my-3' href="{{url('admin/homebanner')}}">
    <button type='button' class='btn btn-success'>Back</button>
</a>
<div class="card">
    <div class="card-body">
        <form action="{{route('manage_homebanner_process')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="id" value='{{$homebanner_id}}'>
                    <div class="form-group">
                        <label for="banner_image" class="control-label mb-1">Banner Image</label>
                        <input id="banner_image" name="banner_image" type="file" class="form-control" value="">
                    </div>
                    @error('banner_image')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                    @enderror
                    @if($banner_image != "")
                    <img width="200px" src="{{asset('storage/banners/'.$banner_image)}}" alt="">
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="form-group has-success">
                        <label for="button_txt" class="control-label mb-1">Button Text</label>
                        <input id="button_txt" name="button_txt" type="text" class="form-control"  value="{{$button_txt}}">
                    </div>
                </div>
                @error('button_txt')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                @enderror
                <div class="col-md-12">
                    <div class="form-group has-success">
                        <label for="button_link" class="control-label mb-1">Button Link</label>
                        <input id="button_link" name="button_link" type="text" class="form-control"  value="{{$button_link}}">
                    </div>
                </div>
                @error('banner_desc')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                @enderror
                <div class="col-md-6">
                    <div class="form-group has-success">
                        <label for="banner_percentage" class="control-label mb-1">Button Sales Offer</label>
                        <input id="banner_percentage" name="banner_percentage" type="text" class="form-control"  value="{{$banner_percentage}}">
                    </div>
                </div>
                @error('banner_percentage')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                @enderror
                <div class="col-md-6">
                    <div class="form-group has-success">
                        <label for="banner_title" class="control-label mb-1">Button Title</label>
                        <input id="banner_title" name="banner_title" type="text" class="form-control"  value="{{$banner_title}}">
                    </div>
                </div>
                @error('banner_title')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                @enderror
                <div class="col-md-12">
                    <div class="form-group has-success">
                        <label for="banner_desc" class="control-label mb-1">Button Description</label>
                        <textarea id="banner_desc" name="banner_desc" type="text" class="form-control">{{$banner_desc}}</textarea>
                    </div>
                </div>
                @error('banner_desc')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                @enderror
                
            </div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection