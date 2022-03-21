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
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="demo40.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Men</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Accessories</li>
                        </ol>
                    </nav>

                    <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                        <div class="toolbox-left">
                            <a href="#" class="sidebar-toggle"><svg data-name="Layer 3" id="Layer_3"
                                    viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                    <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                    <path
                                        d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                    <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2">
                                    </path>
                                    <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                    <path
                                        d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                </svg>
                                <span>Filter</span>
                            </a>

                            <div class="toolbox-item toolbox-sort">
                                <label>Sort By:</label>

                                <div class="select-custom">
                                    <select name="orderby" class="form-control">
                                        <option value="menu_order" selected="selected">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                                <!-- End .select-custom -->


                            </div>
                            <!-- End .toolbox-item -->
                        </div>
                        <!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
                                        <option value="12">18</option>
                                        <option value="24">36</option>
                                    </select>
                                </div>
                                <!-- End .select-custom -->
                            </div>
                            <!-- End .toolbox-item -->

                            <div class="toolbox-item layout-modes">
                                <a href="category.html" class="layout-btn btn-grid active" title="Grid">
                                    <i class="icon-mode-grid"></i>
                                </a>
                                <a href="category-list.html" class="layout-btn btn-list" title="List">
                                    <i class="icon-mode-list"></i>
                                </a>
                            </div>
                            <!-- End .layout-modes -->
                        </div>
                        <!-- End .toolbox-right -->
                    </nav>

                    <div class="row products-group">
                        @foreach ($data['products'] as $productId=>$product)
                        <div class="col-4 col-sm-3 col-md-3 col-lg-3 col-xl-2">
                            <div class="product-default inner-quickview inner-icon">
                                <figure>
                                    <a href="demo40-product.html">
                                        <img
                                        @if(isset($product->ProductImageFirst))
                                          src="{{ asset('storage/photo/'.$product->ProductImageFirst->image)}}"
                                        @else
                                          src="{{ asset('image-not-available.jpg')}}"
                                        @endif width="205" height="205" alt="product">
                                    </a>
                                    <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View">Quick
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
                                        <a href="demo40-product.html">Product Short Name</a>
                                    </h3>
                                    <div class="price-box">
                                        <span class="old-price">$90.00</span>
                                        <span class="product-price">$70.00</span>
                                    </div>
                                    <!-- End .price-box -->
                                </div>
                                <!-- End .product-details -->
                            </div>
                        </div>
                        <!-- End .col-sm-4 -->
                        @endforeach
                    </div>
                    <!-- End .row -->

                    <nav class="toolbox toolbox-pagination">
                        <div class="toolbox-item toolbox-show">
                            <label>Show:</label>

                            <div class="select-custom">
                                <select name="count" class="form-control">
                                    <option value="12">18</option>
                                    <option value="36">36</option>
                                </select>
                            </div>
                            <!-- End .select-custom -->
                        </div>
                        <!-- End .toolbox-item -->

                        <ul class="pagination toolbox-item">
                            <li class="page-item disabled">
                                <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><span class="page-link">...</span></li>
                            <li class="page-item">
                                <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                            </li>
                        </ul>
                    </nav>

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
                                                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                                <a href="#" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
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
                                    <span class="payment-icon visa" style="background-image: url(assets/images/payments/payment-visa.svg)"></span>
                                    <span class="payment-icon paypal" style="background-image: url(assets/images/payments/payment-paypal.svg)"></span>
                                    <span class="payment-icon stripe" style="background-image: url(assets/images/payments/payment-stripe.png)"></span>
                                    <span class="payment-icon verisign" style="background-image:  url(assets/images/payments/payment-verisign.svg)"></span>
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
