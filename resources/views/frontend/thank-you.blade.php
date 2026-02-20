@extends('layouts.app')
@section('title', 'Thank you for shopping')

@section('content')

<div class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center p-5">
                        <div class="mb-4">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                        </div>
                        <h3 class="mb-3">Thank You for Your Order!</h3>
                        <p class="text-muted mb-3">
                            Your order has been placed successfully. We will contact you soon for the delivery details.
                        </p>
                        <p class="text-muted mb-4">
                            If you have any questions, feel free to reach out to our customer support.
                        </p>
                        <a href="{{ url('/') }}" class="btn btn-outline-primary px-4">
                            <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

