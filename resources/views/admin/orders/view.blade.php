@extends('layouts.admin')
{{-- @section('title', 'My Orders') --}}

@section('content')
    <div class="row">
        <div class="col-md-12">


            @if (session('message'))
                <div class="alert alert-success mb-3">{{ session('message') }}</div>
            @endif
            <div class="card shadow-md">
                <div class="card-header">
                    <h3 class="mb-0">Order Details</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-primary d-flex justify-content-between align-items-center flex-wrap">
                        <span>
                            <i class="fa fa-shopping-cart text-dark me-1"></i> Order Details
                        </span>
                        <div class="btn-group-sm d-flex flex-wrap justify-content-end gap-1 mt-2 mt-md-0">
                            <a href="{{ url('admin/orders') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>
                                Back</a>
                            <a href="{{ url('admin/invoice/' . $order->id . '/generate') }}" class="btn btn-primary"><i
                                    class="fa fa-download"></i> Download</a>
                            <a href="{{ url('admin/invoice/' . $order->id) }}" target="_blank"
                                class="btn btn-warning text-dark"><i class="fa fa-eye"></i> View</a>
                            <a href="{{ url('admin/invoice/' . $order->id . '/mail') }}" class="btn btn-info text-light"><i
                                    class="fa fa-envelope"></i> Send Mail</a>
                        </div>
                    </h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <h5>Order Info</h5>
                            <hr>
                            <p><strong>Order ID:</strong> {{ $order->id }}</p>
                            <p><strong>Tracking No.:</strong> {{ $order->tracking_no }}</p>
                            <p><strong>Ordered Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
                            <p><strong>Payment Mode:</strong> {{ $order->payment_mode }}</p>
                            <p class="border p-2 text-success"><strong>Order Status:</strong> <span
                                    class="text-uppercase">{{ $order->status_message }}</span></p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <h5>User Info</h5>
                            <hr>
                            <p><strong>Full Name:</strong> {{ $order->fullname }}</p>
                            <p><strong>Email:</strong> {{ $order->email }}</p>
                            <p><strong>Phone:</strong> {{ $order->phone }}</p>
                            <p><strong>Address:</strong> {{ $order->address }}</p>
                            <p><strong>Zip Code:</strong> {{ $order->pincode }}</p>
                        </div>
                    </div>

                    <h5 class="mt-3">Order Items</h5>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Item ID</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalPrice = 0; @endphp
                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td>{{ $orderItem->id }}</td>
                                        <td>
                                            @if ($orderItem->product->productImages->isNotEmpty())
                                                <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                    alt="" class="img-thumbnail" style="width: 70px; height: 70px;">
                                            @else
                                                <img src="{{ asset('static/no-image.jpg') }}" alt="No Image"
                                                    class="img-thumbnail" style="width: 70px; height: 70px;">
                                            @endif
                                        </td>
                                        <td>
                                            {{ $orderItem->product->name }}
                                            @if ($orderItem->productColor && $orderItem->productColor->color)
                                                <br><small>Color: {{ $orderItem->productColor->color->name }}</small>
                                            @endif
                                        </td>
                                        <td>&#8369;{{ number_format($orderItem->price, 2) }}</td>
                                        <td>{{ $orderItem->quantity }}</td>
                                        <td class="fw-bold">
                                            &#8369;{{ number_format($orderItem->quantity * $orderItem->price, 2) }}</td>
                                        @php $totalPrice += $orderItem->quantity * $orderItem->price; @endphp
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5" class="fw-bold text-end">Total Amount:</td>
                                    <td class="fw-bold">&#8369;{{ number_format($totalPrice, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="card border mt-3 shadow-md">
                <div class="card-body">
                    <h4 class="mb-3">Order Process (Order Status Updates)</h4>
                    <hr>

                    <div class="row align-items-start">
                        <div class="col-md-5 mb-3 mb-md-0">
                            <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <label for="order_status" class="form-label fw-bold">Update Order Status</label>
                                <div class="input-group">
                                    <select name="order_status" id="order_status" class="form-select">
                                        <option value="">Select Order Status</option>
                                        <option value="pending"
                                            {{ $order->status_message == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="in progress"
                                            {{ $order->status_message == 'in progress' ? 'selected' : '' }}>In Progress
                                        </option>
                                        <option value="out-for-delivery"
                                            {{ $order->status_message == 'out-for-delivery' ? 'selected' : '' }}>Out for
                                            Delivery</option>
                                        <option value="completed"
                                            {{ $order->status_message == 'completed' ? 'selected' : '' }}>Completed
                                        </option>
                                        <option value="cancelled"
                                            {{ $order->status_message == 'cancelled' ? 'selected' : '' }}>Cancelled
                                        </option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Update</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-7">
                            <h5 class="mt-2 mt-md-0">
                                Current Order Status:
                                <span class="text-uppercase fw-bold">
                                    {{ $order->status_message ?? 'Not Set' }}
                                </span>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
