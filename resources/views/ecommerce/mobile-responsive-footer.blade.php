<div class="loading-overlay">
    <div class="bounce-loader">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>

<div class="mobile-menu-overlay"></div>
<!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                {{-- <li>
                    <a href="{{ route('search-category-wise') }}">Categories</a>
                    <ul>
                        @foreach ($categories as $category)
                        <li><a href="{{ route('search-category-wise',['id'=>$category->id]) }}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li> --}}
                {{-- Start Category --}}
                <li>
                    <a href="{{ route('search-category-wise') }}">Categories</a>
                    <ul>
                        @foreach ($categories as $category)
                        <li>

                            <a href="{{ route('search-category-wise',['id'=>$category->id]) }}" class="nolink">
                            {{$category->name}}
                            </a>
                            <ul>
                                @foreach ($category->SubCategory as $subCategory)
                                <li><a href="{{ route('search-subCategory-wise', ['id' => $subCategory->id]) }}">{{ $subCategory->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </li>
                {{-- End Category --}}
            </ul>

            <ul class="mobile-menu mt-2 mb-2">
                <li class="border-0">
                    <a href="#">
                        Special Offer!
                    </a>
                </li>
                @if($companyInfo)
                <li class="border-0">
                    <a href="{{ route('home') }}">
                             {{$companyInfo->name}}
                    </a>
                </li>
                @endif
            </ul>

            <ul class="mobile-menu">
                <li><a href="#">My Account</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="{{ route('cart') }}">Cart</a></li>
                <li><a href="{{ route('login') }}">Log In</a></li>
            </ul>
        </nav>
        <!-- End .mobile-nav -->

        <form class="search-wrapper mb-2" action="{{ route('product-search') }}" method="GET">
            <input type="text" class="form-control mb-0" placeholder="Search..." name="search_product_name" id="search_product_name" required />
            <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
        </form>

        <div class="social-icons">
            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank">
            </a>
            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
            </a>
            <a href="#" class="social-icon social-instagram icon-instagram" target="_blank">
            </a>
        </div>
    </div>
    <!-- End .mobile-menu-wrapper -->
</div>
<!-- End .mobile-menu-container -->

<div class="sticky-navbar">
    <div class="sticky-info">
        <a href="{{ route('home') }}">
            <i class="icon-home"></i>Home
        </a>
    </div>
    <div class="sticky-info">
        <a href="{{ route('category') }}" class="">
            <i class="icon-bars"></i>Categories
        </a>
    </div>
    <div class="sticky-info">
        <a href="#" class="">
            <i class="icon-wishlist-2"></i>Wishlist
        </a>
    </div>
    <div class="sticky-info">
        <a href="#" class="">
            <i class="icon-user-2"></i>Account
        </a>
    </div>
    <div class="sticky-info">
        <a href="{{ route('cart') }}" class="">
            <i class="icon-shopping-cart position-relative">
                <span class="cart-count badge-circle">0</span>
            </i>Cart
        </a>
    </div>
</div>

{{-- <div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background: #f1f1f1 no-repeat center/cover url(assets/images/newsletter_popup_bg.jpg)">
    <div class="newsletter-popup-content">
        <img src="@if($companyInfo) {{ asset('storage/photo/'.$companyInfo->logo) }} @endif" alt="Logo" class="logo-newsletter" width="111" height="44">
        <h2>Subscribe to @if($companyInfo) {{ $companyInfo->name }} @endif</h2>

        <p>
            Subscribe to the Porto mailing list to receive updates on new arrivals, special offers and our promotions.
        </p>

        <form action="#">
            <div class="input-group">
                <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
                <input type="submit" class="btn btn-primary" value="Submit" />
            </div>
        </form>
        <div class="newsletter-subscribe">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                <label for="show-again" class="custom-control-label">
                    Don't show this popup again
                </label>
            </div>
        </div>
    </div>
    <!-- End .newsletter-popup-content -->

    <button title="Close (Esc)" type="button" class="mfp-close">
        ×
    </button>
</div> --}}
<!-- End .newsletter-popup -->
