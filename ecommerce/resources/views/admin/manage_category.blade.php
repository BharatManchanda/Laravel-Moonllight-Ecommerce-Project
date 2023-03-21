@extends('admin/layout')
@section('title','Manage Category')
@section('category','active')
@section('container')
<h1>Manage Category</h1>
<a class='my-3' href="{{url('admin/category')}}">
    <button type='button' class='btn btn-success'>Back</button>
</a>
<div class="card">
    <div class="card-body">
        <form action="{{route('manage_category_process')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <input type="hidden" name="id" value='{{$category_id}}'>
                    <div class="form-group">
                        <label for="category_name" class="control-label mb-1">Category Name</label>
                        <input id="category_name" name="category_name" type="text" class="form-control" value="{{$category_name}}">
                    </div>
                    @error('category_name')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="form-group has-success">
                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                        <input id="category_slug" name="category_slug" type="text" class="form-control"  value="{{$category_slug}}">
                    </div>
                </div>
                <div class="col-md-4">
                <div class="form-group has-success">
                        <label for="parent_category" class="control-label mb-1">Parents Slug</label>
                        <select id="parent_category" name="parent_category_id" type="text" class="form-control"  value="0">
                            <option  selected disabled value="0">Select</option>
                        @foreach($cate as $val)
                        @if($parent_category_id==$val->id)
                        <option selected value="{{$val->id}}">{{$val->category_name}}</option>
                        @else
                        <option value="{{$val->id}}">{{$val->category_name}}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_image"></label>
                        <input class="form-control" type="file" id="category_image" name="category_image">
                    </div>
                </div>
                @if($category_image  != null)
                    <img src="{{asset('storage/categories/'.$category_image)}}" alt="" width="100px">
                @endif
            </div>
            @error('category_slug')
            <div class='alert alert-danger'>
            {{$message}}
            </div>
            @enderror
            @if($is_homepage==1)
            @php
            $var="checked";
            @endphp
            @else
            @php
            $var="";
            @endphp
            @endif
            <input type="checkbox" {{$var}} name="is_homepage" id="is_homepage" value="1">
            <label for="is_homepage">Show on Home Page</label>
            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection