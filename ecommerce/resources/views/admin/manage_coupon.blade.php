@extends('admin/layout')
@section('title','Manage Coupon')
@section('coupon','active')
@section('container')
<h1>Manage Coupon</h1>
<a class='my-3' href="{{url('admin/coupon')}}">
    <button type='button' class='btn btn-success'>Back</button>
</a>
<div class="card">
    <div class="card-body">
        <form action="{{route('manage_coupon_process')}}" method="post">
            @csrf
            <input type="hidden" name="id" value='{{$coupon_id}}'>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coupon_title" class="control-label mb-1">Coupon Title</label>
                        <input id="coupon_title" name="coupon_title" type="text" class="form-control" value="{{$coupon_title}}">
                    </div>
                    @error('coupon_title')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group has-success">
                        <label for="coupon_code" class="control-label mb-1">Coupon Code</label>
                        <input id="coupon_code" name="coupon_code" type="text" class="form-control"  value="{{$coupon_code}}">
                    </div>
                    @error('coupon_code')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-group has-success">
                        <label for="coupon_value" class="control-label mb-1">Coupon Value</label>
                        <input id="coupon_value" name="coupon_value" type="text" class="form-control"  value="{{$coupon_value}}">
                    </div>
                    @error('coupon_value')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-group has-success">
                        <label for="coupon_type" class="control-label mb-1">Coupon Type</label>
                        <select id="coupon_type" name="coupon_type" type="text" class="form-control"  value="">
                        @if($coupon_type=="Value")
                        <option selected disabled value="">Select</option>
                        <option selected value="Value">Value</option>
                        <option value="Percentage">Percentage</option>
                        @elseif($coupon_type=="Percentage")
                        <option disabled selected value="">Select</option>
                        <option value="Value">Value</option>
                        <option selected value="Percentage">Percentage</option>
                        @else
                        <option disabled selected value="">Select</option>
                        <option value="Value">Value</option>
                        <option value="Percentage">Percentage</option>
                        @endif
                        </select>
                    </div>
                    @error('coupon_type')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-group has-success">
                        <label for="min_order_amt" class="control-label mb-1">Minimum Order Amt.</label>
                        <input id="min_order_amt" name="min_order_amt" type="text" class="form-control"  value="{{$min_order_amt}}">
                    </div>
                    @error('min_order_amt')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-group has-success">
                        <label for="is_one_time" class="control-label mb-1">Is it One Time</label>
                        <select id="is_one_time" name="is_one_time" type="text" class="form-control">
                            @if($is_one_time=="1")
                            <option disabled selected value="">Select</option>
                            <option selected value="1">Yes</option>
                            <option value="0">No</option>
                            @elseif($is_one_time=="0")
                            <option disabled selected value="">Select</option>
                            <option value="1">Yes</option>
                            <option selected value="0">No</option>
                            @else
                            <option disabled selected value="">Select</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                            @endif
                        </select>
                    </div>
                    @error('is_one_time')
                    <div class='alert alert-danger'>
                    {{$message}}
                    </div>
                    @enderror
                </div>

            </div>
                <button id="coupon-button" type="submit" class="btn btn-lg btn-info btn-block">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection