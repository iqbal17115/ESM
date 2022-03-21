@extends('layouts.front_end')
@section('content')
<main class="main home">
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="sidebar-overlay"></div>
            <div class="sidebar-toggle custom-sidebar-toggle"><i class="fas fa-sliders-h"></i></div>

            {{-- Start Aside --}}
            @include('frontend.aside')
            {{-- End Aside --}}

            <div class="col-lg-9">
                <div class="main-content">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav font2">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="demo40.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Product</a></li>
                        </ol>
                    </nav>

                    <div class="product-single-container product-single-default">
                        <div class="cart-message d-none">
                            <strong class="single-cart-notice">“Men Black Sports Shoes”</strong>
                            <span>has been added to your cart.</span>
                        </div>

                        <div class="row">
                            <div class="col-xl-5 col-md-6 product-single-gallery">
                                <div class="product-slider-container">
                                    <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                        @foreach ($productDetails->ProductImages as $productImage)
                                        <div class="product-item">
                                            <img class="product-single-image"
                                                src="{{ asset('storage/photo/'.$productImage->image) }}"
                                                data-zoom-image="assets/images/demoes/demo40/products/zoom/product-1-big.jpg"
                                                width="468" height="468" alt="product" />
                                        </div>
                                        @endforeach
                                    </div>
                                    <!-- End .product-single-carousel -->
                                    <span class="prod-full-screen">
                                        <i class="icon-plus"></i>
                                    </span>
                                </div>

                                <div class="prod-thumbnail owl-dots">
                                    @foreach ($productDetails->ProductImages as $productImage)
                                    <div class="owl-dot">
                                        <img src="{{ asset('storage/photo/'.$productImage->image) }}" width="110"
                                            height="110" alt="product-thumbnail" />
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End .product-single-gallery -->

                            <div class="col-xl-7 col-md-6 product-single-details">
                                <h1 class="product-title">
                                    @if(strlen($productDetails->name)>50)
                                    {{\Illuminate\Support\Str::limit($productDetails->name, 50).'...'}}
                                    @else
                                    {{ $productDetails->name }}
                                    @endif
                                </h1>

                                <div class="product-nav">
                                    <div class="product-prev">
                                        <a href="#">
                                            <span class="product-link"></span>

                                            <span class="product-popup">
                                                <span class="box-content">
                                                    <img alt="product" width="150" height="150"
                                                        src="assets/images/products/product-3.jpg"
                                                        style="padding-top: 0px;">

                                                    <span>Circled Ultimate 3D Speaker</span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>

                                    <div class="product-next">
                                        <a href="#">
                                            <span class="product-link"></span>

                                            <span class="product-popup">
                                                <span class="box-content">
                                                    <img alt="product" width="150" height="150"
                                                        src="assets/images/products/product-4.jpg"
                                                        style="padding-top: 0px;">

                                                    <span>Blue Backpack for the Young</span>
                                                </span>
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <hr class="short-divider">

                                <div class="price-box">
                                    @if($productDetails->special_price)
                                    <span class="old-price">
                                        @if (isset($currencySymbol->symbol))
                                        <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                        @endif
                                        {{ $productDetails->regular_price }}
                                    </span>
                                    <span class="product-price">
                                        @if (isset($currencySymbol->symbol))
                                        <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                        @endif
                                        {{ $productDetails->special_price }}
                                    </span>
                                    @else
                                    <span class="product-price">
                                        @if (isset($currencySymbol->symbol))
                                        <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                        @endif
                                        {{ $productDetails->regular_price }}
                                    </span>
                                    @endif
                                </div>
                                <!-- End .price-box -->

                                <div class="product-desc ls-0 font2">
                                    <p>
                                        @if($productDetails->ProductInfo)
                                        {{ $productDetails->ProductInfo->long_description }}
                                        @endif
                                    </p>
                                </div>
                                <!-- End .product-desc -->

                                <ul class="single-info-list font2">
                                    <li>
                                        CATEGORies:
                                        <strong>
                                            <a href="#" class="product-category">
                                                {{$productDetails->Category->name}}
                                            </a>
                                        </strong>
                                    </li>
                                </ul>

                                <div class="product-action">
                                    <div class="product-single-qty">
                                        <input class="horizontal-quantity form-control" type="text">
                                    </div>
                                    <!-- End .product-single-qty -->

                                    <a href="javascript:;" class="btn btn-dark add-cart mr-2" title="Add to Cart">Add to
                                        Cart</a>

                                    <a href="cart.html" class="btn btn-gray view-cart d-none">View cart</a>
                                </div>
                                <!-- End .product-action -->

                                <hr class="divider mb-0 mt-0">

                                <div class="product-single-share icon-with-color mb-2 mt-2">
                                    <label class="sr-only">Share:</label>

                                    <div class="social-icons">
                                        <a href="#" class="social-icon social-facebook" target="_blank"
                                            title="Facebook">
                                            <i class="icon-facebook"></i>
                                        </a>
                                        <a href="#" class="social-icon social-twitter" target="_blank" title="Twitter">
                                            <i class="icon-twitter"></i>
                                        </a>
                                        <a href="#" class="social-icon social-linkedin" target="_blank"
                                            title="Linkedin">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                        <a href="#" class="social-icon social-gplus" target="_blank" title="Google +">
                                            <i class="fab fa-google-plus-g"></i>
                                        </a>
                                        <a href="#" class="social-icon social-mail" target="_blank" title="Email">
                                            <i class="icon-mail-alt"></i>
                                        </a>
                                    </div>
                                    <!-- End .social-icons -->
                                </div>
                                <!-- End .product single-share -->
                            </div>
                            <!-- End .product-single-details -->
                        </div>
                        <!-- End .row -->
                    </div>
                    <!-- End .product-single-container -->

                    <div class="product-single-tabs font2">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-tab-desc" data-toggle="tab"
                                    href="#product-desc-content" role="tab" aria-controls="product-desc-content"
                                    aria-selected="true">Description</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="product-tab-reviews" data-toggle="tab"
                                    href="#product-reviews-content" role="tab" aria-controls="product-reviews-content"
                                    aria-selected="false">Reviews
                                    (1)</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                                aria-labelledby="product-tab-desc">
                                <div class="product-desc-content">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, nostrud
                                        ipsum consectetur sed do, quis nostrud exercitation
                                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                                        in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                        Excepteur sint occaecat.</p>
                                    <ul>
                                        <li>Any Product types that You want - Simple, Configurable
                                        </li>
                                        <li>Downloadable/Digital Products, Virtual Products
                                        </li>
                                        <li>Inventory Management with Backordered items
                                        </li>
                                    </ul>
                                    <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. </p>
                                </div>
                                <!-- End .product-desc-content -->
                            </div>
                            <!-- End .tab-pane -->

                            <div class="tab-pane fade" id="product-reviews-content" role="tabpanel"
                                aria-labelledby="product-tab-reviews">
                                <div class="product-reviews-content">
                                    <h3 class="reviews-title">1 review for Men Black Sports Shoes</h3>

                                    <div class="comment-list">
                                        <div class="comments">
                                            <figure class="img-thumbnail">
                                                <img src="assets/images/blog/author.jpg" alt="author" width="80"
                                                    height="80">
                                            </figure>

                                            <div class="comment-block">
                                                <div class="comment-header">
                                                    <div class="comment-arrow"></div>

                                                    <div class="ratings-container float-sm-right">
                                                        <div class="product-ratings">
                                                            <span class="ratings" style="width:60%"></span>
                                                            <!-- End .ratings -->
                                                            <span class="tooltiptext tooltip-top"></span>
                                                        </div>
                                                        <!-- End .product-ratings -->
                                                    </div>

                                                    <span class="comment-by">
                                                        <strong>Joe Doe</strong> – April 12, 2018
                                                    </span>
                                                </div>

                                                <div class="comment-content">
                                                    <p>Excellent.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="divider"></div>

                                    <div class="add-product-review">
                                        <h3 class="review-title">Add a review</h3>

                                        <form action="#" class="comment-form m-0">
                                            <div class="rating-form">
                                                <label for="rating">Your rating <span class="required">*</span></label>
                                                <span class="rating-stars">
                                                    <a class="star-1" href="#">1</a>
                                                    <a class="star-2" href="#">2</a>
                                                    <a class="star-3" href="#">3</a>
                                                    <a class="star-4" href="#">4</a>
                                                    <a class="star-5" href="#">5</a>
                                                </span>

                                                <select name="rating" id="rating" required="" style="display: none;">
                                                    <option value="">Rate…</option>
                                                    <option value="5">Perfect</option>
                                                    <option value="4">Good</option>
                                                    <option value="3">Average</option>
                                                    <option value="2">Not that bad</option>
                                                    <option value="1">Very poor</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Your review <span class="required">*</span></label>
                                                <textarea cols="5" rows="6"
                                                    class="form-control form-control-sm"></textarea>
                                            </div>
                                            <!-- End .form-group -->


                                            <div class="row">
                                                <div class="col-md-6 col-xl-12">
                                                    <div class="form-group">
                                                        <label>Name <span class="required">*</span></label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            required>
                                                    </div>
                                                    <!-- End .form-group -->
                                                </div>

                                                <div class="col-md-6 col-xl-12">
                                                    <div class="form-group">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input type="text" class="form-control form-control-sm"
                                                            required>
                                                    </div>
                                                    <!-- End .form-group -->
                                                </div>

                                                <div class="col-md-6 col-xl-12">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="save-name" />
                                                        <label class="custom-control-label mb-0" for="save-name">Save my
                                                            name, email, and website in this browser for the
                                                            next time I
                                                            comment.</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="submit" class="btn btn-primary" value="Submit">
                                        </form>
                                    </div>
                                    <!-- End .add-product-review -->
                                </div>
                                <!-- End .product-reviews-content -->
                            </div>
                            <!-- End .tab-pane -->
                        </div>
                        <!-- End .tab-content -->
                    </div>
                    <!-- End .product-single-tabs -->

                    <div class="products-section pt-0">
                        <h2 class="section-title pb-3">Related Products</h2>

                        <div class="products-slider owl-carousel owl-theme dots-top dots-small" data-owl-options="{
                            'dots': true,
                            'loop': false,
                            'responsive': {
                                '0': {
                                    'items': 2
                                },
                                '576': {
                                    'items': 3
                                },
                                '768': {
                                    'items': 4
                                },
                                '992': {
                                    'items': 4
                                },
                                '1500': {
                                    'items': 6
                                }
                            }
                        }">
                            @foreach ($data['products'] as $product)
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="{{route('product-details',['id'=>$product['id']])}}">
                                        <img @if($product['product_image_first'])
                                            src="{{ asset('storage/photo/'.$product['product_image_first']['image']) }}"
                                            @else src="{{ asset('image-not-available.jpg')}}" @endif width="205"
                                            height="205" alt="product">
                                    </a>

                                    <div class="btn-icon-group">
                                        <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                                class="icon-shopping-cart"></i></a>
                                    </div>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview"
                                        title="Quick View">Quick
                                        View
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <div class="category-wrap">
                                        <div class="category-list">
                                            <a href="demo40-shop.html" class="product-category">category</a>
                                        </div>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="demo40-product.html">
                                            @if(strlen($product['name'])>50)
                                            {{\Illuminate\Support\Str::limit($product['name'], 50).'...'}}
                                            @else
                                            {{ $product['name'] }}
                                            @endif
                                        </a>
                                    </h3>

                                    <div class="price-box">
                                        @if($product['special_price'])
                                        <span class="old-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $product['regular_price'] }}
                                        </span>
                                        <span class="product-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $product['special_price'] }}
                                        </span>
                                        @else
                                        <span class="product-price">
                                            @if (isset($currencySymbol->symbol))
                                            <span style="font-size: 14px;">{{ $currencySymbol->symbol }}</span>
                                            @endif
                                            {{ $product['regular_price'] }}
                                        </span>
                                        @endif
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                            @endforeach

                        </div>
                        <!-- End .products-slider -->
                    </div>
                    <!-- End .products-section -->

                    <footer class="footer font2">
                        <div class="footer-middle">
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="widget">
                                        <h3 class="widget-title">Customer Services</h3>
                                        <div class="widget-content">
                                            <ul>
                                                <li><a href="#">Help & FAQs</a></li>
                                                <li><a href="#">Order Tracking</a></li>
                                                <li><a href="#">Shipping & Delivery</a></li>
                                                <li><a href="#">Orders History</a></li>
                                                <li><a href="#">Advanced Search</a></li>
                                                <li><a href="login.html">Login</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="widget">
                                        <h3 class="widget-title">About Us</h3>
                                        <div class="widget-content">
                                            <ul>
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="#">Careers</a></li>
                                                <li><a href="#">Our Stores</a></li>
                                                <li><a href="#">Corporate Sales</a></li>
                                                <li><a href="#">Careers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="widget">
                                        <h3 class="widget-title">More Information</h3>
                                        <div class="widget-content">
                                            <ul>
                                                <li><a href="#">Affiliates</a></li>
                                                <li><a href="#">Refer a Friend</a></li>
                                                <li><a href="#">Student Beans Offers</a></li>
                                                <li><a href="#">Gift Vouchers</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="widget">
                                        <h3 class="widget-title">Follow Us</h3>
                                        <div class="widget-content">
                                            <div class="social-icons">
                                                <a href="#" class="social-icon social-facebook icon-facebook"
                                                    target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter"
                                                    target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram"
                                                    target="_blank" title="Instagram"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-bottom d-sm-flex align-items-center">
                            <div class="footer-left">
                                <span class="footer-copyright">Porto eCommerce. © 2021. All Rights
                                    Reserved</span>
                            </div>

                            <div class="footer-right ml-auto mt-1 mt-sm-0">
                                <div class="payment-icons mr-0">
                                    <span class="payment-icon visa"
                                        style="background-image: url(assets/images/payments/payment-visa.svg)"></span>
                                    <span class="payment-icon paypal"
                                        style="background-image: url(assets/images/payments/payment-paypal.svg)"></span>
                                    <span class="payment-icon stripe"
                                        style="background-image: url(assets/images/payments/payment-stripe.png)"></span>
                                    <span class="payment-icon verisign"
                                        style="background-image:  url(assets/images/payments/payment-verisign.svg)"></span>
                                </div>
                            </div>
                        </div>
                        <!-- End .footer-bottom -->
                    </footer>
                    <!-- End .footer -->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
