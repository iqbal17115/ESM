 <header class="header">
            <div class="header-top">
                <div class="container-fluid">
                    <div class="header-left top-notice d-none d-md-flex p-0 font2">
                        <h5 class="d-inline-block text-dark mb-0 ls-0">@if($companyInfo) {{ $companyInfo->name }} @endif</h5>
                        <a href="demo40-shop.html" class="category text-white ls-0">START SHARING</a>
                        <small>* Limited time only.</small>
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right header-dropdowns ml-auto w-sm-100 justify-content-end">
                        <div class="info-box info-box-icon-left p-0">
                            <i class="icon-shipping"></i>

                            <div class="info-box-content">
                                <h4>FREE Express Shipping On Orders $99+</h4>
                            </div>
                            <!-- End .info-box-content -->
                        </div>
                        <!-- End .info-box -->

                        <div class="separator"></div>

                        <div class="header-dropdown font2">
                            <a href="#">USD</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">EUR</a></li>
                                    <li><a href="#">USD</a></li>
                                </ul>
                            </div>
                            <!-- End .header-menu -->
                        </div>
                        <!-- End .header-dropown -->

                        <div class="header-dropdown mr-0 pl-2 font2">
                            <a href="#"><i class="flag-us flag"></i>ENG</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#"><i class="flag-us flag mr-2"></i>ENG</a>
                                    </li>
                                    <li><a href="#"><i class="flag-fr flag mr-2"></i>FRA</a></li>
                                </ul>
                            </div>
                            <!-- End .header-menu -->
                        </div>
                        <!-- End .header-dropown -->

                        <div class="separator"></div>

                        <div class="info-box-container align-items-center">
                            <div class=" info-box info-box-icon-left">
                                <i class="icon-pin"></i>

                                <div class="info-box-content">
                                    <h4>Our Stores</h4>
                                </div>
                                <!-- End .info-box-content -->
                            </div>
                            <!-- End .info-box -->

                            <div class="info-box info-box-icon-left">
                                <i class="icon-shipping-truck"></i>

                                <div class="info-box-content">
                                    <h4 class="ls-0">Track Your Order</h4>
                                </div>
                                <!-- End .info-box-content -->
                            </div>
                            <!-- End .info-box -->

                            <div class="info-box info-box-icon-left">
                                <i class="icon-help-circle"></i>

                                <div class="info-box-content">
                                    <h4>Help</h4>
                                </div>
                                <!-- End .info-box-content -->
                            </div>
                            <!-- End .info-box -->
                        </div>
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-top -->

            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}" style="background-color: #CA965C;">
                <div class="container-fluid">
                    <div class="header-left justify-content-lg-center">
                        <button class="mobile-menu-toggler text-primary mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="demo40.html" class="logo">
                            <img src="@if($companyInfo) {{ asset('storage/photo/'.$companyInfo->logo) }} @endif" class="w-100" width="111" height="44" alt="Porto Logo">
                        </a>
                    </div>
                    <!-- End .header-left -->

                    <div class="header-right w-lg-max">
                        <div class="header-icon header-search header-search-inline header-search-category d-sm-block d-none w-lg-max text-right mt-0">
                            <a href="#" class="search-toggle" role="button"><i class="icon-magnifier"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper mr-1">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                                    <div class="select-custom">
                                        <select id="cat" name="cat">
                                            <option value="">All Categories</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- End .select-custom -->
                                    <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                                </div>
                                <!-- End .header-search-wrapper -->
                            </form>
                        </div>
                        <!-- End .header-search -->

                        <div class="header-contact header-wishlist d-lg-flex pl-4 pr-sm-4 pr-2 ml-2">
                            <a href="wishlist.html" class="header-icon mr-0" title="wishlist"><i
                                    class="icon-wishlist-2"></i></a>
                            <h6 class="text-capitalize"><span>Favorites</span><a href="login.html">Wishlist</a>
                            </h6>
                        </div>

                        <div class="header-contact d-lg-flex pr-sm-4 pr-2">
                            <a href="{{ route('customer_login') }}" class="header-icon mr-0" title="login"><i class="icon-user-2"></i></a>
                            <h6 class="text-capitalize"><span class="ls-n-20">Welcome</span><a href="login.html">Sign In
                                    / Register</a></h6>
                        </div>

                        <div class="separator"></div>

                        <div class="cart-dropdown-wrapper d-flex align-items-center pt-2">
                            <span class="cart-subtotal text-right font2 mr-3">Shopping Cart
                                <span class="cart-price d-block font2">$0.00</span>
                            </span>

                            <div class="dropdown cart-dropdown">
                                <a href="#" title="Cart" class="dropdown-toggle dropdown-arrow cart-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <i class="icon-cart-thick"></i>
                                    <span class=" cart-count badge-circle bg-info">3</span>
                                </a>

                                <div class="cart-overlay"></div>

                                <div class="dropdown-menu mobile-cart">
                                    <a href="#" title="Close (Esc)" class="btn-close">×</a>
                                    @include('frontend.header-card-popup')
                                    <!-- End .dropdownmenu-wrapper -->
                                </div>
                                <!-- End .dropdown-menu -->
                            </div>
                            <!-- End .dropdown -->
                        </div>
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-middle -->
        </header>
        <!-- End .header -->
