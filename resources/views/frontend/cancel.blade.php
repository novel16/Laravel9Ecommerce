@extends('layouts.app')
@section('title', 'Payment Cancelled')

@section('content')
<style>
    :root {
        --cancel-bg-top: #fff8f7;
        --cancel-bg-bottom: #fff1ef;
        --cancel-accent: #c62828;
        --cancel-accent-soft: #fbe9e8;
        --cancel-text: #2a2020;
        --cancel-muted: #7b6767;
    }

    .cancel-wrapper {
        position: relative;
        min-height: 72vh;
        display: flex;
        align-items: center;
        background: linear-gradient(160deg, var(--cancel-bg-top), var(--cancel-bg-bottom));
        overflow: hidden;
    }

    .cancel-orb {
        position: absolute;
        width: 420px;
        height: 420px;
        border-radius: 50%;
        background: radial-gradient(circle at center, rgba(198, 40, 40, 0.08), rgba(198, 40, 40, 0));
        filter: blur(1px);
        animation: cancelFloat 6s ease-in-out infinite;
    }

    .cancel-orb.left {
        top: -170px;
        left: -130px;
    }

    .cancel-orb.right {
        right: -160px;
        bottom: -220px;
        animation-delay: 1.6s;
    }

    .cancel-card {
        position: relative;
        z-index: 2;
        max-width: 680px;
        margin: 0 auto;
        border: 1px solid #f2d7d7;
        border-radius: 24px;
        background: #ffffff;
        box-shadow: 0 22px 50px rgba(108, 28, 28, 0.12);
        padding: 3rem 2.5rem;
        text-align: center;
    }

    .cancel-badge {
        display: inline-block;
        margin-bottom: 1rem;
        padding: 0.4rem 0.9rem;
        border-radius: 999px;
        background-color: var(--cancel-accent-soft);
        color: var(--cancel-accent);
        font-weight: 700;
        font-size: 0.82rem;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .cancel-icon {
        width: 86px;
        height: 86px;
        margin: 0 auto 1.2rem;
        border-radius: 50%;
        background: #fff5f5;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #f4d2d2;
    }

    .cancel-icon i {
        font-size: 2.2rem;
        color: var(--cancel-accent);
    }

    .cancel-title {
        color: var(--cancel-text);
        font-weight: 800;
        font-size: clamp(1.75rem, 3vw, 2.3rem);
        margin-bottom: 0.8rem;
    }

    .cancel-subtitle {
        color: var(--cancel-muted);
        font-size: 1rem;
        line-height: 1.8;
        max-width: 540px;
        margin: 0 auto;
    }

    .btn-cancel-primary {
        background-color: var(--cancel-accent);
        border-color: var(--cancel-accent);
        color: #fff;
        font-weight: 700;
    }

    .btn-cancel-primary:hover {
        background-color: #a32020;
        border-color: #a32020;
        color: #fff;
    }

    .cancel-link {
        color: #5f4f4f;
        font-weight: 600;
        text-decoration: none;
    }

    .cancel-link:hover {
        color: var(--cancel-accent);
    }

    @keyframes cancelFloat {
        0%, 100% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(16px);
        }
    }

    @media (max-width: 576px) {
        .cancel-card {
            padding: 2.2rem 1.2rem;
            border-radius: 18px;
        }
    }
</style>

<section class="cancel-wrapper py-5">
    <div class="cancel-orb left"></div>
    <div class="cancel-orb right"></div>

    <div class="container">
        <div class="cancel-card">
            <span class="cancel-badge">Checkout Interrupted</span>

            <div class="cancel-icon">
                <i class="fa fa-times-circle" aria-hidden="true"></i>
            </div>

            <h1 class="cancel-title">Payment Cancelled</h1>
            <p class="cancel-subtitle">
                Your transaction was not completed and no payment was captured.
                You can review your cart and continue checkout anytime.
            </p>

            <div class="d-flex flex-column flex-sm-row justify-content-center gap-2 gap-sm-3 mt-4">
                <a href="{{ url('/checkout') }}" class="btn btn-cancel-primary px-4 py-2">Try Checkout Again</a>
                <a href="{{ url('/cart') }}" class="btn btn-outline-dark px-4 py-2">Back to Cart</a>
            </div>

            <a href="{{ url('/') }}" class="cancel-link d-inline-block mt-4">
                Continue Shopping <i class="fa fa-arrow-right ms-1" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>
@endsection
