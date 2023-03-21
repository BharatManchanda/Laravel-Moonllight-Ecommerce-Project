@extends('admin/layout')
@section('title','View Customer')
@section('customer','active')
@section('container')
<h1>View Customer</h1>
<a class='my-3' href="{{url('admin/customer')}}">
    <button type='button' class='btn btn-success'>Back</button>
</a>
<!-- <div class="card"> -->
    <!-- <div class="card-body"> -->
        
        <table class="table table-bordered table-responsive">
            <tr>
                <th>Name</th>
                <td>{{$name}}</td>
            </tr>
            <tr>
                <th>Email ID</th>
                <td>{{$email_id}}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{$mobile}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$address}}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{$city}}</td>
            </tr>
            <tr>
                <th>State</th>
                <td>{{$state}}</td>
            </tr>
            <tr>
                <th>Zip</th>
                <td>{{$zip}}</td>
            </tr>
            <tr>
                <th>Company</th>
                <td>{{$company}}</td>
            </tr>
            <tr>
                <th>GSTIN</th>
                <td>{{$gstin}}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{carbon\carbon::parse($created_at)->format("d M, Y")}}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{carbon\carbon::parse($updated_at)->format("d M, Y")}}</td>
            </tr>
        </table>
    <!-- </div>
</div> -->
@endsection