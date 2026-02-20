@extends('layouts.app')

@section('title', 'Home Page')
@section('content')



    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

        <div class="carousel-inner">

            @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }} ">
                    @if ($sliderItem->image)
                        <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="...">
                    @endif
                    {{-- <div class="carousel-caption d-none d-md-block">
            <h5>{{$sliderItem->title}}</h5>
            <p>{{$sliderItem->description}}</p>
          </div> --}}

                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {{ $sliderItem->title }}
                            </h1>
                            <p>
                                {{ $sliderItem->description }}
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-bs-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <section id="about-us">
        <div class="py-5 bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h4>About Us</h4>
                        <div class="underline mx-auto"></div>
                        <p>
                            Welcome to <strong>{{ $appSetting->website_name }}</strong> — your reliable partner for everyday
                            essentials at competitive
                            prices. We specialize in offering a wide range of grocery items such as coffee sachets, shampoo,
                            biscuits, and more — perfect for resellers and neighborhood stores.
                        </p>

                        <p>
                            What started as a humble online selling journey through Facebook has now grown into a dedicated
                            platform built to serve small to medium-sized stores. Our goal is simple: to help you save more
                            so
                            you can earn more.
                        </p>

                        <p>
                            Whether you're running a sari-sari store, a mini-grocery, or just starting out,
                            <strong>{{ $appSetting->website_name }}</strong> is here to support your growth with affordable
                            and quality products.
                        </p>

                        <p>
                            Thank you for choosing us to be part of your business journey.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Trending Products</h4>
                    <div class="underline mb-4"></div>
                </div>
                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme products-carousel">
                            @foreach ($trendingProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">New</label>
                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                @if (isset($productItem->productImages[0]))
                                                    <x-no-image src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}" class="w-100" />
                                                @else
                                                    <x-no-image />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">&#8369;{{ $productItem->selling_price }}</span>
                                                {{-- <span class="original-price">${{ $productItem->original_price}}</span> --}}
                                            </div>
                                            {{-- <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>New Arrivals
                        <a href="{{ url('new-arrivals') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>
                @if ($newArrivalProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme products-carousel">
                            @foreach ($newArrivalProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">New</label>
                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                @if (isset($productItem->productImages[0]))
                                                    <x-no-image src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}" class="w-100" />
                                                @else
                                                    <x-no-image />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">&#8369;{{ $productItem->selling_price }}</span>
                                                {{-- <span class="original-price">${{ $productItem->original_price}}</span> --}}
                                            </div>
                                            {{-- <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No New Arrivals Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Featured Products
                        <a href="{{ url('featured-products') }}" class="btn  btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>
                @if ($featuredProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme products-carousel">
                            @foreach ($featuredProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">New</label>
                                            <a
                                                href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                @if (isset($productItem->productImages[0]))
                                                    <x-no-image src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}" class="w-100" />
                                                @else
                                                    <x-no-image />
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">&#8369;{{ $productItem->selling_price }}</span>
                                                {{-- <span class="original-price">${{ $productItem->original_price}}</span> --}}
                                            </div>
                                            {{-- <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Featured Products Available</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.products-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
