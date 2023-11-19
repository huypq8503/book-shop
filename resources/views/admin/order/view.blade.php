@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
            <div class="alert alert-success mb-3">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Orders Detials

                        <a href="{{url('admin/orders')}}" class="btn btn-danger btn-sm float-end mx-1">Back</a>
                        <a href="{{url('admin/invoice/'.$orders->id.'/generate')}}" class="btn btn-primary btn-sm float-end mx-1">Download Invoice</a>
                        <a href="{{url('admin/invoice/'.$orders->id)}}"target="_blanck" class="btn btn-warning btn-sm float-end mx-1">View Invoice</a>
                        {{-- <a href="{{url('admin/invoice/'.$orders->id.'/mail')}}" class="btn btn-info btn-sm float-end mx-1">Send Email</a> --}}
                    </h3>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <h5>Order Detials</h5>
                        <hr>
                        <h6>Order Id: {{ $orders->id }}</h6>
                        <h6>Tracking Id/No.: {{ $orders->tracking_no }}</h6>
                        <h6>Order Created Date: {{ $orders->created_at->format('d-m-Y h:i A') }}</h6>
                        <h6>Payment Mode: {{ $orders->payment_mode }}</h6>
                        <h6 class="borders p-2 text-success">
                            Order Status Message: <span class="text-uppercase"> {{ $orders->status_message }}</span>
                        </h6>

                    </div>
                    <div class="col-md-6">
                        <h5>User Detials</h5>
                        <hr>
                        <h6>Full Name:{{ $orders->fullname }}</h6>
                        <h6>Email Id: {{ $orders->email }}</h6>
                        <h6>Phone: {{ $orders->phone }}</h6>
                        <h6>Pincode: {{ $orders->address }}</h6>
                        <h6>Address: {{ $orders->pincode }}</h6>
                    </div>
                    <br>
                    <h5>Orders Item</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Item Id</th>
                                <th>Image </th>
                                <th>Product</th>
                                <th> Price</th>
                                <th>Quantity</th>
                                <th>Total</th>

                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($orders->orderItems as $orderItem)
                                    <tr>
                                        <td width="10%">
                                            {{ $orderItem->id }}
                                        </td>
                                        <td width="10%">
                                            @if ($orderItem->product->productImages)
                                                <img src=" {{ asset($orderItem->product->productImages[0]->image) }}"
                                                    style="width: 50px; height: 50px" alt="">
                                            @else
                                                <img src="#" style="width: 50px; height: 50px" alt="">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $orderItem->product->name }}
                                            <br>
                                            @if ($orderItem->productColor)
                                                <span>
                                                    Color:{{ $orderItem->productColor->color->name }}
                                                </span>
                                            @endif
                                        </td>
                                        <td width="10%">
                                            {{ $orderItem->price }}
                                        </td>
                                        <td width="10%">
                                            {{ $orderItem->quantity }}
                                        </td>
                                        <td width="10%" class="fw-bold">
                                            {{ $orderItem->quantity * $orderItem->price }}
                                        </td>
                                    </tr>
                                    @php
                                        $totalPrice += $orderItem->quantity * $orderItem->price;
                                    @endphp
                                @endforeach
                                <tr>
                                    <td colspan="5">Total Amount:</td>
                                    <td colspan="1 " class="fw-bold">
                                        {{ $totalPrice }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Order Process (Order Status Updates)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/' . $orders->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="">Update Your Order Status</label>
                                <div class="input-group">
                                    <select name="order_status" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="in progress"
                                            {{ Request::get('status') == 'in progress' ? 'selected' : '' }}> In Progress
                                        </option>
                                        <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }}>
                                            Completed </option>
                                        <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>
                                            Pending </option>
                                        <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>
                                            Cancelled </option>
                                        <option value="out-for-delivery"
                                            {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>Out for Delivery
                                        </option>
                                    </select>

                                    <button type="submit" class="btn btn-primary text-white">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <h4 class="mt-3">Current Order Status: <span
                                    class="text-uppercase">{{ $orders->status_message }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection