<div class="top-notice text-white">
            <div class="container text-center">
                <h5 class="d-inline-block mb-0">Get Up to <b>40% OFF</b> New-Season Styles</h5>
                <a href="demo7-shop.html" class="category">MEN</a>
                <a href="demo7-shop.html" class="category ml-2 mr-3">WOMEN</a>
                <small>* Limited time only.</small>
                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
            </div><!-- End .container -->
        </div><!-- End .top-notice -->

        <header class="header">
            <div class="header-top text-uppercase">
                <div class="container">
                    <div class="header-left">
                        <div class="header-dropdown mr-3 pr-1">
                            <a href="#" class="pl-0">USD</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->

                        <div class="header-dropdown mr-auto">
                            <a href="#" class="pl-0"><i class="flag-us flag"></i>ENG</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#"><i class="flag-us flag mr-2"></i>ENG</a>
                                    </li>
                                    <li><a href="#"><i class="flag-fr flag mr-2"></i>FRA</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->
                    </div><!-- End .header-left -->

                    <div class="header-right header-dropdowns ml-0 ml-sm-auto">
                        <div class="header-dropdown dropdown-expanded mr-3">
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('cart') }}">Cart</a></li>
                                    <li><a href="{{ route('customer_login') }}">Log In</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropown -->

                        <span class="separator d-none d-lg-inline-block"></span>

                        <div class="social-icons">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                            <a href="#" class="social-icon social-instagram icon-instagram mr-1" target="_blank"></a>
                        </div><!-- End .social-icons -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler" type="button">
                            <i class="fas fa-bars"></i>
                        </button>

                        <a href="{{ route('home') }}" class="logo w-100">
                            <img src="@if ($companyInfo) {{ asset('storage/photo/' . $companyInfo->logo) }} @endif" id="logoAttr" alt="Porto Logo">
                        </a>

                        <nav class="main-nav w-100">
                            <ul class="menu">
                                <li class="active">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('category') }}">Categories</a>
                                    <div class="megamenu megamenu-fixed-width megamenu-3cols">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a href="#" class="nolink">VARIATION 1</a>
                                                <ul class="submenu">
                                                    <li><a href="category.html">Fullwidth Banner</a></li>
                                                    <li><a href="category-banner-boxed-slider.html">Boxed Slider
                                                            Banner</a>
                                                    </li>
                                                    <li><a href="category-banner-boxed-image.html">Boxed Image
                                                            Banner</a>
                                                    </li>
                                                    <li><a href="category.html">Left Sidebar</a></li>
                                                    <li><a href="category-sidebar-right.html">Right Sidebar</a></li>
                                                    <li><a href="category-off-canvas.html">Off Canvas Filter</a></li>
                                                    <li><a href="category-horizontal-filter1.html">Horizontal
                                                            Filter1</a>
                                                    </li>
                                                    <li><a href="category-horizontal-filter2.html">Horizontal
                                                            Filter2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="#" class="nolink">VARIATION 2</a>
                                                <ul class="submenu">
                                                    <li><a href="category-list.html">List Types</a></li>
                                                    <li><a href="category-infinite-scroll.html">Ajax Infinite Scroll</a>
                                                    </li>
                                                    <li><a href="category.html">3 Columns Products</a></li>
                                                    <li><a href="category-4col.html">4 Columns Products</a></li>
                                                    <li><a href="category-5col.html">5 Columns Products</a></li>
                                                    <li><a href="category-6col.html">6 Columns Products</a></li>
                                                    <li><a href="category-7col.html">7 Columns Products</a></li>
                                                    <li><a href="category-8col.html">8 Columns Products</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-lg-4 p-0">
                                                <div class="menu-banner">
                                                    <figure>
                                                        <img src="{{ URL::asset('porto/') }}/assets/images/menu-banner.jpg" alt="Menu banner"
                                                            width="300" height="300">
                                                    </figure>
                                                    <div class="banner-content">
                                                        <h4>
                                                            <span class="">UP TO</span><br />
                                                            <b class="">50%</b>
                                                            <i>OFF</i>
                                                        </h4>
                                                        <a href="demo7-shop.html" class="btn btn-sm btn-dark">SHOP
                                                            NOW</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- End .megamenu -->
                                </li>
                                <li><a href="{{ route('home') }}">Buy @if($companyInfo) {{$companyInfo->name}} @endif !</a></li>
                            </ul>
                        </nav>

                        <div class="header-search header-search-popup header-search-category d-none d-lg-block ml-xl-5">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control bg-white" name="q" id="q"
                                        placeholder="I'm searching for..." required="">
                                    <div class="select-custom bg-white">
                                        <select id="cat" name="cat">
                                            <option value="">All Categories</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- End .select-custom -->
                                    <button class="btn bg-white icon-search-3" type="submit"></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-contact d-none d-lg-flex pl-4 pr-4">
                            <img alt="phone" src="{{ URL::asset('porto/') }}/assets/images/phone.png" width="30" height="30" class="pb-1">
                            <h6><span>Call us now</span>
                            <a href="tel:#" class="text-dark font1">
                            @if($companyInfo) 
                               {{$companyInfo->phone}} 
                            @endif
                            </a></h6>
                        </div>

                        <a href="login.html" class="header-icon header-icon-user d-lg-none d-block" title="login"><i
                                class="icon-user-2"></i></a>

                        <a href="wishlist.html" class="header-icon d-lg-none d-block" title="wishlist"><i
                                class="icon-wishlist-2"></i></a>

                        <span class="separator d-lg-inline-block d-none"></span>

                        <div class="dropdown cart-dropdown">
                            <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <span class="cart-count badge-circle">
                                {{ $cardBadge['data']['number_of_product'] }}
                                </span>
                            </a>

                            <div class="cart-overlay"></div>

                            <div class="dropdown-menu mobile-cart">
                                <a href="#" title="Close (Esc)" class="btn-close">×</a>
                                <div class="dropdown-cart-header">Shopping Cart</div>

                                <div class="dropdownmenu-wrapper custom-scrollbar minicart">
                                    <!-- End .dropdown-cart-header -->
                                    
                                      <!-- End .dropdown-cart-header -->
                                      @include('ecommerce.header-card-popup')
                                      <!-- End .dropdownmenu-wrapper -->
                                    
                                </div><!-- End .dropdownmenu-wrapper -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->