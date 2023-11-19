@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>My Orders</h3>
                </div>
                <div class="card-body">
                    <form method="GET" action="">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Filter By Date</label>
                                    <input type="date" name="date" value=" " class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <label for="">Filter By Status</label>
                                    <select name="status" class="form-select">
                                        <option value="">Select Status</option>
                                        <option value="in progress" {{Request::get('status')=='in progress'?'selected':''}}> In Progress  </option>
                                        <option value="completed" {{Request::get('status')=='completed'?'selected':''}}>Completed </option>
                                        <option value="pending" {{Request::get('status')=='pending'?'selected':''}}>Pending </option>
                                        <option value="cancelled" {{Request::get('status')=='cancelled'?'selected':''}}>Cancelled </option>
                                        <option value="out-for-delivery" {{Request::get('status')=='out-for-delivery'?'selected':''}}>Out for Delivery </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
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
                                        <td><a href="{{ url('admin/orders/' . $OrderItems->id) }}"
                                                class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                              <h5>No Orders Available</h5>
                                        </td>
                                      
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
