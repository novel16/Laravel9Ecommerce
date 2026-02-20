<div>
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="footer-heading">{{ $appSetting->website_name ?? 'Add website name' }}</h4>
                        <div class="footer-underline"></div>
                        <p>
                            {{ $appSetting->meta_description ?? 'Add website description' }}
                        </p>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Quick Links</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="{{ url('/') }}" class="text-white">Home</a></div>
                        <div class="mb-2"><a href="#about-us" class="text-white">About Us</a></div>
                        {{-- <div class="mb-2"><a href="" class="text-white">Contact Us</a></div> --}}
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Shop Now</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2"><a href="{{ url('collections') }}" class="text-white">Collections</a></div>
                        <div class="mb-2"><a href="{{ url('new-arrivals') }}" class="text-white">New Arrivals Products</a></div>
                        <div class="mb-2"><a href="{{ url('featured-products') }}" class="text-white">Featured Products</a></div>
                        <div class="mb-2"><a href="{{ url('cart') }}" class="text-white">Cart</a></div>
                    </div>
                    <div class="col-md-3">
                        <h4 class="footer-heading">Contact Us</h4>
                        <div class="footer-underline"></div>
                        <div class="mb-2">
                            <p>
                                <i class="fa fa-map-marker"></i> {{ $appSetting->address ?? 'Add address' }}
                            </p>
                        </div>
                        <div class="mb-2">
                            <a href="" class="text-white">
                                <i class="fa fa-phone"></i> {{ $appSetting->phone1 ?? 'Add a phone number' }}
                            </a>
                        </div>
                        <div class="mb-2">
                            <a href="" class="text-white">
                                <i class="fa fa-envelope"></i> {{ $appSetting->email1 ?? 'Add email account' }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <p class=""> &copy; {{ date('Y') }} - Created by <span class="">Novel P. Chavez</span> | All rights reserved.</p>
                    </div>
                    <div class="col-md-4">
                        <div class="social-media">
                            Get Connected:

                            @if ($appSetting->facebook)
                                <a href="{{ $appSetting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                            @endif

                            @if ($appSetting->twitter)
                                <a href="{{ $appSetting->twitter }}"><i class="fa fa-twitter" target="_blank"></i></a>
                            @endif

                            @if ($appSetting->instagram)
                                <a href="{{ $appSetting->instagram }}"><i class="fa fa-instagram" target="_blank"></i></a>
                            @endif

                            @if ($appSetting->youtube)
                                <a href="{{ $appSetting->youtube }}"><i class="fa fa-youtube" target="_blank"></i></a>
                            @endif

                            {{-- 
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-instagram"></i></a>
                            <a href=""><i class="fa fa-youtube"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>