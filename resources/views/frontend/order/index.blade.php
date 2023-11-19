@extends('layouts.app')
@section('title', 'My Orders')
@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">My Orders </h4>
                    </div>
                  
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Order Id</th>
                                <th>Tracking No</th>
                                <th>Username</th>
                                <th>Payment Mode</th>
                                <th>Ordered Date</th>
                                <th>Status Message</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                                @forelse ($orders as $OrderItems)
                                    <tr>
                                        <td>{{ $OrderItems->id }}</td>
                                        <td>{{ $OrderItems->tracking_no }}</td>
                                        <td>{{ $OrderItems->fullname }}</td>
                                        <td>{{ $OrderItems->payment_mode }}</td>
                                        <td>{{ $OrderItems->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $OrderItems->status_message }}</td>
                                        <td><a href="{{ url('orders/' . $OrderItems->id) }}"
                                                class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <h5>No Orders Available</h5>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
