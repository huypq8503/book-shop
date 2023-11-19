@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <h2 class="alert alert-success">{{ session('message') }}</h2>
            @endif

            <div class="me-md-3 me-xl-5">
                <h2>Dashboard</h2>
                <p class="mb-md-0 display-3">Analytics</p>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3 card-css">
                        <label for="" class="display-5">Total Orders</label>
                        <h1>{{$totalOrder}}</h1>
                        {{-- <a href="{{url('admin/orders')}}">View</a> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3 card-css">
                        <label for=""  class="display-5">Today Orders</label>
                        <h1>{{$todayOrder}}</h1>
                        {{-- <a href="{{url('admin/orders')}}">View</a> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3 card-css">
                        <label for="" class="display-5">Monthly Orders</label>
                        <h1>{{$thisMonthOrder}}</h1>
                        {{-- <a href="{{url('admin/orders')}}">View</a> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3 card-css">
                        <label for="" class="display-5 font-weight-bold font-italic">Yearly Orders</label>
                        <h1>{{$thisYearOrder}}</h1>
                        {{-- <a href="{{url('admin/orders')}}">View</a> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3 card-css">
                        <label for="" class="display-5 font-weight-bold font-italic">Total Completed Order</label>
                        <h1>{{$totalOrderCompleted}}</h1>
                        {{-- <a href="{{url('admin/orders')}}">View</a> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3 card-css">
                        <label for="" class="display-5 font-weight-bold font-italic">Total InProgress Order</label>
                        <h1>{{$totalOrderInProgress}}</h1>
                        {{-- <a href="{{url('admin/orders')}}">View</a> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3 card-css">
                        <label for="" class="display-5 font-weight-bold font-italic">Total Cancelled Order</label>
                        <h1>{{$totalOrderCancelled}}</h1>
                        {{-- <a href="{{url('admin/orders')}}">View</a> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3 card-css">
                        <label for="" class="display-5 font-weight-bold font-italic">Total pending Order</label>
                        <h1>{{$totalOrderPending}}</h1>
                        {{-- <a href="{{url('admin/orders')}}">View</a> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-warning text-white mb-3 card-css">
                        <label for=""  class="display-5 font-weight-bold font-italic">Total Amount Earned</label>
                        <h1>₹{{$totalAmount}}</h1>
                        {{-- <a href="{{url('admin/orders')}}">View</a> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3 card-css">
                        <label for=""  class="display-5 font-weight-bold font-italic">Today Amount Earned</label>
                        <h1>₹{{$totalAmountToday}}</h1>
                        {{-- <a href="{{url('admin/orders')}}">View</a> --}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3 card-css">
                        <label for=""  class="display-5 font-weight-bold font-italic">Monthly Amount Earned</label>
                        <h1>₹{{$totalAmountMonth}}</h1>
                        {{-- <a href="{{url('admin/orders')}}">View</a> --}}
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="card card-body bg-primary text-white mb-3 card-css ">
                        <label for=""  class="display-5 font-weight-bold font-italic">Yearly Amount Earned</label>
                        <h1>₹{{$totalAmountYear}}</h1>
                        {{-- <a href="{{url('admin/orders')}}">View</a> --}}
                    </div>
                </div>
              
            </div>
        </div>
    </div>
@endsection
