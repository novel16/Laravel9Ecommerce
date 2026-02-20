@extends('layouts.admin')
{{-- @section('title', 'My Orders') --}}

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-md">
                <div class="card-header">
                    <h3>Manage Orders
                    </h3>
                </div>
                <div class="card-body">

                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Filter by Date:</label>
                                <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Filter by Status:</label>
                                <select name="status" class="form-select">
                                    <option value="">Select Status</option>
                                    <option value="in progress"
                                        {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In progress
                                    </option>
                                    <option value="completed"
                                        {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>
                                        Cancelled</option>
                                    <option value="out-for-delivery"
                                        {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>Out for
                                        delivery</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <br>
                                <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Tracking No</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Payment Mode</th>
                                    <th scope="col">Ordered Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td class="text-truncate" style="max-width: 150px;">{{ $order->tracking_no }}</td>
                                        <td>{{ $order->fullname }}</td>
                                        <td>{{ $order->payment_mode }}</td>
                                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <span class="badge bg-info text-dark">{{ $order->status_message }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/orders/' . $order->id) }}"
                                                class="btn btn-sm btn-primary">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No records found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3 d-flex justify-content-center">
                        {{ $orders->appends(request()->query())->links() }}
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
