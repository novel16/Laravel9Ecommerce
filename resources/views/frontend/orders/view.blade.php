@extends('layouts.app')
@section('title', 'My Order Details')

@section('content')

    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shopping-cart text-dark"></i> My Order Details
                            <a href="{{ url('/orders') }}" class="btn btn-sm btn-danger float-end">Back</a>
                        </h4>
                        <hr>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <hr>
                                <h6>Order Id: <span class="text-secondary">{{ $order->id }}</span></h6>
                                <h6>Tracking Id/No.: <span class="text-secondary">{{ $order->tracking_no }}</span></h6>
                                <h6>Ordered Date: <span
                                        class="text-secondary">{{ $order->created_at->format('d-m-Y') }}</span></h6>
                                <h6>Payment Mode: <span class="text-secondary">{{ $order->payment_mode }}</span></h6>
                                <h6 class="border p-2 text-success">
                                    Order Status: <span class="text-uppercase">{{ $order->status_message }}</span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>User Details </h5>
                                <hr>
                                <h6>Full Name: <span class="text-secondary">{{ $order->fullname }}</span></h6>
                                <h6>Email Id: <span class="text-secondary">{{ $order->email }}</span></h6>
                                <h6>Phone: <span class="text-secondary">{{ $order->phone }}</span></h6>
                                <h6>Address: <span class="text-secondary">{{ $order->address }}</span></h6>
                                <h6>Zip Code: <span class="text-secondary">{{ $order->pincode }}</span></h6>
                            </div>

                            <br>
                            <h5 class="mt-2">Order Items</h5>
                            <hr>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Item ID</th>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($order->orderItems as $orderItem)
                                            <tr>
                                                <td width="10%">{{ $orderItem->id }}</td>
                                                <td>
                                                    @if ($orderItem->product->productImages->isNotEmpty())
                                                        <img src="{{ asset($orderItem->product->productImages[0]->image) }}"
                                                            style="width: 70px; height: 70px;" alt="">
                                                    @else
                                                        <img src="{{ asset('static/no-image.jpg') }}"
                                                            style="width: 70px; height: 70px;" alt="">
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $orderItem->product->name }}
                                                    @if ($orderItem->productColor)
                                                        @if ($orderItem->productColor->color)
                                                            <span>- Color:
                                                                {{ $orderItem->productColor->color->name }}</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>&#8369;{{ $orderItem->price }}</td>
                                                <td>{{ $orderItem->quantity }}</td>
                                                <td class="fw-bold">&#8369;{{ $orderItem->quantity * $orderItem->price }}</td>
                                                @php
                                                    $totalPrice += $orderItem->quantity * $orderItem->price;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr class="w-full">
                                            <td colspan="5" class="fw-bold w-full text-right">Total Amount:</td>
                                            <td colspan="1" class="fw-bold">
                                                &#8369;{{ $totalPrice }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
