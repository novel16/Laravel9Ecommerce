@extends('layouts.admin')


@section('content')
    <div class="row">


        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3>Products
                        <a href="{{ url('admin/products/create-product') }}"
                            class="btn btn-success text-light btn-sm float-end">Add Product</a>
                    </h3>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            {{ $product->category->name ?? 'No Category' }}
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>₱{{ number_format($product->selling_price, 2) }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>
                                            <span class="badge bg-{{ $product->status == '1' ? 'secondary' : 'success' }}">
                                                {{ $product->status == '1' ? 'Hidden' : 'Visible' }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ url('admin/products/' . $product->id . '/edit') }}"
                                                class="btn btn-sm btn-success rounded-1 text-light me-1">
                                                <i class="fa-regular fa-pen-to-square me-1"></i>Edit
                                            </a>
                                            <a href="{{ url('admin/products/' . $product->id . '/delete') }}"
                                                onclick="return confirm('Are you sure, you want to delete this data?')"
                                                class="btn btn-sm btn-danger rounded-1 text-light">
                                                <i class="fa-regular fa-trash-can me-1"></i>Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No record found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-2">
                        {{ $products->links() }}
                    </div>
                </div>
            @endsection
